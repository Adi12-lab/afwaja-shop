<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title text-white">Hapus Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>

                    <form wire:submit="destroyProduct">
                        <div class="modal-body text-white">
                            <p>Anda yakin ingin menghapus menghapus produk ini ?</p>
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

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <h6 class="mb-0 text-uppercase">
        Produk
        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-end">Tambah produk</a>
    </h6>
    <hr />

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Baru</th>
                        <th scope="colp">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->category->name }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>
                                @if ($product->status === 0)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Diarsipkan</span>
                                @endif
                            </td>
                            <td>
                                <img src="{{asset($product->productImages[0]->image ?? null)}}" width="120">
                            </td>
                            <td>
                                @if ($product->isNew === 1)
                                    <span class="badge bg-success">true</span>
                                @else
                                    <span class="badge bg-info">false</span>
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-warning px-3">Edit</a>
                                <a href="#" wire:click="deleteProduct({{ $product->id }})" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                Tidak ada Produk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@push('script')
    <script>
        window.addEventListener("close-modal", event => {
            $("#deleteModal").modal("hide");
        })
    </script>
@endpush
