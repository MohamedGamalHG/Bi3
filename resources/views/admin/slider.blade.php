
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <div class="container">
            <li class="nav-item">
                <a class="nav-link" href="{{route('category.index')}}">
                    <span class="menu-title">{{trans('main.Category')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sub_category.index')}}">
                    <span class="menu-title">{{trans('main.Sub Category')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('product.index')}}">
                    <span class="menu-title">{{trans('main.Product')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('filter.index')}}">
                    <span class="menu-title">{{trans('main.filter')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('subfilter.index')}}">
                    <span class="menu-title">{{trans('main.subfilter')}}</span>
                </a>
            </li>
        </div>
    </ul>
</nav>
