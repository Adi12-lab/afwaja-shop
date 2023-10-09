@extends('layouts.app')
@section('main')
    {{ Breadcrumbs::render('produk') }}
    <div class="ltn__product-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" href="#liton_product_grid"><i
                                                class="fas fa-th-large"></i></a>
                                        <a data-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="showing-product-number text-right">
                                    <span>Showing {{$startIndex}}–{{$endIndex}} of {{$products->total()}} results</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <select class="nice-select">
                                        <option>Default Sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    {{-- @dd($products) --}}
                                    @foreach ($products as $product)
                                        <!-- ltn__product-item -->
                                        <div class="col-xl-4 col-sm-6 col-12">
                                            <div class="ltn__product-item ltn__product-item-3 text-center">
                                                <div class="product-img">
                                                    <a href="{{ route('frontend.product.view', $product->slug) }}">
                                                        <img src="{{ asset($product->productImages[0]->image ?? null) }}"
                                                            alt="Thumbanail">
                                                    </a>
                                                    <div class="product-badge">
                                                        <ul>
                                                            @if ($product->status === 1)
                                                                <li class="sale-badge">Sale</li>
                                                            @else
                                                                <li class="soldout-badge">Sold Out</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="Quick View"
                                                                    onclick="quickView({{ $product->id }})"
                                                                    data-toggle="modal" data-target="#quick_view_modal">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ !$isLogin ? route('login') : '#' }}"
                                                                    title="Add to Cart"
                                                                    @if ($isLogin) onclick="addToCart({{ $product->id }})"
                                                                    data-toggle='modal' data-target='#add_to_cart_modal' @endif><i
                                                                        class='fas fa-shopping-cart'></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ !$isLogin ? route('login') : '#' }}"
                                                                    title="Wishlist"
                                                                    @if ($isLogin) onclick="addToWishlist({{ $product->id }})" data-toggle='modal' data-target='#liton_wishlist_modal' @endif>
                                                                    <i class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a
                                                            href="{{ route('frontend.product.view', $product->slug) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    <div class="product-price">
                                                        <span>{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                                                        <del>{{ rupiah($product->productVariants[0]->original_price) }}</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    {{-- @dd($products) --}}
                                    @foreach ($products as $product)
                                        <!-- ltn__product-item -->
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-3">
                                                <div class="product-img">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset($product->productImages[0]->image ?? null) }}"
                                                            alt="#"></a>
                                                    <div class="product-badge">
                                                        <ul>
                                                            @if ($product->status === 1)
                                                                <li class="sale-badge">Sale</li>
                                                            @else
                                                                <li class="soldout-badge">Sold Out</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a
                                                            href="product-details.html">{{ $product->name }}</a></h2>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                                                        <del>{{ rupiah($product->productVariants[0]->original_price) }}</del>
                                                    </div>
                                                    <div class="product-brief">
                                                        <p>{{ $product->small_description }}</p>
                                                    </div>

                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="Quick View"
                                                                    onclick="quickView($product->id)">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ !$isLogin ? route('login') : '#' }}"
                                                                    title="Add to Cart"
                                                                    {{ $isLogin ? "data-toggle='modal' data-target='#add_to_cart_modal'" : '' }}><i
                                                                        class='fas fa-shopping-cart'></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ !$isLogin ? route('login') : '#' }}"
                                                                    title="Wishlist"
                                                                    {{ $isLogin ? "data-toggle='modal data-target='#liton_wishlist_modal'" : '' }}>
                                                                    <i class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    @endforeach
                                    {{-- @dd($products) --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $products->links() }}

                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        @isset($categories)
                            <!-- Category Widget -->
                            <div class="widget ltn__menu-widget">
                                <h4 class="ltn__widget-title">Product categories</h4>
                                <ul>
                                    <li><a href="{{ 'kategori' }}">All Category <span><i
                                                    class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ "kategori/$category->slug" }}">{{ $category->name }} <span><i
                                                        class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endisset
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Price Filter Widget -->
                        <div>
                            <h4 class="ltn__widget-title">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit" value="Your range:" />
                                    <input type="text" class="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/1.png"
                                                    alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Mixel Solid Seat Cover</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Size Widget -->
                        <div class="widget ltn__tagcloud-widget ltn__size-widget">
                            <h4 class="ltn__widget-title">Product Size</h4>
                            <ul>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget">
                            <a href="shop.html"><img src="img/banner/13.jpg" alt="#"></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function quickView(product_id) {
            Livewire.dispatch("quickViewTrigger", {
                product_id: product_id
            })
        }

        function addToWishlist(product_id) {
            Livewire.dispatch("addToWishlist", {
                product_id: product_id
            })
        }

        function addToCart(product_id) {
            Livewire.dispatch("addToCart", {
                product_id
            })
        }
    </script>
@endsection
