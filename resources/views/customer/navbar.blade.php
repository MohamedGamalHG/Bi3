<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

<nav class="navbar navbar-expand-lg navbar-light navigation">
    <a class="navbar-brand ml-5" href="{{route('customer.index')}}">
        Bi3
    </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto main-nav ">
           <li>
               <div class="advance-search">
                   <div class="container">
                       <div class="row justify-content-center">
                           <div class="col-lg-12 col-md-12 align-content-center">
                               <form>
                                   <div class="form-row">
                                       <div class="form-group col-xl-6 col-lg-3 col-md-6">
                                           <input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                                  placeholder="search">
                                       </div>
                                       {{--<div class="form-group col-lg-3 col-md-6">
                                           <select class="w-100 form-control mt-lg-1 mt-md-2">
                                               <option>Category</option>
                                               <option value="1">Top rated</option>
                                               <option value="2">Lowest Price</option>
                                               <option value="4">Highest Price</option>
                                           </select>
                                       </div>--}}
                                       {{--<div class="form-group col-lg-3 col-md-6">
                                           <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
                                       </div>--}}
                                       <div class="form-group col-xl-6 col-lg-3 col-md-6 align-self-center">
                                           <button type="submit" class="btn btn-primary active w-100">Search Now</button>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-10">
            {{--<button type="button" class="btn btn-light btn-sm dropdown-toggle mr-4 ml-4" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
--}}            @if(!isset(auth()->guard('customer')->user()->name))
            <li class="nav-item">
                <a class="nav-link login-button ml-1" href="{{route('login_view')}}">Login</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white add-button" href="{{route('listing')}}"><i class="fa fa-plus-circle"></i> Add Listing</a>
            </li>
          {{-- @if(Session::has('name') )
            <li class="nav-item">
                <a class="nav-link login-button ml-1">{{Session::get('name')}}</a>
            </li>
               @endif--}}

            @if(isset(auth()->guard('customer')->user()->name))
            <li class="nav-item">
                <a class="nav-link login-button ml-1">{{auth()->guard('customer')->user()->name}}</a>
            </li>
                <li class="nav-item">
                    <a href="{{route('logout_customer')}}" class="nav-link login-button ml-1">Logout</a>
                </li>
                @endif

        </ul>
    </div>
</nav>
            </div>
        </div>
    </div>
</header>
