<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\SubCategoryRepositoryInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subcategory;
    public function __construct(SubCategoryRepositoryInterface  $subcat)
    {
        $this->subcategory = $subcat;
    }

    public function index()
    {
       return $this->subcategory->index();
    }


    public function store(Request $request)
    {
        return $this->subcategory->store($request);
    }


    public function update(Request $request)
    {
        return $this->subcategory->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->subcategory->destroy($request);
    }
}
