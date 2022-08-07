<?php


namespace App\Http\Repository\Customer;


interface HomeRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function edit($id);
    public function show($id);

}
