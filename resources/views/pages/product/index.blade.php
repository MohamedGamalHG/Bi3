@extends('admin.master')
@section('title')
    JUMIA
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
                <div style="margin-bottom: 28px;" >
                    <button class="btn btn-success"><a style="color:white;text-decoration: none;"
                            href="{{route('wizard_from')}}">{{trans('main.Add Product')}}</a></button>

                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('main.Name') }}</th>
                            <th>{{ trans('main.Price') }}</th>
                            <th>{{ trans('main.Quantity') }}</th>
                            <th>{{ trans('main.Description') }}</th>
                            <th>{{ trans('main.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($products as $product)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <th>{{ $product->getTranslation('name',App()->getLocale()) }}</th>
                                <th>{{ $product->price }}</th>
                                <th>{{ $product->quantity }}</th>
                                <th>{{ $product->description }}</th>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" >
                                        <a href="{{route('createImage',$product->id)}}" style="text-decoration: none;">Show Image</a></button>
                                    <button type="button" class="btn btn-info btn-sm">
                                        <a style="text-decoration: none;" href="{{route('product.edit',$product->id)}}">{{trans('main.Edit')}}</a></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Delete_Category{{$product->id}}" >{{trans('main.Delete')}}</button>
                                </td>
                            </tr>
                        @include('pages.product.delete')
                        @endforeach
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
{{--@include('pages.product.add')--}}
@endsection
