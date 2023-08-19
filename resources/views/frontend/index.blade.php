@extends("layouts.app")
@section("main")

<!-- SLIDER AREA START (slider-4) -->
<div class="ltn__slider-area ltn__slider-4 position-relative">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white--- ltn__slide-animation-active">
        <!-- <video autoplay muted loop id="myVideo">
                <source src="media/1.mp4" type="video/mp4">
            </video> -->
        <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-overlay-theme-black-30--- bg-image"
            data-bg="{{asset("assets/img/slider/1.jpg")}}">
            <div class="ltn__slide-item-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-1 col-md-7 col-sm-7 align-self-center">
                            <div class="slide-item-info text-color-white----">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h4 class="slide-sub-title animated">Welcome to our shop</h4>
                                    <h1 class="slide-title animated">Explore Top Brand <br> Face Toner!</h1>
                                    <div class="btn-wrapper animated">
                                        <a href="shop.html" class="btn btn-round btn-black">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-5 align-self-center">
                            {{-- <!-- <div class="slide-item-img">
                                    <a href="shop.html"><img src="{{asset("img/slider/1-1.pn)}}"g" alt="#"></a>
                                </div> --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image bg-overlay-theme-black-30---"
            data-bg="{{asset("assets/img/slider/2.jpg")}}">
            <div class="ltn__slide-item-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4 col-md-7 col-sm-7 align-self-center">
                            <div class="slide-item-info text-color-white---">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h4 class="slide-sub-title animated">Welcome to our shop</h4>
                                    <h1 class="slide-title animated">Explore Top Brand <br> Face Toner!</h1>
                                    <div class="btn-wrapper animated">
                                        <a href="shop.html" class="btn btn-round btn-black">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-5 align-self-center">
                            {{-- <!-- <div class="slide-item-img">
                                    <a href="shop.html"><img src="{{asset("img/slider/11.png)}}"" alt="#"></a>
                                </div> --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image bg-overlay-theme-black-30---"
            data-bg="{{asset("assets/img/slider/1.jpg")}}">
            <div class="ltn__slide-item-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-5 align-self-center">
                            {{-- <!-- <div class="slide-item-img">
                                    <a href="shop.html"><img src="{{asset("img/slider/1-1.pn)}}"g" alt="#"></a>
                                </div> --> --}}
                        </div>
                        <div class="col-lg-5 col-md-7 col-sm-7 align-self-center">
                            <div class="slide-item-info text-color-white---">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h4 class="slide-sub-title animated">Welcome to our shop</h4>
                                    <h1 class="slide-title animated">Explore Top Brand <br> Face Toner!</h1>
                                    <div class="btn-wrapper animated">
                                        <a href="shop.html" class="btn btn-round btn-black">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
    </div>
</div>
<!-- SLIDER AREA END -->

