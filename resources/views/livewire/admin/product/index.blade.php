<div>
    <div class="row">
        <div class="col-12 mx-auto">
            <form wire:submit.prevent="query">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Kategori" aria-describedby="search"
                        wire:model.defer="search">
                    <button class="btn btn-secondary" type="submit" id="search">Cari</button>
                </div>
            </form>
        </div>
        <div class="col">
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
                                <th scope="col">id</th>
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
                            @foreach ($products as $product)
                                <tr wire:key="{{ $product->id }}">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>
                                        @if ($product->status === 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Diarsipkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($product->productImages[0]->image ?? null) }}"
                                            width="120">
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
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('product.variants', $product->id) }}"
                                            class="btn btn-sm btn-info">
                                            Variant
                                        </a>
                                        <button type="button" wire:click="deleteProduct({{ $product->id }})"
                                            class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        {{ $products->links() }}
    </div>

</div>
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener("livewire:init", function() {
            Livewire.on("confirmDelete", function() {
                Swal.fire({
                    title: 'Anda yakin ?',
                    text: "TIndakan anda tidak dapat diurungkan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch("destroying")
                    }
                })
            })


        })
    </script>
@endpush
