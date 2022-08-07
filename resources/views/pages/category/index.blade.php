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
                    <button class="btn btn-success" data-toggle="modal" data-target="#Add_Category">{{trans('main.Add Category')}}</button>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('main.Category Name') }}</th>
                            <th>{{ trans('main.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($categorys as $category)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <th>{{ $category->category_name }}</th>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#Edit_Category{{$category->id}}" >{{trans('main.Edit')}}</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Delete_Category{{$category->id}}" >{{trans('main.Delete')}}</button>
                                </td>
                            </tr>
                        @include('pages.category.edit')
                        @include('pages.category.delete')
                        @endforeach
                    </table>
                </div>

                    @include('pages.category.add')
            </div>
        </div>
    </div>
</div>


@endsection
{{--
@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    @endsection
--}}