<!-- PRODUCT TAB AREA START (product-item-3) -->
<div class="ltn__product-tab-area ltn__product-gutter pt-110 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title ">Our Products</h1>
                    <p>There are many variations of passages of Lorem Ipsum available.</p>
                </div>
                <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                    <div class="nav">
                        <a class="active show" data-toggle="tab" href="#liton_tab_3_1">Popular</a>
                        <a data-toggle="tab" href="#liton_tab_3_2" class="">New</a>
                        <a data-toggle="tab" href="#liton_tab_3_3" class="">Best Sale</a>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_3_1">
                        <div class="ltn__product-tab-content-inner">
                            <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/1.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Care
                                                    Oil</a></h2>
                                            <div class="product-price">
                                                <span>$149.00</span>
                                                <del>$162.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/2.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Growth
                                                    Vitamins</a></h2>
                                            <div class="product-price">
                                                <span>$129.00</span>
                                                <del>$145.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/3.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Growth
                                                    Oil</a></h2>
                                            <div class="product-price">
                                                <span>$119.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/4.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard
                                                    Facewash</a></h2>
                                            <div class="product-price">
                                                <span>$125.00</span>
                                                <del>$140.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/5.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard
                                                    Shampoo</a></h2>
                                            <div class="product-price">
                                                <span>$165.00</span>
                                                <del>$185.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_3_2">
                        <div class="ltn__product-tab-content-inner">
                            <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/3.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Growth
                                                    Oil</a></h2>
                                            <div class="product-price">
                                                <span>$119.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/4.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard
                                                    Facewash</a></h2>
                                            <div class="product-price">
                                                <span>$125.00</span>
                                                <del>$140.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/1.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Care
                                                    Oil</a></h2>
                                            <div class="product-price">
                                                <span>$149.00</span>
                                                <del>$162.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/2.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Growth
                                                    Vitamins</a></h2>
                                            <div class="product-price">
                                                <span>$129.00</span>
                                                <del>$145.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/5.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard
                                                    Shampoo</a></h2>
                                            <div class="product-price">
                                                <span>$165.00</span>
                                                <del>$185.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_3_3">
                        <div class="ltn__product-tab-content-inner">
                            <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/4.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard
                                                    Facewash</a></h2>
                                            <div class="product-price">
                                                <span>$125.00</span>
                                                <del>$140.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/5.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard
                                                    Shampoo</a></h2>
                                            <div class="product-price">
                                                <span>$165.00</span>
                                                <del>$185.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/1.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Care
                                                    Oil</a></h2>
                                            <div class="product-price">
                                                <span>$149.00</span>
                                                <del>$162.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/2.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Growth
                                                    Vitamins</a></h2>
                                            <div class="product-price">
                                                <span>$129.00</span>
                                                <del>$145.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product/3.png"
                                                    alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge">New</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Beard Growth
                                                    Oil</a></h2>
                                            <div class="product-price">
                                                <span>$119.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT TAB AREA END -->

<!-- CALL TO ACTION START (call-to-action-4) -->
<div class="ltn__call-to-action-area ltn__call-to-action-4 ltn__call-to-action-4-2 bg-overlay-black-50 bg-image pt-110 pb-120"
    data-bg="img/bg/6.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-4 text-color-white text-center">
                    <h2 class="ltn__secondary-color">Hurry Up!</h2>
                    <h1 class="h1">Hot Deal! Sale Up To 20% off</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> Explicabo id, unde hic
                        molestias omnis.</p>
                    <div class="ltn__countdown ltn__countdown-3 bg-white--" data-countdown="2021/07/01"></div>
                    <div class="btn-wrapper animated">
                        <a href="shop.html" class="theme-btn-1 btn btn-effect-1 text-uppercase">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__call-to-4-img-1">
        <img src="img/bg/18.png" alt="#">
    </div>
    <div class="ltn__call-to-4-img-2">
        <img src="img/bg/19.png" alt="#">
    </div>
</div>
<!-- CALL TO ACTION END -->

<!-- PRODUCT SLIDER AREA START -->
<div class="ltn__product-slider-area ltn__product-gutter pt-110 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title ">New Arrivals</h1>
                    <p>There are many variations of passages of Lorem Ipsum available.</p>
                </div>
            </div>
        </div>
        <div class="row ltn__product-slider-item-four-active slick-arrow-1">
            <!-- ltn__product-item -->
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>
                        <div class="product-price">
                            <span>$149.00</span>
                            <del>$162.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Growth Vitamins</a></h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$145.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/6.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Growth Oil</a></h2>
                        <div class="product-price">
                            <span>$119.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/9.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Facewash</a></h2>
                        <div class="product-price">
                            <span>$125.00</span>
                            <del>$140.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/15.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Scissors</a></h2>
                        <div class="product-price">
                            <span>$165.00</span>
                            <del>$185.00</del>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->

<!-- CALL TO ACTION START (call-to-action-1) -->
<div class="call-to-action-area call-to-action-1 bg-image section-bg-2 pt-220 pb-220 mb-110" data-bg="img/bg/3.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner beard-trimmer text-center">
                    <h5 class="text-uppercase">Versatile. powerful. perfect.</h5>
                    <h1>ABC LC991 Trimmer</h1>
                    <div class="btn-wrapper">
                        <a class="theme-btn-1 btn btn-effect-1 text-uppercase" href="shop.html">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CALL TO ACTION END -->

