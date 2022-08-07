<?php
namespace App\Http\Repository\Admin;

use App\Models\Category;
use App\Models\Filter;
use App\Models\SubFilter;
use Illuminate\Support\Facades\DB;

class SubFilterRepository implements SubFilterRepositoryInterface
{
    public function index()
    {
        $subfilters = SubFilter::all();
        $filters = Filter::all();
        return view('pages.subfilter.index',compact('subfilters','filters'));
    }

    public function store($request)
    {
        //return $request;
        DB::beginTransaction();

        try {
            $subfilters = new SubFilter();
            $subfilters->subfilter_name = ['ar'=>$request->subfilter_name_ar,'en'=>$request->subfilter_name_en];
            $subfilters->filter_id =$request->filter_id;
            $subfilters->save();
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
            $subfilters =  SubFilter::findOrFail($request->subfilter_id);
            $subfilters->subfilter_name = ['ar'=>$request->subfilter_name_ar,'en'=>$request->subfilter_name_en];
            $subfilters->filter_id =$request->filter_id;
            $subfilters->save();
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
            SubFilter::destroy($request->id);
            return redirect()->route('subfilter.index');
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }


}
