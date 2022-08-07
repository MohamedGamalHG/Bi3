<?php
namespace App\Http\Repository\Admin;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    public function index()
    {
        $sub_categorys = SubCategory::all();
        $categorys = Category::all();
        return view('pages.sub_category.index',compact('sub_categorys','categorys'));
    }

    public function store($request)
    {
        //return $request;
        DB::beginTransaction();

        try {
            $sub_cat = new SubCategory();
            $sub_cat->subcategory_name = ['ar'=>$request->sub_category_name_ar,'en'=>$request->sub_category_name_en];
            $sub_cat->category_id = $request->category_name;
            $sub_cat->save();
            Db::commit();
            return  redirect()->route('sub_category.index');
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
            $sub_cat =  SubCategory::findOrFail($request->sub_category_id);
            $sub_cat->subcategory_name = ['ar'=>$request->sub_category_name_ar,'en'=>$request->sub_category_name_en];
            $sub_cat->category_id = $request->category_name;
            $sub_cat->save();
            Db::commit();
            return  redirect()->route('sub_category.index');
        }catch (\Exception $e)
        {
            Db::rollBack();
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            SubCategory::destroy($request->sub_category_id);
            return redirect()->route('sub_category.index');
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