<!-- PRODUCT AREA START -->
<div class="ltn__product-area ltn__product-gutter pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title ">Grooming Tools</h1>
                    <p>There are many variations of passages of Lorem Ipsum available.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- ltn__product-item -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/15.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>
                        <div class="product-price">
                            <span>$149.00</span>
                            <del>$162.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/14.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Growth Vitamins</a></h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$145.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/13.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal"
                                        data-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-toggle="modal"
                                        data-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal"
                                        data-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="product-details.html">Beard Growth Oil</a></h2>
                        <div class="product-price">
                            <span>$119.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->

<!-- TESTIMONIAL AREA START -->
<div class="ltn__testimonial-area section-bg-1--- pb-70">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title ">Testimonial</h1>
                    <p>There are many variations of passages of Lorem Ipsum available.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 white-bg">
                <div class="row ltn__testimonial-slider-active slick-arrow-1 slick-arrow-1-inner">
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                            <div class="ltn__testimoni-img">
                                <i class="icon-right-quote"></i>
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates consequatur
                                    obcaecati nisi similique ipsum molestiae sit sequi quam odit odio."</p>
                                <h4>__ By Jacob William __</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                            <div class="ltn__testimoni-img">
                                <i class="icon-right-quote"></i>
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates consequatur
                                    obcaecati nisi similique ipsum molestiae sit sequi quam odit odio."</p>
                                <h4>__ Ethan James __</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                            <div class="ltn__testimoni-img">
                                <i class="icon-right-quote"></i>
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates consequatur
                                    obcaecati nisi similique ipsum molestiae sit sequi quam odit odio."</p>
                                <h4>__ Liam Mason __</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                            <div class="ltn__testimoni-img">
                                <i class="icon-right-quote"></i>
                            </div>
                            <div class="ltn__testimonial-info">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates consequatur
                                    obcaecati nisi similique ipsum molestiae sit sequi quam odit odio."</p>
                                <h4>__ Noah Alexander __</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TESTIMONIAL AREA END -->

<!-- BANNER AREA START -->
<div class="ltn__banner-area pb-90 d-none--">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="shop.html"><img src="img/banner/3.jpg" alt="Image"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="shop.html"><img src="img/banner/4.jpg" alt="Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BANNER AREA END -->

<!-- VIDEO AREA START -->
<div class="ltn__video-area section-bg-1 pt-120 pb-120 d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__video-img">
                    <img src="img/bg/8.jpg" alt="video popup bg image">
                    <a class="ltn__video-icon-2 ltn__video-icon-2-border"
                        href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0"
                        data-rel="lightcase:myCollection">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- VIDEO AREA END -->

<!-- NEWSLETTER AREA START -->
<div class="ltn__newsletter-area section-bg-1 bg-overlay-white-30 bg-image pt-110 pb-90 d-none"
    data-bg="img/bg/8.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="ltn__newsletter-inner text-center">
                    <h2>We make your inbox better</h2>
                    <p>Sign up to our newsletter to receive grooming tips, style inspiration, <br> exclusive access
                        to pre-launch product pricing and more.</p>
                    <form action="#" class="ltn__form-box">
                        <input type="email" name="email" placeholder="Email*">
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn btn-effect-1 text-uppercase"
                                type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- NEWSLETTER AREA END -->

<!-- BRAND LOGO AREA START -->
<div class="ltn__brand-logo-area ltn__brand-logo-1 pt-110 pb-110 plr--9 d-none">
    <div class="container-fluid">
        <div class="row ltn__brand-logo-active">
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="img/brand-logo/1.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="img/brand-logo/2.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="img/brand-logo/3.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="img/brand-logo/4.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="img/brand-logo/5.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="img/brand-logo/3.png" alt="Brand Logo">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BRAND LOGO AREA END -->


<livewire:frontend.cart.cart-alert />
<livewire:frontend.wishlist.wishlist-alert />


@endsection
