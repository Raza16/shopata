<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('backend/images/logo.svg')}}" alt="image"/>
                </div>
                <div class="profile-name">
                    <p class="name" style="text-transform: uppercase">
                    {{ Auth::user()->name }}
                    </p>
                    <p class="designation" style="text-transform: uppercase">
                    {{ Auth::user()->role->name}}
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item {{  request()->is('admin/dashbord') ? 'active' : ''}}">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- blogs --}}
        <li class="nav-item d-none d-lg-block btn">
            <a class="nav-link" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
            <i class="fab fa-blogger-b" style="font-size: 20px"></i>
            &nbsp;
            <span class="menu-title">Blogs</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blogs">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('admin/blog')}}">Blog list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/blog/create')}}">Blog Add</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- products menu --}}
        <li class="nav-item d-none d-lg-block btn">
        <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
            <i class="ti-bag" style="font-size: 20px"></i>&nbsp;
            <span class="menu-title">Products</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="products">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link " href="{{url('admin/product')}}">Products List</a></li>
            <li class="nav-item"> <a class="nav-link " href="{{url('admin/product/create')}}">Product Add</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/brand')}}">Brands</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/variation')}}">Variation</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item d-none d-lg-block btn">
            <a class="nav-link"  href="{{url('admin/banner')}}" >
                <i class="ti-id-badge" style="font-size: 25px"></i>&nbsp;
                <span class="menu-title">Banners</span>
            </a>
        </li>
    </ul>
</nav>
