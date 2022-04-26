<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('/assets/css/now-ui-dashboard.css?v=1.3.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/assets/demo/demo.CSS')}}" rel="stylesheet" />



  <style>
    .tags {
    display: inline;
    position: relative;
  }

  .tags:hover:after {
    background: #333;
    background: rgba(0, 0, 0, .8);
    border-radius: 5px;
    bottom: -34px;
    color: #fff;
    content: attr(gloss);
    left: 20%;
    padding: 5px 15px;
    position: absolute;
    z-index: 98;
    width: 350px;
  }

  .tags:hover:before {
    border: solid;
    border-color: #333 transparent;
    border-width: 0 6px 6px 6px;
    bottom: -4px;
    content: "";
    left: 50%;
    position: absolute;
    z-index: 99;
  }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          Admin
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
         Trang quản lí
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav "  >
          
         <li>
            <a href="{{route('type')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Danh sách loại sản phẩm</p>
            </a>
          </li>

          <li>
            <a href="{{route('sanpham')}}">
              <i class="now-ui-icons location_map-big"></i>
              <p>Danh sách sản phẩm</p>
            </a>
          </li>
          
      
          <li>
            <a href="{{route('customer')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Customer</p>
            </a>
          </li>
          <li>
            <a href="{{route('cart')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Đơn hàng</p>
            </a>
          </li>
          
          <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Tài khoản</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <!-- Body -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

        @yield('content')
        

      </div>


      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <script src="{{ asset('/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
 
  <script src="{{ asset('/assets/js/plugins/ch/assets/js/plugins/bootstrap-notify.jsartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets/js/now-ui-dashboard.min.js?v=1.3.0')}}" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  @yield('scripts')
</body>

</html>