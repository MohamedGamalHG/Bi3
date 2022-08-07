@extends('admin.master')

@section('pageTitle')
    Edit Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class=" row mb-30" action="{{ route('product.update','test') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Fees">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="hidden" name="id" value="{{$products->id}}">
                                                <input type="hidden" name="old_name" value="{{$products->name}}">
                                                <label for="name" class="mr-sm-2">Arabic Product Name</label>
                                                <div class="box">
                                                    <input type="text" value="{{$products->getTranslation('name','ar')}}" class="form-control" name="name_ar" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="hidden" name="id" value="{{$products->id}}">
                                                <input type="hidden" name="old_name" value="{{$products->name}}">
                                                <label for="name" class="mr-sm-2">English Product Name</label>
                                                <div class="box">
                                                    <input type="text" value="{{$products->getTranslation('name','en')}}" class="form-control" name="name_en" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="price" class="mr-sm-2">Price</label>
                                                <div class="box">
                                                    <input type="number"value="{{$products->price}}" class="form-control" name="price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="quantity" class="mr-sm-2">Quantity</label>
                                                <div class="box">
                                                    <input type="number" value="{{$products->quantity}}" class="form-control" name="quantity" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="sub_cat" class="mr-sm-2">Sub Category</label>
                                                <select class="form-control" name="subcategory">
                                                    @foreach($sub_cats as $sub_cat)
                                                        <option value="{{$sub_cat->id}}">{{$sub_cat->subcategory_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="image" class="mr-sm-2">you have {{$images}} Images you need to add more ?</label>
                                                <div class="box">
                                                    <input type="file" class="form-control" name="image[]" accept="image/*" multiple >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="description" class="mr-sm-2">Description</label>
                                                <div class="box">
                                                    <input type="text" class="form-control" value="{{$products->description}}" name="description" required>
                                                </div>
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-primary" style="margin-top: 15px">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

@endsection
