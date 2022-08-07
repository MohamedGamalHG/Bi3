<?php
namespace App\Http\Repository\Customer;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeRepository implements HomeRepositoryInterface
{
    public function index()
    {
        $categorys = Category::all();
        return view('pages.category.index',compact('categorys'));
    }

    public function store($request)
    {
        //return $request;
        DB::beginTransaction();

        try {
            $cat = new Category();
            $cat->category_name = ['ar'=>$request->category_name_ar,'en'=>$request->category_name_en];
            $cat->save();
            Db::commit();
            return  redirect()->route('index');
        }catch (\Exception $e)
        {
            Db::rollBack();
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function update($request)
    {

        DB::beginTransaction();

        try {
            $cat =  Category::findOrFail($request->category_id);
            $cat->category_name = ['ar'=>$request->category_name_ar,'en'=>$request->category_name_en];
            $cat->save();
            Db::commit();
            return  redirect()->route('index');
        }catch (\Exception $e)
        {
            Db::rollBack();
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Category::destroy($request->id);
            return redirect()->route('category.index');
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function edit($id)
    {

    }

    public function show($id)
    {
        // TODO: Implement edit() method.
    }
}
