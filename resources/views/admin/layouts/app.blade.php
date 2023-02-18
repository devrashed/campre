<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <!-- Scripts -->
    @vite(['resources/assets/sass/app.scss', 'resources/assets/js/app.js'])
    
    <!-- dashboard css -->

    @vite(['resources/assets/css/admin_style.css'])
    @vite(['resources/assets/css/bootstrap-icons.css'])
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/boxicons.min.css'])
    @vite(['resources/assets/css/quill.bubble.css'])
    @vite(['resources/assets/css/quill.snow.css'])
    @vite(['resources/assets/css/remixicon/remixicon.css'])

    <!-- dashboard Js -->
    @vite(['resources/assets/js/main.js'])
    @vite(['resources/assets/js/custom.js'])
    @vite(['resources/assets/js/bootstrap.bundle.min.js'])
    @vite(['resources/assets/js/bootstrap.js'])
    @vite(['resources/assets/js/simple-datatables/simple-datatables.js'])
    @vite(['resources/assets/js/quill/quill.min.js'])


</head>
<body>
    <div id="app">
         <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{!! url('/home'); !!}" class="logo d-flex align-items-center">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">Camper Dashboard </span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                      <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            
                            <li>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                </ul>
            </nav><!-- End Icons Navigation -->
        </header><!-- End Header -->
</div>

<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{!! url('/home'); !!}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Prodcuts info</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li> 
            <a href="{!! url('/addcat'); !!}">
              <i class="bi bi-circle"></i><span>Add New Category</span>
            </a>
        </li>
        <li> 
            <a href="{!! url('/viewcat'); !!}">
              <i class="bi bi-circle"></i><span>View Category</span>
            </a>
        </li>
        <li> 
            <a href="{!! url('/addproduct'); !!}">
              <i class="bi bi-circle"></i><span>Add New Product </span>
            </a>
        </li> 
        <li> 
            <a href="{!! url('/viewproduct'); !!}">
              <i class="bi bi-circle"></i><span>View Product </span>
            </a>
        </li>
        <li> 
            <a href="{!! url('/storevariant'); !!}">
              <i class="bi bi-circle"></i><span>Add Product Variant</span>
            </a>
        </li> 

        <li> 
            <a href="{!! url('/viewvariant'); !!}">
              <i class="bi bi-circle"></i><span>View all Variant</span>
            </a>
        </li> 

        </ul> 
      </li>
    </ul>
 </aside><!-- End Sidebar-->

  <!-- ======= Main Body ======= -->
  
        <main class="py-4">
            @yield('content')
        </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
        <!-- <div class="copyright">  Copyright NiceAdmin. All Rights Reserved </div> -->

  </footer><!-- End Footer -->

    </div>
</body>
</html>
