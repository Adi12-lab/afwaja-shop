<div>
     <!-- SHOPING CART AREA START -->
     {{Breadcrumbs::render("cart")}}
     <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <th class="cart-product-remove">Hapus</th>
                                    <th class="cart-product-image">Gambar</th>
                                    <th class="cart-product-info">Produk</th>
                                    <th class="cart-product-price">Harga</th>
                                    <th class="cart-product-quantity">Kuantitas</th>
                                    <th class="cart-product-subtotal">Subtotal</th>
                                </thead>
                                <tbody>
                                    @forelse($cartContent as $cartItem)
                                    <tr>
                                        <td class="cart-product-remove" wire:click="removeCartItem({{$cartItem->id}})" data-toggle="modal"
                                            data-target="#add_to_cart_modal">x</td>
                                        <td class="cart-product-image">
                                            <a href="{{route("frontend.product.view", $cartItem->product->slug)}}"><img src="{{asset($cartItem->product->productImages[0]->image)}}" alt="#"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4>
                                                <a href="{{route("frontend.product.view", $cartItem->product->slug)}}">
                                                    {{$cartItem->product->name}}
                                                </a>
                                            </h4>
                                            <h6>
                                                <small>
                                                    @if($cartItem->productVariant->name && $cartItem->productVariant->size)
                                                    {{$cartItem->productVariant->name}}
                                                    {{"/".$cartItem->productVariant->size}}
                                                    @endif
                                                </small>

                                            </h6>
                                        </td>
                                        <td class="cart-product-price">{{rupiah($cartItem->productVariant->selling_price)}}</td>
                                        <td class="cart-product-quantity">
                                            <div class="cart-plus-minus">
                                                <button class="dec qtybutton" wire:click="decrement">-</button>
                                                <input type="number" name="qtybutton"
                                                    class="cart-plus-minus-box" value="{{$cartItem->quantity}}">
                                                <button class="inc qtybutton" wire:click="increment">+</button>
                                            </div>
                                        </td>
                                        <td class="cart-product-subtotal">{{rupiah($cartItem->productVariant->selling_price * $cartItem->quantity)}}</td>
                                        @php $totalPrice += $cartItem->productVariant->selling_price * $cartItem->quantity @endphp
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <h4>Keranjang masih kosong</h4>

                                        </td>
                                    </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="shoping-cart-total mt-50">
                            <h4>Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Total Harga</td>
                                        <td>{{$totalPrice}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pengiriman</td>
                                        <td>Rp 20.000</td>
                                    </tr>
                                    <tr>
                                        <td>Vat</td>
                                        <td>$00.00</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>$633.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-wrapper text-right">
                                <a href="checkout.html" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->
</div>
