<?php
namespace App\Http\Repository\Admin;

use App\Models\Category;
use App\Models\Filter;
use Illuminate\Support\Facades\DB;

class FilterRepository implements FilterRepositoryInterface
{
    public function index()
    {
        $filters = Filter::all();
        return view('pages.filter.index',compact('filters'));
    }

    public function store($request)
    {
        //return $request;
        DB::beginTransaction();

        try {
            $filter = new Filter();
            $filter->filter_name = ['ar'=>$request->filter_name_ar,'en'=>$request->filter_name_en];
            $filter->save();
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

            $filter =  Filter::findOrFail($request->filter_id);
            $filter->filter_name = ['ar'=>$request->filter_name_ar,'en'=>$request->filter_name_en];
            $filter->save();

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
            Filter::destroy($request->id);
            return redirect()->route('filter.index');
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

}
