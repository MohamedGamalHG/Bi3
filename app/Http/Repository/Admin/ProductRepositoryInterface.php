<?php


namespace App\Http\Repository\Admin;


interface ProductRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function edit($id);
    public function show($id);
    public function createImage($id);
}
