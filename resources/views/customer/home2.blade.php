@extends('customer.master')
@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    @error('msg')
                    <h6 id="error">{{$message}} X</h6>
                    @enderror
                    <h2>Results For "Electronics"</h2>
                    <p>123 Results on 12 December, 2017</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="category-sidebar">
                        {{--<div class="widget category-list">
                            <h4 class="widget-header">All Category</h4>
                            <ul class="category-list">
                                <?php $i = 0; ?>
                                @foreach($categorys as $category)
                                <li><a href="#">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>--}}

                    <div class="widget category-list">
                        <h4 class="widget-header">Sub Category</h4>
                        <ul class="category-list">
                            @foreach($subcat_product as $sub_pro)
                            <li><a href="{{route('show_product',[$sub_pro->subcategory_name,$sub_pro->id])}}">{{$sub_pro->subcategory_name}}<span>{{$sub_pro->products_count}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    {{--<div class="widget filter">
                        <h4 class="widget-header">Show Produts</h4>
                        <select>
                            <option>Popularity</option>
                            <option value="1">Top rated</option>
                            <option value="2">Lowest Price</option>
                            <option value="4">Highest Price</option>
                        </select>
                    </div>--}}

                    <div class="widget price-range w-100 ">
                        <h4 class="widget-header">Price Range</h4>
                            <div class="row-cols-auto">
                                <div class="col-md-4">
                                    <form method="post" action="{{route('filter_product')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{url()->current('id')}}">
                                       <input type="number" min="0" name="min_price" class="mb-2" placeholder="min..">
                                       <input type="number" min="0" name="max_price" class="mt-1 mb-2" placeholder="max..">
                                        <input type="submit" name="submit" value="Send" class="btn btn-sm ">
                                    </form>
                                </div>
                            </div>
                    </div>

                    <div class="widget product-shorting">
                        <h4 class="widget-header">By Condition</h4>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Brand New
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Almost New
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Gently New
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Havely New
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left">
                            <strong>Short</strong>
                            <select>
                                <option>Most Recent</option>
                                <option value="1">Most Popular</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
                        </div>
                        <div class="col-md-6 text-center text-md-right mt-2 mt-md-0">
                            <div class="view">
                                <strong>Views</strong>
                                <ul class="list-inline view-switcher">
                                    <li class="list-inline-item">
                                        <a href="#!" onclick="event.preventDefault();" class="text-info"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="ad-list-view.html"><i class="fa fa-reorder"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

              {{-- @yield('ContentProduct')--}}


                <div class="product-grid-list">
                    <div class="row mt-30">
                        {{-- @for($i = 0;$i<6;$i++)--}}
                            <?php $i=0 ?>
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <!-- product card -->
                                <div class="product-item bg-light">
                                    <div class="card">
                                        <div class="thumb-content">
                                            <!-- <div class="price">$200</div> -->

                                            <a href="{{route('about_product',$product->id)}}">
                                                <img class="card-img-top img-fluid"
                                                     src="{{url('photos/'.$product->id.'/'.$product->images[0]->image_name)}}"
                                                     alt="Card image cap">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="{{route('about_product',$product->id)}}">{{$product->name}}</a></h4>
                                            <h4 class="card-title">{{$product->price}}</h4>
                                            <p class="card-text">{{$product->description}}</p>
                                            {{-- <div class="product-ratings">
                                                 <ul class="list-inline">
                                                     <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                     <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                     <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                     <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                     <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                 </ul>
                                             </div>--}}
                                        </div>
                                    </div>
                                </div>



                            </div>
                            {{--@endfor--}}
                        @endforeach

                    </div>
                </div>



            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        window.addEventListener('load',function (){
           var err = document.getElementById('error');
           err.style.color  = "red";
            document.getElementById('error').onclick = function (){
                document.getElementById('error').style.display = "none";
            }
        });
    </script>
    @endsection
