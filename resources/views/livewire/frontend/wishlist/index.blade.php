<div>
    {{ Breadcrumbs::render('wishlist') }}
    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <th scope="col" class="cart-product-remove text-center">X</th>
                                    <th scope="col" class="cart-product-image text-center">Gambar</th>
                                    <th scope="col" class="cart-product-info text-center">Nama</th>
                                    <th scope="col" class="cart-product-price text-center">Harga</th>
                                    <th scope="col" class="cart-product-quantity text-center">Stok</th>
                                    <th scope="col" class="cart-product-subtotal text-center">Keranjang</th>
                                </thead>
                                <tbody>
                                    @foreach ($wishlists as $wishlistItem)
                                        <tr wire:key="{{ str()->random(10) }}">
                                            <td class="cart-product-remove" 
                                            wire:click.prevent="removeWishlistItem({{$wishlistItem->id}})" wire:loading.class="text-secondary">
                                                x
                                            </td>
                                            <td class="cart-product-image" wire:ignore>
                                                <a href="{{ route('frontend.product.view', $wishlistItem->product->slug) }}">
                                                    <img src="{{ asset($wishlistItem->product->productImages[0]->image) }}"
                                                        alt="{{ $wishlistItem->product->name }}"></a>
                                            </td>
                                            <td class="cart-product-info ">
                                                <h4 class="text-center">
                                                    <a
                                                        href="{{ route('frontend.product.view', $wishlistItem->product->slug) }}">{{ $wishlistItem->product->name }}</a>
                                                </h4>
                                            </td>
                                            <td class="cart-product-price text-center">
                                                {{ rupiah($wishlistItem->product->productVariants[0]->selling_price) }}
                                            </td>
                                            <td class="cart-product-stock text-center">
                                                @if ($wishlistItem->product->productVariants[0]->quantity > 0)
                                                    <span class="text-success">Tersedia</span>
                                                @else
                                                    <span class="text-danger">Tersedia</span>
                                                @endif
                                            </td>
                                            <td class="cart-product-add-cart text-center">
                                                <a class="submit-button-1" href="#" title="Add to Cart"
                                                    data-toggle="modal" data-target="#add_to_cart_modal">Tambah</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
</div>
