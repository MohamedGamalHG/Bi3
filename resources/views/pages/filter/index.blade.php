@extends('admin.master')
@section('pageTitle')
    Category
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
                    <button class="btn btn-success" data-toggle="modal" data-target="#Add_Filter">{{trans('main.Add Filter')}}</button>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('main.Filter Name') }}</th>
                            <th>{{ trans('main.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($filters as $filter)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <th>{{ $filter->filter_name }}</th>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#Edit_Filter{{$filter->id}}" >{{trans('main.Edit')}}</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Delete_Filter{{$filter->id}}" >{{trans('main.Delete')}}</button>
                                </td>
                            </tr>
                        @include('pages.filter.edit')
                        @include('pages.filter.delete')
                        @endforeach
                    </table>
                </div>

                    @include('pages.filter.add')
            </div>
        </div>
    </div>
</div>








@endsection
