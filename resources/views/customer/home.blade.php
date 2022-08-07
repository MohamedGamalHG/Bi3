
<!--===============================
=            Hero Area            =
================================-->
@extends('customer.master')
@section('content')
<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @error('logged')
                <div class="btn btn-danger" id="logged">{{$message}} X</div>
                @enderror
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Popular Category</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-bed"></i> Hotel</a></li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-grav"></i> Fitness</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-car"></i> Cars</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-cutlery"></i> Restaurants</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-coffee"></i> Cafe</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Advance Search -->
               {{-- <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                            <input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                                   placeholder="What are you looking for">
                                        </div>
                                        <div class="form-group col-lg-3 col-md-6">
                                            <select class="w-100 form-control mt-lg-1 mt-md-2">
                                                <option>Category</option>
                                                <option value="1">Top rated</option>
                                                <option value="2">Lowest Price</option>
                                                <option value="4">Highest Price</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-6">
                                            <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
                                        </div>
                                        <div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
                                            <button type="submit" class="btn btn-primary active w-100">Search Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="section-title">
                    <h2>All Categories</h2>
                </div>
                <div class="row">
                    <!-- Category list -->
                   @foreach($category as $cat)
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">


                        <div class="category-block">

                            <div class="header">

                                <i class="fa fa-laptop icon-bg-1"></i>

                                    <h4>{{$cat->category_name}}</h4>

                            </div>
                            @foreach($cat->sub_categories as $sub)
                            <ul class="category-list">
                                {{--@if($cat->id == $sub->category_id)--}}
                                <li><a href="{{route('category',$sub->id)}}">{{ $sub->subcategory_name }} <span></span></a></li>
                                {{--@endif--}}
                                {{--<li><a href="">Iphone <span>233</span></a></li>
                                <li><a href="">Microsoft <span>183</span></a></li>
                                <li><a href="">Monitors <span>343</span></a></li>--}}
                            </ul>
                            @endforeach
                        </div>
                    </div> <!-- /Category List -->
                    <!-- Category list -->
                    @endforeach





                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>


<!--====================================
=            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-3 section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8">
                <div class="content-holder">
                    <h2>Start today to get more exposure and
                        grow your business</h2>
                    <ul class="list-inline mt-30">
                        <li class="list-inline-item"><a class="btn btn-main" href="{{route('listing')}}">Add Listing</a></li>
                        <li class="list-inline-item"><a class="btn btn-secondary" href="">Browser Listing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
                <!-- About -->
                <div class="block about">
                    <!-- footer logo -->
                    <!-- description -->
                    <p class="alt-color">this website for testing and for trinning if any mistak from the team :)</p>
                </div>
            </div>
            <!-- Link list -->
            <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
                <div class="block">
                    <h4>Site Pages</h4>
                    <ul>
                        <li><a href="">My Ads</a></li>
                        <li><a href="">Favourite Ads</a></li>
                        <li><a href="">Archived Ads</a></li>
                        <li><a href="">Pending Ads</a></li>
                        <li><a href="">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <!-- Link list -->
            <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
                <div class="block">
                    <h4>Admin Pages</h4>
                    <ul>
                        <li><a href="">Category</a></li>
                        <li><a href="">Single Page</a></li>
                        <li><a href="">Store Single</a></li>
                        <li><a href="">Single Post</a>
                        </li>
                        <li><a href="">Blog</a></li>



                    </ul>
                </div>
            </div>
            <!-- Promotion -->
            <div class="col-lg-4 col-md-7">
                <!-- App promotion -->
                <div class="block-2 app-promotion">
                    <div class="mobile d-flex  align-items-center">
                        <a href="">
                            <!-- Icon -->
                        </a>
                        <p class="mb-0">Get the Dealsy Mobile App and Save more</p>
                    </div>
                    <div class="download-btn d-flex my-3">
                        <a href=""><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
                        <a href="" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
                <!-- Copyright -->
                <div class="copyright">
                    <p>Copyright &copy; <script>
                            var CurrentYear = new Date().getFullYear()
                            document.write(CurrentYear)
                        </script>. Designed & Developed by <a class="text-white" href="https://themefisher.com">MMG</a></p>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Social Icons -->
                <ul class="social-media-icons text-center text-lg-right">
                    <li><a class="fa fa-facebook" href="https://www.facebook.com/Mohamed GamalHamza"></a></li>
                    <li><a class="fa fa-github-alt" href="https://www.github.com/MohamedGamalHG"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="fa fa-angle-up"></i>
    </div>
</footer>
@endsection
@section('js')
    <script>

        function check()
        {
            setTimeout("testlog()",2000);
        }
        function testlog()
        {
            document.write("you are already logged");
        }
    </script>
    @endsection
