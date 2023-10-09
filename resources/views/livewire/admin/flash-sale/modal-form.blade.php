 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Flash Sale</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <form wire:submit="storeFlashSale()">
                 <div class="modal-body">
                     <div class="mb-3">
                         <label class="form-label">Produk</label>
                         <select wire:model="product_id" class="form-control">
                             <option value="">-- Pilih produk --</option>
                             @foreach ($products as $product)
                                 <option value="{{ $product->id }}">{{ $product->name }}</option>
                             @endforeach
                         </select>
                         @error('product_id')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <label class="form-label">Price</label>
                         <input type="text" wire:model="price" class="form-control">
                         @error('price')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <div class="form-check form-switch">
                             <input class="form-check-input" type="checkbox" role="switch" id="isActiveCreate"
                                 wire:model="isActive">
                             <label class="form-check-label" for="isActiveCreate">Aktif</label>
                         </div>
                         @error('isActive')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <label class="form-label">Deadline:</label>
                         <input type="datetime-local" class="form-control" wire:model="deadline">
                         @error('deadline')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>

                     <div class="mb-3">
                         @if ($image1)
                             <img wire:loading.remove wire:target="image1" src="{{ $image1->temporaryUrl() }}"
                                 height="300" width="300" alt="image1" style="object-fit: cover">
                         @else
                             <img wire:loading.remove wire:target="image1" src="{{ asset('assets/img/product/1.png') }}"
                                 height="300" width="300" alt="image1" style="object-fit: cover">
                         @endif
                         <div wire:loading wire:target="image1" class="p-2">
                             <div class="spinner-border text-primary" role="status">
                                 <span class="visually-hidden">Loading...</span>
                             </div>Loading...
                         </div>
                         <input type="file" class="form-control" wire:model="image1">
                         @error('photo')
                             <small class="danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         @if ($image2)
                             <img wire:loading.remove wire:target="image2" src="{{ $image2->temporaryUrl() }}"
                                 height="300" width="300" alt="image2" style="object-fit: cover">>
                         @else
                             <img wire:loading.remove wire:target="image2"
                                 src="{{ asset('assets/img/product/1.png') }}" height="300" width="300"
                                 alt="image2" style="object-fit: cover">>
                         @endif
                         <div wire:loading wire:target="image2" class="p-2">
                             <div class="spinner-border text-primary" role="status">
                                 <span class="visually-hidden">Loading...</span>
                             </div>Loading...
                         </div>
                         <input type="file" class="form-control" wire:model="image2">
                         @error('photo')
                             <small class="danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" wire:click="closeModal"
                         data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>

             </form>
         </div>
     </div>
 </div>


 <!-- Brand Update Modal -->
 <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Flash Sale</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove wire:target="flash_sale_id">
                 <form wire:submit="updateFlashSale()">
                     <div class="modal-body">
                         <div class="mb-3">
                             <label class="form-label">Produk</label>
                             <select wire:model="product_id" class="form-control">
                                 <option value="">-- Pilih produk --</option>
                                 @foreach ($products as $product)
                                     <option value="{{ $product->id }}"
                                         {{ $product->id === $product_id ? 'selected' : '' }}>{{ $product->name }}
                                     </option>
                                 @endforeach
                             </select>
                             @error('product_id')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label class="form-label">Price</label>
                             <input type="text" wire:model="price" class="form-control">
                             @error('price')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" role="switch" id="isActiveCreate"
                                     wire:model="isActive">
                                 <label class="form-check-label" for="isActiveCreate">Aktif</label>
                             </div>
                             @error('isActive')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label class="form-label">Deadline:</label>
                             <input type="datetime-local" class="form-control" wire:model="deadline">
                             @error('deadline')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="mb-3">
                             @if ($image1)
                                 <img wire:loading.remove wire:target="image1" src="{{ $image1->temporaryUrl() }}"
                                     height="300" width="300" alt="image1" style="object-fit: cover">
                             @elseif($previous_image1)
                                 <img wire:loading.remove wire:target="image1" src="{{ asset($previous_image1) }}"
                                     height="300" width="300" alt="image1" style="object-fit: cover">>
                             @else
                                 <img wire:loading.remove wire:target="image1"
                                     src="{{ asset('assets/img/product/1.png') }}" height="300" width="300"
                                     alt="image1" style="object-fit: cover">
                             @endif
                             <div wire:loading wire:target="image1" class="p-2">
                                 <div class="spinner-border text-primary" role="status">
                                     <span class="visually-hidden">Loading...</span>
                                 </div>Loading...
                             </div>
                             <input type="file" class="form-control" wire:model="image1">
                             @error('photo')
                                 <small class="danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             @if ($image2)
                                 <img wire:loading.remove wire:target="image2" src="{{ $image2->temporaryUrl() }}"
                                     height="300" width="300" alt="image2" style="object-fit: cover">>
                             @elseif($previous_image2)
                                 <img wire:loading.remove wire:target="image2" src="{{ asset($previous_image2) }}"
                                     height="300" width="300" alt="image2" style="object-fit: cover">
                             @else
                                 <img wire:loading.remove wire:target="image1"
                                     src="{{ asset('assets/img/product/1.png') }}" height="300" width="300"
                                     alt="image1" style="object-fit: cover">
                             @endif
                             <div wire:loading wire:target="image2" class="p-2">
                                 <div class="spinner-border text-primary" role="status">
                                     <span class="visually-hidden">Loading...</span>
                                 </div>Loading...
                             </div>
                             <input type="file" class="form-control" wire:model="image2">
                             @error('photo')
                                 <small class="danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" wire:click="closeModal"
                             data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-warning">Update</button>
                     </div>

                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Brand Delete Modal -->
 <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content bg-danger">
             <div class="modal-header">
                 <h5 class="modal-title text-white">Hapus Flash Sale</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>

                 <form wire:submit="destroyFlashSale()">
                     <div class="modal-body text-white">
                         <p>Anda yakin ingin menghapus Flash Sale ini ?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-dark">Hapus</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
