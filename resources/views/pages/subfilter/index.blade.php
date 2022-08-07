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
                    <button class="btn btn-success" data-toggle="modal" data-target="#Add_SubFilter">{{trans('main.Add Sub Filter')}}</button>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('main.Sub Filter Name') }}</th>
                            <th>{{ trans('main.Filter Name') }}</th>
                          {{--  <th>{{ trans('main.Product Name') }}</th>--}}
                            <th>{{ trans('main.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($subfilters as $subfilter)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <th>{{ $subfilter->subfilter_name }}</th>
                                <th>{{ $subfilter->filters->filter_name }}</th>
                               {{-- <th>{{ $subfilter->products->name }}</th>--}}
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#Edit_SubFilter{{$subfilter->id}}" >{{trans('main.Edit')}}</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Delete_SubFilter{{$subfilter->id}}" >{{trans('main.Delete')}}</button>
                                </td>
                            </tr>
                        @include('pages.subfilter.edit')
                        @include('pages.subfilter.delete')
                        @endforeach
                    </table>
                </div>

                    @include('pages.subfilter.add')
            </div>
        </div>
    </div>
</div>








@endsection
