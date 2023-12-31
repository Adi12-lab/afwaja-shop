<div>
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div wire:ignore.self class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                  
                        <div class="ltn__quick-view-modal-inner">
                            @isset($product)
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-img">
                                                <img src="{{ asset($product->productImages[0]->image) }}"
                                                    alt="#">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-info">
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
                                                    <span>{{ rupiah($product->productVariants[0]->selling_price) }}</span>

                                                    @isset($product->original_price)
                                                        <del>{{ rupiah($product->original_price) }}</del>
                                                    @endisset
                                                </div>
                                                <div class="modal-product-meta ltn__product-details-menu-1">
                                                    <ul>
                                                        <li>
                                                            <strong>Kategori:</strong>
                                                            <span>
                                                                <a
                                                                    href="#">{{ $product->category->name }}</a>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ltn__product-details-menu-2">
                                                    <ul>
                                                        <li>
                                                            <div class="cart-plus-minus">
                                                                <button class="dec qtybutton" wire:click="decrement">-</button>
                                                                <input type="number" value="1" name="qtybutton"
                                                                    class="cart-plus-minus-box" wire:model="quantity">
                                                                <button class="inc qtybutton" wire:click="increment">+</button>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="theme-btn-1 btn btn-effect-1"
                                                                title="Add to Cart" 
                                                                data-toggle="modal"
                                                                data-target="#add_to_cart_modal" 
                                                                wire:click="addToCart({{$product->id}})" 
                                                                data-dismiss="modal" aria-label="Close">
                                                                <i class="fas fa-shopping-cart"></i>
                                                                <span>Tambah ke Keranjang</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ltn__product-details-menu-3">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="" title="Wishlist"
                                                                data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i>
                                                                <span>Favorit</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="" title="Wishlist"
                                                                data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <span>{{ $product->brand->name }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="ltn__social-media">
                                                    <ul>
                                                        <li>Share:</li>
                                                        <li><a href="#" title="Facebook"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" title="Twitter"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Linkedin"><i
                                                                    class="fab fa-linkedin"></i></a></li>
                                                        <li><a href="#" title="Instagram"><i
                                                                    class="fab fa-instagram"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->
</div>
