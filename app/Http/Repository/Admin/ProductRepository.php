<?php
namespace App\Http\Repository\Admin;


use App\Models\Product;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $products = Product::all();
        //$sub_cats = SubCategory::all();
        return view('pages.product.index',compact('products'));
    }

    public function store($request)
    {

        DB::beginTransaction();

        try {
            $product = new Product();
            $product->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->sub_category_id = $request->subcategory;
            $product->description = $request->description;
            //return $request;
            $product->save();
            /*
             * this code is to generate more image in table Image to get more image of product
             * */

            if(!empty($request->image))
            {
                //return $request->image[0]->getClientOriginalName();
                foreach ($request->image as $photo) {

                    $photo->storeAs('photos/'.$product->id, $photo->getClientOriginalName(), 'products');
                    $photo->move(public_path('photos/'.$product->id), $photo->getClientOriginalName());

                    $img = new Image();
                    $img->image_name = $photo->getClientOriginalName();
                    $img->product_id = $product->id;
                    $img->save();
                }
            }

            Db::commit();
            return  redirect()->route('product.index');
        }catch (\Exception $e)
        {
            //return $e->getMessage();
            Db::rollBack();
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $product =  Product::findOrFail($request->id);
            $product->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->sub_category_id = $request->subcategory;
            $product->description = $request->description;
            $product->save();

            if(!empty($request->image))
            {
                foreach ($request->image as $photo) {

                    $photo->storeAs('photos/'.$product->id, $photo->getClientOriginalName(), 'products');
                    $photo->move(public_path('photos/'.$product->id), $photo->getClientOriginalName());

                    $img = new Image();
                    $img->image_name = $photo->getClientOriginalName();
                    $img->product_id = $product->id;
                    $img->save();
                }
            }

            Db::commit();
            return  redirect()->route('product.index');
        }catch (\Exception $e)
        {
            Db::rollBack();
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Product::destroy($request->id);
            return redirect()->route('product.index');
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function edit($id)
    {

        $products = Product::findOrFail($id);
        $sub_cats = SubCategory::all();
        $images = Image::where('product_id',$id)->count();
        return view('pages.product.edit',compact('products','images','sub_cats'));
        //return view('pages.product.edit',compact('products','sub_cats'));
    }

    public function show($id)
    {
        $sub_cats = SubCategory::all();
        return view('pages.product.add',compact('sub_cats'));
    }
    public function createImage($id)
    {
        $images = Image::where('product_id',$id)->get();
        $products = Product::Select('id')->where('id',$id)->first();
        return view('pages.product.showImage',compact('products','images'));
    }
}
