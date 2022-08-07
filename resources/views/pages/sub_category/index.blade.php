@extends('admin.master')
@section('pageTitle')
    Sub Category
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
                    <button class="btn btn-success" data-toggle="modal"
                            data-target="#Add_Sub_Category">{{trans('main.Add Sub Category')}} </button>
                      </div>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('main.Sub Category Name') }}</th>
                            <th>{{ trans('main.Category Name') }}</th>
                            <th>{{ trans('main.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($sub_categorys as $sub_category)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <th>{{ $sub_category->subcategory_name }}</th>
                                <th>{{ $sub_category->category->category_name }}</th>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#Edit_Category{{$sub_category->id}}" >{{trans('main.Edit')}}</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Delete_Sub_Category{{$sub_category->id}}" >{{trans('main.Delete')}}</i></button>

                                </td>
                            </tr>
                        @include('pages.sub_category.delete')
                        @include('pages.sub_category.edit')
                        @endforeach
                    </table>
                </div>

                    @include('pages.sub_category.add')
            </div>
        </div>
    </div>
</div>
@endsection
