<div>
    {{ Breadcrumbs::render('produkview', $product) }}
    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    <div wire:ignore class="ltn__shop-details-large-img">
                                        @foreach ($product->productImages as $imageItem)
                                            <div class="single-large-img" wire:key="{{ str()->random(10) }}">
                                                <a href="{{ asset($imageItem->image) }}"
                                                    data-rel="lightcase:myCollection">
                                                    <img src="{{ asset($imageItem->image) }}" alt="Image">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div wire:ignore class="ltn__shop-details-small-img slick-arrow-2">
                                        @foreach ($product->productImages as $imageItem)
                                            <div class="single-small-img" wire:key="{{ str()->random(10) }}">
                                                <img src="{{ asset($imageItem->image) }}" alt="Image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                            <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                        </ul>
                                    </div>
                                    <h3>{{ $product->name }}</h3>
                                    <div class="product-price">
                                        @if ($selected_size['selling_price'] > 0)
                                            <span>{{ rupiah($selected_size['selling_price']) }}</span>
                                        @else
                                            <span>{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                                        @endif

                                        @if ($selected_size['original_price'] > 0)
                                            <del>{{ rupiah($selected_size['original_price']) }}</del>
                                        @elseif($selected_size['original_price'] === 0 && $selected_size['selling_price'] === 0)
                                            {{-- Jika original price yang terselect masih 0 dan selling_price yang terpilih masih 0 --}}
                                            <del> {{ rupiah($product->productVariants[0]->original_price) }}<del>
                                        @endif
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li>
                                                <strong>Kategori:</strong>
                                                <span>
                                                    <a href="#">{{ $product->category->name }}</a>
                                                </span>
                                            </li>
                                        </ul>
                                        @if (isset($size_available[0]['size']))
                                            <!-- Size Widget -->
                                            <div class="ltn__tagcloud-widget">
                                                <h5>Ukuran</h5>
                                                <ul>
                                                    @foreach ($size_available as $sizeItem)
                                                        <li wire:key="{{ str()->random(11) }}">
                                                            <a class="{{ $selected_size['name'] === $sizeItem['size'] ? 'active' : '' }}"
                                                                wire:click.prevent="selectSize('{{ $sizeItem['size'] }}')">
                                                                {{ $sizeItem['size'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="ltn__color-widget mt-4">
                                                <h5>Varian</h5>
                                                <ul>
                                                    @foreach ($variant_available as $variantItem)
                                                        <li wire:key="{{ str()->random(11) }}"
                                                            class="{{ $selected_variant['code'] === $variantItem['code'] ? 'active' : '' }}"
                                                            style="background-color: {{ $variantItem['code'] }}">
                                                            <a href="#"
                                                                wire:click.prevent="selectVariant('{{ $variantItem['code'] }}')"></a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ltn__product-details-menu-2">
                                        <ul>
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <button class="dec qtybutton" wire:click="decrement">-</button>
                                                    <input type="text" value="1" name="qtybutton"
                                                        class="cart-plus-minus-box" wire:model="quantity">
                                                    <button class="inc qtybutton" wire:click="increment">+</button>
                                                </div>
                                            </li>
                                            <li>
                                                @if (auth()->check())
                                               
                                                    <button class="theme-btn-1 btn btn-effect-1"
                                                        {{ $product->status === 0 ? 'disabled' : '' }}
                                                        wire:click="addToCart({{ $product->id }})" title="Add to Cart"
                                                        data-toggle="modal" data-target="#add_to_cart_modal"
                                                        wire:loading.disabled wire:target="addToCart">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <span>ADD TO CART</span>
                                                    </button>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                        class="theme-btn-1 btn btn-effect-1">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <span>ADD TO CART</span>
                                                    </a>
                                                @endif

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-3">
                                        <ul>
                                            <li>
                                                <a href="#" title="Wishlist" data-toggle="modal"
                                                    data-target="#liton_wishlist_modal"
                                                    onclick="addToWishlist({{ $product->id }})">
                                                    <i class="far fa-heart"></i>
                                                    <span>Favorit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#quick_view_modal">
                                                    <span>{{ $product->brand->name }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>

                                    <div class="ltn__safe-checkout">
                                        <h5>Guaranteed Safe Checkout</h5>
                                        <img src="img/icons/payment-2.png" alt="Payment Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                <a class="active show" data-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                                <a data-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Lorem ipsum dolor sit amet elit.</h4>
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_2">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Customer Reviews</h4>
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                            <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <!-- comment-area -->
                                    <div class="ltn__comment-area mb-30">
                                        <div class="ltn__comment-inner">
                                            <ul>
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="img/team/1.jpg" alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">Adam Smit</a></h6>
                                                            <div class="product-ratting">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star-half-alt"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="far fa-star"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                            <span class="ltn__comment-reply-btn">September 3,
                                                                2020</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="img/team/3.jpg" alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">Adam Smit</a></h6>
                                                            <div class="product-ratting">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star-half-alt"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="far fa-star"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                            <span class="ltn__comment-reply-btn">September 2,
                                                                2020</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="img/team/2.jpg" alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">Adam Smit</a></h6>
                                                            <div class="product-ratting">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star-half-alt"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="far fa-star"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                            <span class="ltn__comment-reply-btn">September 2,
                                                                2020</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- comment-reply -->
                                    <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                        <form action="#">
                                            <h4 class="title-2">Add a Review</h4>
                                            <div class="mb-30">
                                                <div class="add-a-review">
                                                    <h6>Your Ratings:</h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i
                                                                        class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <textarea placeholder="Type your comments...."></textarea>
                                            </div>
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" placeholder="Type your name....">
                                            </div>
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" placeholder="Type your email....">
                                            </div>
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="website"
                                                    placeholder="Type your website....">
                                            </div>
                                            <label class="mb-0"><input type="checkbox" name="agree"> Save my
                                                name, email, and website in this browser for the next time I
                                                comment.</label>
                                            <div class="btn-wrapper">
                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                    type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget">
                            <img wire:ignore src="{{ asset($product->productImages->last()->image) }}"
                                alt="#">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area">
                        <h1 class="section-title">Produk Relevan<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div wire:ignore class="row ltn__related-product-slider-one-active slick-arrow-1">
                @foreach ($product->category->products as $relatedProduct)
                    <!-- ltn__product-item -->
                    <div class="col-lg-12" wire:key="{{ str()->random(10) }}">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="{{ $relatedProduct->slug }}"><img
                                        src="{{ asset($relatedProduct->productImages[0]->image) }}"
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
                                                data-target="#quick_view_modal"
                                                onclick="quickView({{ $relatedProduct->id }})">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            @if ($isLogin)
                                                <a href="#" title="Add to Cart" data-toggle="modal"
                                                    data-target="#add_to_cart_modal"
                                                    onclick="addToCart({{ $relatedProduct->id }})">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($isLogin)
                                                <a href="#" title="Wishlist" data-toggle="modal"
                                                    data-target="#liton_wishlist_modal"
                                                    onclick="addToWishlist({{ $relatedProduct->id }})">
                                                    <i class="far fa-heart"></i></a>
                                            @else
                                                <a href="{{ route('login') }}">
                                                    <i class="far fa-heart"></i></a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a
                                        href="{{ route('frontend.product.view', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                                </h2>
                                <div class="product-price">
                                    <span>{{ rupiah($relatedProduct->productVariants[0]->selling_price) }}</span>
                                    @isset($relatedProduct->productVariants[0]->original_price)
                                        <del>{{ $relatedProduct->productVariants[0]->original_price }}</del>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->
</div>

@push('scripts')
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
@endpush
