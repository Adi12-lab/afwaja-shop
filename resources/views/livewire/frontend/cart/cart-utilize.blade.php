 <!-- Utilize Cart Menu Start -->
 <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
     <div class="ltn__utilize-menu-inner ltn__scrollbar">
         <div class="ltn__utilize-menu-head">
             <span class="ltn__utilize-menu-title">Cart</span>
             <button class="ltn__utilize-close">×</button>
         </div>
         <div class="mini-cart-product-area ltn__scrollbar">
             @if (Auth::check())
                 @forelse($cartContent as $cartItem)
                     <div class="mini-cart-item clearfix" wire:key="{{str()->random(10)}}">
                         <div class="mini-cart-img">
                             <a href="{{ route('frontend.product.view', $cartItem->product->slug) }}"><img
                                     src="{{ asset($cartItem->product->productImages[0]->image) }}" alt="Image"></a>
                             <button wire:click="removeCartItem({{$cartItem->id}})" type="button" class="mini-cart-item-delete" data-toggle="modal"
                                data-target="#add_to_cart_modal">
                                <i class="icon-cancel"></i>
                            </button>
                         </div>
                         <div class="mini-cart-info">
                             <h6>
                                 <a href="{{ route('frontend.product.view', $cartItem->product->slug) }}">
                                     {{ $cartItem->product->name }}
                                     @if ($cartItem->productVariant->name && $cartItem->productVariant->size)
                                         {{ '/' . $cartItem->productVariant->name }}
                                         {{ '/' . $cartItem->productVariant->size }}
                                     @endif
                                 </a>
                             </h6>

                             <span class="mini-cart-quantity">{{ $cartItem->quantity }} x
                                 {{ rupiah($cartItem->productVariant->selling_price) }}</span>
                             @php $totalPrice += $cartItem->productVariant->selling_price * $cartItem->quantity @endphp
                         </div>
                     </div>
                @empty
                <h4>Keranjang kosong</h4>

                 @endforelse
            @else
                 <h4>Keranjang kosong</h4>
             @endif
         </div>
         <div class="mini-cart-footer">
             <div class="mini-cart-sub-total">
                 <h5>Subtotal: <span>{{ rupiah($totalPrice) }}</span></h5>
             </div>
             <div class="btn-wrapper">
                 <a href="{{ route('cart') }}" class="theme-btn-1 btn btn-effect-1">Keranjang</a>
                 <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
             </div>
             <p>Free Shipping on All Orders Over $100!</p>
         </div>

     </div>
 </div>
 <!-- Utilize Cart Menu End -->
