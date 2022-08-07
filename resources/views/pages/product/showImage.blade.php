@extends('admin.master')

@section('pageTitle')
     Product Images
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
                @foreach($images as $image)
                    <div class="inline">
                <img src="{{asset('photos/'.$products->id.'/'.$image->image_name)}}" alt="..." width="400" height="400" class="img-fluid">
                    </div>

                            <br>
                        @endforeach

                    <a style="text-decoration: none;" href="{{route('product.index')}}"><button class="btn btn-info">Back</button> </a>
                </div>
            </div>
        </div>
    </div>


    @endsection
