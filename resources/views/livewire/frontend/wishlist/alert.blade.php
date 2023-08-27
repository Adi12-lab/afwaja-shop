<div>
    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div wire:ignore.self class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div wire:loading class="p-2">
                            <div class="spinner-border text-primary" role="status">
                            </div>Loading
                        </div>

                        <div wire:loading.remove class="ltn__quick-view-modal-inner">
                            @if (isset($message))
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            @isset($product)
                                                <div class="modal-product-img">
                                                    <img src="{{ asset($product->productImages[0]->image) }}"
                                                        alt="image">
                                                </div>
                                            @endisset
                                            <div class="modal-product-info">
                                                @if ($message['type'] !== 'error' && isset($product))
                                                    <h5>
                                                        <a href="{{ route('frontend.product.view', $product->slug) }}">{{ $product->name }}</a>
                                                    </h5>
                                                    <p class="added-cart">
                                                        <i class="fa fa-check-circle"></i>
                                                        {{ $message['text'] }}
                                                    </p>
                                                    <div class="btn-wrapper">
                                                        <a href="{{ route('wishlist') }}" class="theme-btn-1 btn btn-effect-1">Lihat Favorit</a>
                                                    </div>
                                                @else
                                                    <p class="added-cart"><i class="fa fa-check-circle mr-3"></i>{{ $message['text'] }}
                                                    </p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->
</div>

@push('scripts')
    <script>
        document.addEventListener("livewire:init", () => {
            $('#liton_wishlist_modal').on('hidden.bs.modal', function(e) {
                Livewire.dispatch('onHideWishlistAlert')
            })

        })
    </script>
@endpush
