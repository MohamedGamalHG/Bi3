<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function __construct(ProductRepositoryInterface $pro)
    {
        $this->product = $pro;
    }

    public function index()
    {

        return $this->product->index();
    }

    public function store(Request $request)
    {
        return $this->product->store($request);
    }


    public function update(Request $request)
    {
        return $this->product->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->product->destroy($request);
    }


    public function show($id)
    {
        return $this->product->show($id);
    }


    public function edit($id)
    {
        return $this->product->edit($id);
    }
    public function createImage($id)
    {
        return $this->product->createImage($id);
    }



}
