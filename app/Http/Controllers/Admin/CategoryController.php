<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryRepositoryInterface $cat)
    {
        $this->category = $cat;
    }

    public function index()
    {
        return $this->category->index();
    }

    public function store(Request $request)
    {
        return $this->category->store($request);
    }

    public function update(Request $request)
    {
        return  $this->category->update($request);
    }


    public function destroy(Request $request)
    {
        return  $this->category->destroy($request);
    }
}
