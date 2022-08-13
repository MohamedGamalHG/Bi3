<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Repository\Customer\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    protected $home;
    public function __construct(HomeRepositoryInterface $ho)
    {
        $this->home = $ho;
    }
    public function index()
    {
        //return $this->home->index();
        $category = Category::get();
        //$subcategory = SubCategory::withCount(['products'])->get();
        //return $subcategory;
       // return dd($category->subcategory);
/*        foreach ($category as $cat)
        {
            return  dd($cat->sub_categories[0]->subcategory_name);
        }*/
        return view('customer.home',compact('category'));
    }
    public function FilterProduct(Request  $request){
        if($request->max_price < $request->min_price)
            return redirect()->back()->withErrors(['msg'=>'Max Price Should be greater than Min Price']);
        else {
            $idProduct = $request->id[-1];
            $products = Product::where('price', '>=', $request->min_price)
                ->where('price', '<=', $request->max_price)
                ->where('subcategory_id', $idProduct)
                ->with('images')->get();
            $subcat_product = SubCategory::withCount(['products'])->get();

            //return redirect()->back()->with(['products'=>$products,'subcat_product'=>$subcat_product]);
            return view('customer.home2', compact('subcat_product', 'products'));
        }
    }
    public  function AboutProduct($id)
    {
        // to make select in with function you should select " id " with other attribute you that you want to select it
        // id is very important to select it with other selector like name ,price ...
        /*$images = Image::with(['product'=>function($q){
            $q->select('name','id','price');
        }])->where('product_id',$id)->get(); */


        $images = Image::select('image_name','product_id')->with('product')->where('product_id',$id)->get();
        $product = Product::where('id',$id)->first();
        $sub_id = Product::with(['sub_category'=>function($q){
            $q->select('*');
        }])->where('id',$id)->first();

        $category  = SubCategory::with(['category'=> function($q){
            $q->select('category_name','id');
        }])->where('category_id',$sub_id->sub_category->category_id)->first();
        //return $category->category->category_name;
        return view('customer.about_product',compact('images','product','category'));
    }
    public function getsubid($id)
    {
        $list = SubCategory::where('category_id',$id)->pluck('subcategory_name','id');
        return $list;
    }
    public function listing_post(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = new Product();
            $product->name = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->subcategory_id = $request->subcategory_id;
           
            $product->save();

            if(!empty($request->image)) {
                foreach ($request->image as $images) {

                    $images->storeAs('photos/' . $product->id, $images->getClientOriginalName(), 'products');
                    $images->move(public_path('photos/' . $product->id), $images->getClientOriginalName());
                    $img = new Image();
                    $img->image_name = $images->getClientOriginalName();
                    $img->product_id = $product->id;
                    $img->save();

                }
            }
            DB::commit();
            return redirect()->route('customer.index');
        }catch(\Exception $e){
            return $e->getMessage();
            DB::rollBack();
            return redirect()->back();
        }

    }
    public function listing(){

            $categorys = Category::all();
            $subcategories = SubCategory::all();
            return view('customer.listing',compact('subcategories','categorys'));


    }
    public function ShowProduct($name,$id)
    {
        /*$images = Image::where('')*/
        $products =Product::where('subcategory_id',$id)->with('images')->get();
       /* foreach ($products as $pr)
            return dd($pr->images[0]->image_name);*/
        /*$array_products = [];$i=0;
        foreach ($products as $pro)
            $array_products [$i++] = $pro->id;
        $images = Image::select('image_name')->whereIn('product_id',$array_products)->get();*/
        $subcat_product = SubCategory::withCount(['products'])->get();
        return view('customer.home2',compact('subcat_product','products'));
    }
    public function category($id)
    {
        $categorys = Category::all();
        $subcat = SubCategory::all();
        $products = Product::where('subcategory_id',$id)->get();
        /*$arr = Category::withCount('sub_categories.products')->get();*/
        $subcat_product = SubCategory::withCount(['products'])->get();
        //return dd($test[0]->products_count);
        // here is problem we will solve it
        /*foreach ($arr as $ar)
            return dd($ar->sub_categories[0]->products_count);*/
        //foreach ($subcat as $sub)  {$arr[$sub->category->category_name] = $sub->products->where('subcategory_id',$sub->id)->count();}
        //return dd($product);
        // here is problem i will down now tomorrow will see it

        return view('customer.home2',compact('categorys','subcat_product','products'));
    }

    public function login_view()
    {
        //return dd(\auth()->guard('customer')->user());
        if(isset(\auth()->guard('customer')->user()->name))
            return  redirect()->back()->withErrors(['logged'=>'You are already login']);
        return view('customer.login');
    }
    public function login_customer(Request $request)
    {
        //return dd(\auth()->guard('customer')->attempt($request->only('email','password')));
        //return dd(Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password]));

       if(Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])) {
          //return dd(Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password]));
            return redirect()->route('customer.index');
       }
             else
                 return redirect()->back()->withErrors(['logged'=>'password or email me be not right']);
    }
    public function register_view(Request $request)
    {
        return view('customer.register');
    }
    public function register_customer(CustomerRequest $request)
    {
        if($request->password == $request->confirm_password)
        {
            DB::beginTransaction();
            $customer = new Customer();
            $customer->email = $request->email;
            $customer->name = $request->name;
            $customer->password = Hash::make($request->password);
            $customer->save();
            //return $customer->id;
            $name = $customer->name;
            DB::commit();
            Auth::guard('customer')->login($customer);
            return redirect()->route('customer.index')->with(['name'=>$name]);

            //return redirect()->route('customer.index',[$name]);
        }
        else
        {
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
