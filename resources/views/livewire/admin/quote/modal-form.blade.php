 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Quote</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <form wire:submit="storeQuote()">
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="">Nama Author</label>
                         <input type="text" wire:model="author" class="form-control">
                         @error('author')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <label for="">Quote content</label>
                         <textarea type="text" wire:model="quote" class="form-control"></textarea>
                         @error('quote')
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


 <!-- Brand Update Modal -->
 <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Quote</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>
                 <form wire:submit="updateBrand()">
                     <div class="modal-body">
                         <div class="mb-3">
                             <label for="">Nama Author</label>
                             <input type="text" wire:model="author" class="form-control">
                             @error('author')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label for="">Quote Content</label>
                             <input type="text" wire:model="quote" class="form-control">
                             @error('quote')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" wire:click="closeModal"
                             data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Update</button>
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
                 <h5 class="modal-title text-white">Hapus Quote</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>

                 <form wire:submit="destroyBrand">
                     <div class="modal-body text-white">
                         <p>Anda yakin ingin menghapus Quote ini ?</p>
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
