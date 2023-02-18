@extends('frontend.app')
@section('title','Add New Product')
@section('content')


<!-- <div class="hero-section section-bg py-4">
    <div class="container">
        <ul class="breadcrumb">

                <li><a href="https://script.viserlab.com/visermart">Home</a></li>

            <li>Product Details</li>
           
        </ul>
    </div>
</div> -->
        
<!-- Product Single Section Starts Here -->
<div class="category-section padding-bottom-half padding-top oh">
    <div class="container">
        <div class="row product-details-wrapper">
        <div class="col-lg-5 variant-images">
            <div class="sync1 owl-carousel owl-theme" style="display: inherit;">
                <div class="thumbs">
                <img class="singleimage" src="{{url('/')}}/{{$singlepro->vimage}}" alt="products-details">
                    </div>
                 </div>
            </div>

            <div class="col-lg-7">
                <div class="product-details-content product-details">
                    <h4 class="title">{{$singlepro->pname}}</h4>

                    <div style="width:250px; margin:20px 0px;"> 

                       @foreach($vdata as $value)
                        <pre>{{$value->varname}}</pre>
                       @endforeach  

                    </div>                        
     
                    <div class="cart-and-coupon mt-3">
                        <div class="cart-plus-minus quantity">
                            <div class="cart-decrease qtybutton dec">
                                <i class="las la-minus"></i>
                            </div>
                            <input type="number" name="quantity" step="1" min="1" value="1" class="integer-validation">
                            <div class="cart-increase qtybutton inc">
                                <i class="las la-plus"></i>
                            </div>
                        </div>

        <div class="add-cart">
         <button type="submit" class="cmn-btn cart-add-btn" data-id="2">Add To Cart</button>
       </div>

                    </div>
                     <div class="price">
                        $<span class="price-data">{{$singlepro->vprice}}</span>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Single Section Ends Here -->

<div class="specification-wrapper">
    <h5 class="title">Description</h5>
     <p><?php echo htmlspecialchars_decode($singlepro->description);?></p>
</div>
</div>


</div>

@endsection