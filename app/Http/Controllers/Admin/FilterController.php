<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\FilterRepositoryInterface;
use Illuminate\Http\Request;

class FilterController extends Controller
{
   protected $filter;
   public function __construct(FilterRepositoryInterface $filt)
   {
        $this->filter = $filt;
   }

    public function index()
    {
        return $this->filter->index();
    }


    public function store(Request $request)
    {
        return $this->filter->store($request);
    }


    public function update(Request $request)
    {
        return $this->filter->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->filter->destroy($request);
    }
}
