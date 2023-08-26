 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="addProductVariantModal" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5">Tambah Varian</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <form wire:submit="storeProductVariant()">
                <div class="row modal-body">
                    <div class="mb-3">
                        <label>Pilih produk</label>
                        <select wire:model="product_id" class="form-control" required>
                            <option value="">-- pilih produk --</option>

                           @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label>Nama varian</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label>Kode Varian</label>
                        <input type="text" wire:model="code" class="form-control">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label>Size Varian</label>
                        <input type="text" wire:model="size" class="form-control">
                        @error('size')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label>Stok</label>
                        <input type="number" wire:model="quantity" class="form-control">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Harga Asli</label>
                        <input type="number" wire:model="original_price" class="form-control">
                        @error('original_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input type="number" wire:model="selling_price" class="form-control">
                        @error('selling_price')
                            <small class="text-danger">{{ $message }}</small>
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


 <!-- Product Variant Update Modal -->
 <div wire:ignore.self class="modal fade" id="updateProductVariantModal" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5">Update Produk Varian</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>
                 <form wire:submit="updateProductVariant()">
                     <div class="row modal-body">
                         <div class="mb-3">
                             <label>Pilih produk</label>
                             <select wire:model="product_id" class="form-control" required>
                                 <option value="">-- pilih produk --</option>

                                @foreach ($products as $product)
                                     <option value="{{ $product->id }}">{{ $product->name }}</option>
                                 @endforeach
                             </select>
                             @error('product_id')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-6 mb-3">
                             <label>Nama varian</label>
                             <input type="text" wire:model="name" class="form-control">
                             @error('name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-6 mb-3">
                             <label>Kode Varian</label>
                             <input type="text" wire:model="code" class="form-control">
                             @error('code')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-6 mb-3">
                             <label>Size Varian</label>
                             <input type="text" wire:model="code" class="form-control">
                             @error('code')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-6 mb-3">
                            <label>Stok</label>
                            <input type="number" wire:model="quantity" class="form-control">
                            @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                         <div class="mb-3">
                             <label>Harga Asli</label>
                             <input type="number" wire:model="original_price" class="form-control">
                             @error('original_price')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label>Harga Jual</label>
                             <input type="number" wire:model="selling_price" class="form-control">
                             @error('selling_price')
                                 <small class="text-danger">{{ $message }}</small>
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
 <div wire:ignore.self class="modal fade" id="deleteProductVariantModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content bg-danger">
             <div class="modal-header">
                 <h5 class="modal-title text-white">Hapus Varian Produk</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>

                 <form wire:submit="destroyProductVariant">
                     <div class="modal-body text-white">
                         <p>Anda yakin ingin menghapus menghapus varian ini ?</p>
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
