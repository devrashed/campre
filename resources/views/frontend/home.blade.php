@extends('frontend.app')
@section('title','Welcome To Camper')
@section('content')     
        
    <div class="main-sections oh">    

        <div class="all-sections">
            <div class="banner-section oh rounded--5 mb-30">
    <div class="banner-slider owl-theme owl-carousel">
                <a href="category/3/womens-fashion" class="d-block">
            <div class="slide-item">

                    <img src="https://script.viserlab.com/visermart/assets/images/frontend/sliders/606ab6dbccedd1617606363.png" alt="slider">
                </div>
            </a>
                <a href="category/2/clothing" class="d-block">
            <div class="slide-item">

                    <img src="https://script.viserlab.com/visermart/assets/images/frontend/sliders/606ab765333751617606501.png" alt="slider">
                </div>
            </a>
                <a href="category/36/drones" class="d-block">
            <div class="slide-item">

                    <img src="https://script.viserlab.com/visermart/assets/images/frontend/sliders/606ab7dc2b7681617606620.png" alt="slider">
                </div>
            </a>
                <a href="category/30/covid-19-protections" class="d-block">
            <div class="slide-item">

                    <img src="https://script.viserlab.com/visermart/assets/images/frontend/sliders/606ab817d835b1617606679.png" alt="slider">
                </div>
            </a>
            </div>
    <div class="slide-progress"></div>
</div>


        </div>
 
    </div>


            <!-- Featured Section Starts Here -->
 <!-- <div class="featured-section padding-bottom-half padding-top-half oh">
    <div class="container">
        <div class="section-header-2">
            <h3 class="title">Our Featured Products</h3>
        </div>

        <div class="m--15">
            <div class="product-slider-2 owl-carousel">
            
            </div>
        </div>
    </div>
</div> -->

<!-- Featured Section Ends Here -->


 <div class="container">  
    <div class="section-header-2">
        <h3 class="title">Our Featured Products</h3>
    </div>
</div>

@foreach($data as $showproduct)


 <div class="product-item-2">
            <div class="product-item-2-inner wish-buttons-in">
                <div class="product-thumb">
                    <a href="./single-product/{{$showproduct->pid}}/{{$showproduct->slug}}">
                        <img src="{!! url('/'); !!}/{{$showproduct->vimage}}" alt="flash">
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-before-content">
                        <h6 class="title">
            <a href="./single-product/{{$showproduct->pid}}/{{$showproduct->slug}}">{{$showproduct->pname}}</a>
                        </h6>
                        <div class="ratings-area justify-content-between">
                            <div class="price">${{$showproduct->vprice}}.00</div>
                        </div>
                    </div>
                    <div class="product-after-content">
                        <button data-product="23" class="cmn-btn btn-sm quick-view-btn">View </button>
                        <div class="price">${{$showproduct->vprice}}.00</div>
                    </div>
                </div>
            </div>
        </div>
       
     @endforeach
 




@endsection
