@extends('frontend.app')
@section('title','All Products')
@section('content')

       <!-- Category Section Starts Here -->
<div class="category-section padding-bottom padding-top">
    <div class="container">
                    <div class="row">
                <div class="col-xl-3">
                    <aside class="category-sidebar position-relative">
                        <div class="widget d-xl-none">
                            <div class="d-flex justify-content-between">
                                <h5 class="title border-0 pb-0 mb-0">Filter</h5>
                                <div class="close-sidebar"><i class="las la-times"></i></div>
                            </div>
                        </div>

                        <div class="widget">
                            <h5 class="title">Filter by Price</h5>
                            <div class="widget-body">
                                <div id="slider-range"></div>
                                <div class="price-range">
                                    <label for="amount">Price :</label>
                                    <input type="text" id="amount" readonly>
                                    <input type="hidden" name="min_price" value="20.00">
                                    <input type="hidden" name="max_price" value="499.00">
                                </div>
                            </div>
                        </div>


                        
                        <div class="widget">
                            <h5 class="title">Filter by Brand</h5>

                            <div class="widget-body">
                                <div class="widget-check-group">
                                    <input type="checkbox" value="0" name="brand" id="all-brand"  checked >
                                    <label for="all-brand">All Brand</label>
                                </div>

                                                                    <div class="widget-check-group brand-filter">
                                        <input type="checkbox" value="7" name="brand" id="brand-1" >
                                        <label for="brand-1" >Levis</label>
                                    </div>
                                                                    <div class="widget-check-group brand-filter">
                                        <input type="checkbox" value="25" name="brand" id="brand-2" >
                                        <label for="brand-2" >Nike</label>
                                    </div>
                                                                    <div class="widget-check-group brand-filter">
                                        <input type="checkbox" value="26" name="brand" id="brand-3" >
                                        <label for="brand-3" >Tomford</label>
                                    </div>
                                                                    <div class="widget-check-group brand-filter">
                                        <input type="checkbox" value="27" name="brand" id="brand-4" >
                                        <label for="brand-4" >Xeric</label>
                                    </div>
                                
                            </div>
                        </div>
                        


                    </aside>
                </div>
                <div class="col-xl-9">

                    <div class="filter-category-header">

                        <div class="fileter-select-item">
                            <div class="select-item product-page-per-view">
                                <select class="select-bar bg-3" name="per_page">
                                    <option value="">Products Per Page</option>
                                    <option value="5" >5 Items Per Page </option>
                                    <option value="15" selected>15 Items Per Page </option>
                                    <option value="30" >30 Items Per Page </option>
                                    <option value="50" >50 Items Per Page </option>
                                    <option value="100" >100 Items Per Page </option>
                                    <option value="200" >200 Items Per Page </option>
                                </select>
                            </div>
                        </div>

                        <div class="fileter-select-item d-none d-lg-block ml-auto align-self-end">

                            <ul class="view-number">
                                <li class="change-grid-to-6">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </li>
                                <li class="change-grid-to-4 active">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </li>
                                <li class="change-grid-to-3">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="fileter-select-item ml-auto ml-lg-0 align-self-end">
                            <ul class="view-style d-flex">
                                <li>
                                    <a href="javascript:void(0)" class="active view-grid-style"><i class="las la-border-all"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="view-list-style"><i class="las la-list-ul"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="fileter-select-item align-self-end d-xl-none pl-0">
                            <div class="filter-in">
                                <i class="las la-filter"></i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative">
                        <div id="overlay" >
                            <div class="cv-spinner">
                                <span class="spinner"></span>
                            </div>
                        </div>
                        <div class="overlay-2" id="overlay2"></div>
                        <div class="page-main-content">
                            <div class="row mb-30-none page-main-content" id="grid-view">
                               

 @foreach($detailspro as $detailspro)

    <div class="col-lg-4 col-sm-6 grid-control mb-30">
        <div class="product-item-2 m-0">
            <div class="product-item-2-inner wish-buttons-in">
                <div class="product-thumb">
                    <a href="./single-product/{{$detailspro->pid}}/{{$detailspro->slug}}">
                        <img src="{{url('/')}}/{{$detailspro->vimage}}" alt="flash">
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-before-content">
                    <h6 class="title">
                 <a href="./single-product/{{$detailspro->pid}}/{{$detailspro->slug}}">{{$detailspro->pname}}</a>
                    </h6>
                       <!--  <h6 class="title mt-1"> Brand : Levis </h6> -->
                       
                        <div class="ratings-area justify-content-between">
                            <div class="price">${{$detailspro->vprice}}.00 </div>
                        </div>
                    </div>
                    <div class="product-after-content">
    <button data-product="2" class="cmn-btn btn-sm quick-view-btn">View  </button>
                        <div class="price"> ${{$detailspro->vprice}}.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @endforeach

                                                                
 <div class="col-lg-4 col-sm-6 grid-control mb-30">
    <div class="product-item-2 m-0">
        <div class="product-item-2-inner wish-buttons-in">
            <div class="product-thumb">
                <ul class="wish-react">
                    <li>
                        <a href="javascript:void(0)" title="Add To Wishlist" class="add-to-wish-list " data-id="7"><i class="lar la-heart"></i></a>
                    </li>
                    <li>

                        <a href="javascript:void(0)" title="Compare" class="add-to-compare " data-id="7"><i class="las la-sync-alt"></i></a>
                    </li>
                </ul>
                <a href="https://script.viserlab.com/visermart/product/detail/7/man-white-sneakers">
                    <img src="https://script.viserlab.com/visermart/assets/images/product/thumb_602b890e609081613465870.jpg" alt="flash">
                </a>
            </div>
            <div class="product-content">
                <div class="product-before-content">
                    <h6 class="title">
                        <a href="https://script.viserlab.com/visermart/product/detail/7/man-white-sneakers">Man White Sneakers</a>
                    </h6>
                    <h6 class="title mt-1">
                        Brand : Nike
                    </h6>
                    <div class="single_content">
                        <p>Nike Shoes - Shop for casual shoes & sports shoes for men, women & kids from Nike online at Myntra. Choose from a wide range of Nike shoes in different sizes</p>
                    </div>
                    <div class="ratings-area justify-content-between">
                        <div class="ratings">
                            <i class="la la-star"></i><i class="la la-star"></i><i class="la la-star"></i><i class="la la-star"></i><i class="la la-star"></i>                                                        </div>
                            <span class="ml-2 mr-auto">(1)</span>
                            <div class="price">
                                $20.00
                            </div>
                        </div>
                    </div>
                    <div class="product-after-content">
                        <button data-product="7" class="cmn-btn btn-sm quick-view-btn">
                        View                                                    </button>
                        <div class="price">
                            $20.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 grid-control mb-30">
        <div class="product-item-2 m-0">
            <div class="product-item-2-inner wish-buttons-in">
                <div class="product-thumb">
                    <ul class="wish-react">
                        <li>
                            <a href="javascript:void(0)" title="Add To Wishlist" class="add-to-wish-list " data-id="19"><i class="lar la-heart"></i></a>
                        </li>
                        <li>

                            <a href="javascript:void(0)" title="Compare" class="add-to-compare " data-id="19"><i class="las la-sync-alt"></i></a>
                        </li>
                    </ul>
                    <a href="https://script.viserlab.com/visermart/product/detail/19/tomford-sunglass">
                        <img src="https://script.viserlab.com/visermart/assets/images/product/thumb_6028c8f461fea1613285620.jpg" alt="flash">
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-before-content">
                        <h6 class="title">
                            <a href="https://script.viserlab.com/visermart/product/detail/19/tomford-sunglass">Tomford Sunglass</a>
                        </h6>
                        <h6 class="title mt-1">
                            Brand : Tomford
                        </h6>
                        <div class="single_content">
                            <p>Devoted to making the best sunglasses on the planet by letting invention lead the way. With a passion to reinvent from scratch, Oakley sunglasses defy convention and set the standard for design, performance, and protection by wrapping innovation in art.</p>
                        </div>
                        <div class="ratings-area justify-content-between">
                            <div class="ratings">
                                <i class="lar la-star"></i><i class="lar la-star"></i><i class="lar la-star"></i><i class="lar la-star"></i><i class="lar la-star"></i>                                                        </div>
                                <span class="ml-2 mr-auto">(0)</span>
                                <div class="price">
                                    $120.00
                                </div>
                            </div>
                        </div>
                        <div class="product-after-content">
                            <button data-product="19" class="cmn-btn btn-sm quick-view-btn">
                            View                                                    </button>
                            <div class="price">
                                $120.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 grid-control mb-30">
            <div class="product-item-2 m-0">
                <div class="product-item-2-inner wish-buttons-in">
                    <div class="product-thumb">
                        <ul class="wish-react">
                            <li>
                                <a href="javascript:void(0)" title="Add To Wishlist" class="add-to-wish-list " data-id="20"><i class="lar la-heart"></i></a>
                            </li>
                            <li>

                                <a href="javascript:void(0)" title="Compare" class="add-to-compare " data-id="20"><i class="las la-sync-alt"></i></a>
                            </li>
                        </ul>
                        <a href="https://script.viserlab.com/visermart/product/detail/20/regulator-automatic-blue-slate">
                            <img src="https://script.viserlab.com/visermart/assets/images/product/thumb_602774dd1bfd51613198557.jpg" alt="flash">
                        </a>
                    </div>
                    <div class="product-content">
                        <div class="product-before-content">
                            <h6 class="title">
                                <a href="https://script.viserlab.com/visermart/product/detail/20/regulator-automatic-blue-slate">Regulator Automatic Blue Slate</a>
                            </h6>
                            <h6 class="title mt-1">
                                Brand : Xeric
                            </h6>
                            <div class="single_content">
                                <p>The Regulator Automatic breaks down timekeeping into its purest form, separating the hours, minutes, and seconds into distinctly isolated functions.</p>
                            </div>
                            <div class="ratings-area justify-content-between">
                                <div class="ratings">
                                    <i class="lar la-star"></i><i class="lar la-star"></i><i class="lar la-star"></i><i class="lar la-star"></i><i class="lar la-star"></i>                                                        </div>
                                    <span class="ml-2 mr-auto">(0)</span>
                                    <div class="price">
                                        $499.00
                                    </div>
                                </div>
                            </div>
                            <div class="product-after-content">
                                <button data-product="20" class="cmn-btn btn-sm quick-view-btn">
                                View                                                    </button>
                                <div class="price">
                                    $499.00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</div>
</div>
</div>
<!-- Category Section Ends Here -->

<div class="modal fade" id="quickView">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="ajax-loader-wrapper d-flex align-items-center justify-content-center">
                    <div class="spinner-border" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection