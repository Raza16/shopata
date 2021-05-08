<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="{{url('admin/dashboard')}}">
        <img src="{{asset('backend/images/logo.svg')}}"  alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="{{url('admin/dashboard')}}"><img src="{{asset('backend/images/logo.svg')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="fas fa-bars"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown d-none d-lg-flex">
          <div class="nav-link">
            <span class="dropdown-toggle btn btn-info" id="languageDropdown" data-toggle="dropdown">Quick Links</span>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
              <a class="dropdown-item font-weight-medium" href="{{url('admin/product/create')}}">
                Product +
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="{{url('admin/brand/create')}}">
                Brand +
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="{{url('admin/category/create')}}">
                Categroy +
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{asset('backend/images/logo.svg')}}" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{url('admin/settings')}}">
              <i class="fas fa-cog text-primary"></i>
              Settings
            </a>
            <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt text-primary"></i>
                  {{ __('Logout') }}
                </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="fas fa-bars"></span>
      </button>
    </div>
  </nav>
