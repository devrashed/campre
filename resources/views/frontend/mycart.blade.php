@extends('frontend.app')
@section('title','Add New Product')
@section('content')


  <!-- <div class="mobile-menu d-lg-none">
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
    </div> -->
    
            <!-- cart-section start -->
    <div class="cart-section padding-bottom padding-top">
        <div class="container">
                        <table class="order-list-table table cart-table m-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Variant</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                                    
                    <tr class="cart-row">
                        <td data-label="Product">
                            <a href="https://script.viserlab.com/visermart/product/detail/2/slim-trapered-rip-jeans" class="cart-item">
                                <div class="cart-img">
                                    <img src="https://script.viserlab.com/visermart/assets/images/product/602a6a82776391613392514.jpg" alt="product-image">
                                </div>
                                <div class="cart-cont">
                                    <h6 class="title">Slim Trapered Rip Jeans</h6>
                                </div>
                            </a>
                        </td>

                        <td data-name="Variant">
                          Color : Red<br> 
                        </td>


                        <td data-label="Price">
                            $530.00                        
                        </td>

                        <td data-label="Quantity">
                            <div class="cart-plus-minus p-0 flex-nowrap justify-content-center quantity">
                                <div class="cart-decrease qtybutton dec">
                                    <i class="las la-minus"></i>
                                </div>
                                <input type="number" data-id="3675" data-price="530" class="qty integer-validation" type="number" min="1" step="1" value="2">
                                <div class="cart-increase qtybutton inc active">
                                    <i class="las la-plus"></i>
                                </div>
                            </div>
                        </td>

                        <td data-label="Total" class="text-right">
                            <div>$<span class="total_price">1,060.00</span>
                            </div>
                        </td>

                        <td data-label="Action">
                            <a href="javascript:void(0)">
                                <span class="edit remove-cart" data-id="3675">
                                    <i class="las la-trash"></i>
                                </span>
                            </a>
                        </td>

                    </tr>
                                            </table>
            <div class="cart-total section-bg ">
                <div class="m--15 d-flex flex-wrap align-items-center justify-content-between">
                    <div class="apply-coupon-code">
                                            </div>
                    <div class="total">
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="sub--total">Subtotal</div>
                            <span class="amount">$<span id="cartSubtotal">1,060.00</span></span>
                        </div>
                        <div class="coupon-amount-total  d-none ">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="sub--total">

                                    <span class="mr-2 cl-theme remove-coupon"><i class="la la-times-circle"></i></span>

                                    <span>Coupon (<b class="couponCode"></b>) </span>

                                </div>
                                <span class="amount">$<span id="couponAmount"> 0</span> </span>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="sub--total"><span>Total </span></div>
                                <span class="amount">$<span id="finalTotal">1060</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout mt-3 d-flex justify-content-between">
                <a href="#" class="theme custom-button">Continue Shopping</a>
                <a href="#" class="theme-2 custom-button">Checkout</a>
            </div>
                    </div>
    </div>
    <!-- cart-section end -->



@endsection