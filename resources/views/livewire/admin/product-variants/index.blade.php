<div>
    @include('livewire.admin.product-variants.modal-form')
    <div class="row">
        <div class="col mx-auto">
            <h6 class="mb-0 text-uppercase">
                Varian {{ $productVariants[0]->product->name }} <i class="bx bx-selection"></i>
                <a href="" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#addProductVariantModal">Tambah Variant</a>
            </h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Size</th>
                                <th scope="col">Harga Asli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($productVariants as $productVariant)
                                <tr>
                                    <td>{{ $productVariant->name ?? '-' }}</td>
                                    <td>
                                        {{ $productVariant->code ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $productVariant->size ?? '-' }}
                                    </td>
                                    <td>
                                        {{ rupiah($productVariant->original_price) }}
                                    </td>
                                    <td>
                                        {{ rupiah($productVariant->selling_price) }}
                                    </td>
                                    <td>
                                        {{ $productVariant->quantity }}
                                    </td>
                                    <td>
                                        {!! !isset($productVariant->name)
                                            ? "<span class='badge bg-primary'>Tidak ada varian</span>"
                                            : "<span class='badge bg-success'>Ada Varian</span>" !!}
                                    </td>
                                    <td>
                                        <a href="#" wire:click="editProductVariant({{ $productVariant->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateProductVariantModal"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <button type="button"
                                            wire:click="deleteProductVariant({{ $productVariant->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteProductVariantModal"
                                            class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Varian Produk kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("livewire:init", function() {
            Livewire.on("close-modal", event => {
                $("#addProductVariantModal").modal("hide");
                $("#updateProductVariantModal").modal("hide");
            })
            Livewire.on("confirmDelete", function({
                message
            }) {
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

            Livewire.on("alert", function({
                message
            }) {
                Swal.fire({
                    title: message.title,
                    text: message.text,
                    icon: message.icon,
                    confirmButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload()
                    }
                })
            })

        })
    </script>
@endpush
