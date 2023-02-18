<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

<!-- <link rel="stylesheet" href="https://script.viserlab.com/visermart/assets/templates/basic/css/bootstrap.min.css"> -->

    @vite(['resources/assets/frontend/css/bootstrap.min.css'])
    @vite(['resources/assets/frontend/css/fontawesome.all.min.css'])
    @vite(['resources/assets/frontend/css/animate.css']) 
    @vite(['resources/assets/frontend/css/nice-select.css']) 
    @vite(['resources/assets/frontend/css/owl.min.css'])
    @vite(['resources/assets/frontend/css/magnific-popup.css']) 
    @vite(['resources/assets/frontend/css/main.css']) 
    @vite(['resources/assets/frontend/css/custom.css'])

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
 <link rel="shortcut icon" href="https://script.viserlab.com/visermart/assets/images/logoIcon/favicon.png" type="image/x-icon">
</head>
<body>
     <style>
        .shortcut-icons li a{
           color:#FF0000 !important; 
        }
       .header-middle{
        box-shadow: -8px 4px 45px -19px rgba(0,0,0,0.75);
        -webkit-box-shadow: -8px 4px 45px -19px rgba(0,0,0,0.75);
        -moz-box-shadow: -8px 4px 45px -19px rgba(0,0,0,0.75);
       } 
        @media (max-width: 991px) {
         .main-sections {
            padding-bottom: 0px;
          }
        }
        .variant-images {
            width: 100%;
            height: auto;
        }
        .singleimage{
            max-width: 100%;
        }
        .product-item-2 {
            margin: 15px;
            width: 250px;
            height: auto;
        }
        .specification-wrapper {
        width: 100%;
        float: left;
        margin-left: 14px;
        }
        pre{
            background-color: #EFEFEF;
            width: auto;
            color: #000;
            padding: 3px 5px;
            display: inline;
            font-size: 14px;
        }
    </style> 
 <!-- Header Section Starts Here -->

    <header>
        <div class="header-middle bg-white py-3">
            <div class="container">
                <div class="header-wrapper justify-content-between align-items-center">
                    <div class="logo">
                        <a href="{!! url('/'); !!}">
                            <img src="https://script.viserlab.com/visermart/assets/images/logoIcon/logo.png" alt="logo">
                        </a>
                    </div>

            <ul class="menu ml-auto d-none d-lg-flex">
                <li><a href="{!! url('/'); !!}">Home</a></li>
                <li><a href="{!! url('/product-category'); !!}">Products</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div style="float:right;"> 

              <ul class="shortcut-icons">
                        <li>
                            <a href="javascript:void(0)" class="dashboard-menu-bar">
                               <i class="las la-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" id="cart-button">
                              <i class="las la-shopping-bag"></i>
                             <span class="cart-count amount">0</span>
                            </a>
                        </li>
                    </ul>          
            </div>

                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Header Section END -->


<div class="mobile-menu d-lg-none">
        <div class="mobile-menu-header">
            <div class="mobile-menu-close">
                <i class="las la-times"></i>
            </div>
            <div class="logo">
                <a href="#">
                    <img src="https://script.viserlab.com/visermart/assets/images/logoIcon/logo_2.png" alt="logo">
                </a>
            </div>
            
        </div>
      
        <div class="tab-content">
            <div class="tab-pane fade show active" id="menu">
                <div class="mobile-menu-body">
                    <ul class="menu mt-4">
                        <li>
                            <a href="#">Home</a>
                        </li>

                        <li>
                            <a href="#">Products</a>
                        </li>

                        <li>
                            <a href="#">Brands</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ===========Cart=========== -->


            @include('frontend.popupcart')

    <!-- ===========Cart End=========== -->

   

    <!-- ===========Start Login=========== -->

             @include('frontend.ulogin')

      <!-- ===========Login End=========== -->    


 <!-- ======= Main Body ======= -->
<div class="main-sections oh">

     @yield('content')

</div>
    <!-- Footer Section Starts Here -->

  <footer class="bg-3">
    <div class="container">
        <div class="footer-bottom">
            <div class="footer-widget widget-about">
                <div class="logo">
                    <a href="https://script.viserlab.com/visermart">
                        <img class="w-100 h-auto" src="https://script.viserlab.com/visermart/assets/images/logoIcon/logo_2.png" alt="logo">
                    </a>
                </div>
                <p>Visermart brings you tons of products in over 20+ different categories, including men's fashion, women's fashion, baby fashion, and more.</p>

            </div>
            <div class="footer-widget widget-link">
                <h5 class="title cl-white">Pages</h5>
                <ul>
<li><a href="#">Returns and Exchanges</a></li>
<li><a href="#">Shipping and Delivery</a></li>
<li><a href="#">Terms and Conditions</a></li>
<li><a href="#">Privacy and Policies</a></li>
     </ul>
            </div>
            <div class="footer-widget widget-link">
                <h5 class="title cl-white">Useful link</h5>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Track Your Order</a></li>
                </ul>
            </div>

            <div class="footer-widget widget-link widget-contact">
                <h5 class="title cl-white">Contact Us</h5>
                <ul>
                    <li>
                        <i class="las la-map-marker"></i>
                        Visermart, House 60, Road #5555
                    </li>
                    <li>
                        <a href="Tel:+ (001) 001 001"><i class="las la-phone"></i>+ (001) 001 001</a>
                    </li>
                    <li>
                        <a href="/cdn-cgi/l/email-protection#e793829493a7948e9382c984888a"><i class="las la-envelope"></i><span class="__cf_email__" data-cfemail="a2d6c7d1d6e2d1cbd6c78cc1cdcf">[email&#160;protected]</span></a>
                    </li>
                </ul>
            </div>


        </div>
        <div class="footer-copyright">
            <div class="copyright-area d-flex flex-wrap align-items-center justify-content-between">
                <div class="left">
                    <p>Copyright © visermart 2021. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section Ends Here -->

  <!------ Footer ------> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>   
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
     <!-- @vite(['resources/assets/frontend/js/jquery-3.3.1.min.js']) -->
     @vite(['resources/assets/frontend/js/modernizr-3.6.0.min.js'])
    <!--  @vite(['resources/assets/frontend/js/jquery-ui.min.js'])  -->
     <!-- @vite(['resources/assets/frontend/js/bootstrap.min.js'])  -->
     @vite(['resources/assets/frontend/js/isotope.pkgd.min.js']) 
     @vite(['resources/assets/frontend/js/magnific-popup.min.js']) 
     @vite(['resources/assets/frontend/js/owl.min.js'])
     @vite(['resources/assets/frontend/js/countdown.min.js'])
     @vite(['resources/assets/frontend/js/viewport.jquery.js'])
     @vite(['resources/assets/frontend/js/zoomsl.min.js']) 
     @vite(['resources/assets/frontend/js/nice-select.js'])  
     @vite(['resources/assets/frontend/js/main.js']) 
     @vite(['resources/assets/frontend/js/dev.js']) 

 <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> 

<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/jquery-3.3.1.min.js"></script>
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/modernizr-3.6.0.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/jquery-ui.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/bootstrap.min.js"></script> 

<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/isotope.pkgd.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/magnific-popup.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/owl.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/countdown.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/wow.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/viewport.jquery.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/zoomsl.min.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/nice-select.js"></script>
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/main.js"></script> 
<script src="https://script.viserlab.com/visermart/assets/templates/basic/js/dev.js"></script> -->  

</body>
</html>
