<div> 
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
                                     <span>Showing 1–12 of 18 results</span>
                                 </div>
                             </li>
                             <li>
                                 <div wire:ignore class="short-by text-center">
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
                                         <div class="col-xl-4 col-sm-6 col-12" wire:key="{{str()->random(10)}}">
                                             <div class="ltn__product-item ltn__product-item-3 text-center">
                                                 <div class="product-img">
                                                     <a href="{{route("frontend.product.view", $product->slug)}}">
                                                        <img wire:ignore src="{{ asset($product->productImages[0]->image) }}" alt="Thumbanail">
                                                    </a>
                                                     <div class="product-badge">
                                                         <ul>
                                                             <li class="sale-badge">Sale</li>
                                                         </ul>
                                                     </div>
                                                     <div class="product-hover-action">
                                                         <ul>
                                                             <li>
                                                                 <a href="#" title="Quick View" data-toggle="modal"
                                                                     data-target="#quick_view_modal" wire:click="quickView({{$product->id}})">
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
                                                                     data-target="#liton_wishlist_modal" wire:click="addToWishlist({{$product->id}})">
                                                                     <i class="far fa-heart"></i></a>
                                                             </li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                                 <div class="product-info">
                                                     <h2 class="product-title"><a
                                                             href="{{route("frontend.product.view", $product->slug)}}">{{ $product->name }}</a></h2>
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
                                         <div class="col-lg-12" wire:key="{{str()->random(10)}}">
                                             <div class="ltn__product-item ltn__product-item-3">
                                                 <div class="product-img">
                                                     <a href="product-details.html"><img wire:ignore
                                                             src="{{ asset($product->productImages[0]->image) }}"
                                                             alt="#"></a>
                                                     <div class="product-badge">
                                                         <ul>
                                                             <li class="sale-badge">New</li>
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
                                                                 <a href="#" title="Quick View" data-toggle="modal"
                                                                     data-target="#quick_view_modal" wire:click="quickView({{$product->id}})">
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
                                                                     data-target="#liton_wishlist_modal" wire:click="addToWishlist({{$product->id}})">
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
                                         <li wire:key="{{str()->random(10)}}"><a href="{{ "kategori/$category->slug" }}">{{ $category->name }} <span><i
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
                         <div wire:ignore class="widget ltn__price-filter-widget">
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
                                 <li>
                                     <div class="top-rated-product-item clearfix">
                                         <div class="top-rated-product-img">
                                             <a href="product-details.html"><img src="img/product/2.png"
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
                                             <h6><a href="product-details.html">Brake Conversion Kit</a></h6>
                                             <div class="product-price">
                                                 <span>$49.00</span>
                                                 <del>$65.00</del>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="top-rated-product-item clearfix">
                                         <div class="top-rated-product-img">
                                             <a href="product-details.html"><img src="img/product/3.png"
                                                     alt="#"></a>
                                         </div>
                                         <div class="top-rated-product-info">
                                             <div class="product-ratting">
                                                 <ul>
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                     <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                     <li><a href="#"><i class="far fa-star"></i></a></li>
                                                 </ul>
                                             </div>
                                             <h6><a href="product-details.html">Coil Spring Conversion</a></h6>
                                             <div class="product-price">
                                                 <span>$49.00</span>
                                                 <del>$65.00</del>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                         <!-- Tagcloud Widget -->
                         <div class="widget ltn__tagcloud-widget">
                             <h4 class="ltn__widget-title">Popular Tags</h4>
                             <ul>
                                 <li><a href="#">Popular</a></li>
                                 <li><a href="#">Beard</a></li>
                                 <li><a href="#">Oil</a></li>
                                 <li><a href="#">desgin</a></li>
                                 <li><a href="#">ux</a></li>
                                 <li><a href="#">develop</a></li>
                                 <li><a href="#">usability</a></li>
                                 <li><a href="#">icon</a></li>
                                 <li><a href="#">Oil</a></li>
                                 <li><a href="#">Oil Change</a></li>
                                 <li><a href="#">Body Color</a></li>
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
                         <!-- Color Widget -->
                         <div class="widget ltn__color-widget">
                             <h4 class="ltn__widget-title">Product Color</h4>
                             <ul>
                                 <li class="black"><a href="#"></a></li>
                                 <li class="white"><a href="#"></a></li>
                                 <li class="red"><a href="#"></a></li>
                                 <li class="silver"><a href="#"></a></li>
                                 <li class="gray"><a href="#"></a></li>
                                 <li class="maroon"><a href="#"></a></li>
                                 <li class="yellow"><a href="#"></a></li>
                                 <li class="olive"><a href="#"></a></li>
                                 <li class="lime"><a href="#"></a></li>
                                 <li class="green"><a href="#"></a></li>
                                 <li class="aqua"><a href="#"></a></li>
                                 <li class="teal"><a href="#"></a></li>
                                 <li class="blue"><a href="#"></a></li>
                                 <li class="navy"><a href="#"></a></li>
                                 <li class="fuchsia"><a href="#"></a></li>
                                 <li class="purple"><a href="#"></a></li>
                                 <li class="pink"><a href="#"></a></li>
                                 <li class="nude"><a href="#"></a></li>
                                 <li class="orange"><a href="#"></a></li>
    
                                 <li><a href="#" class="orange"></a></li>
                                 <li><a href="#" class="orange"></a></li>
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
    @include("components.modal-view")
    @include("components.modal-cart")
    {{-- @include("components.modal-wishlist") --}}
</div>



