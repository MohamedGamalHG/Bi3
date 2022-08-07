<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\SubFilterRepositoryInterface;
use Illuminate\Http\Request;

class SubFilterController extends Controller
{
    protected $subfilter;
    public function __construct(SubFilterRepositoryInterface $sub)
    {
        $this->subfilter = $sub;
    }

    public function index()
    {
        return $this->subfilter->index();
    }


    public function store(Request $request)
    {
        return $this->subfilter->store($request);
    }


    public function update(Request $request)
    {
        return $this->subfilter->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->subfilter->destroy($request);
    }
}
