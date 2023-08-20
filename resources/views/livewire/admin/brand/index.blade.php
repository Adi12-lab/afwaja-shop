<div>
    @include('livewire.admin.brand.modal-form')
    <div class="page-wrapper">
        <div class="page-content">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h6 class="mb-0 text-uppercase">Brand</h6>
            <hr />
            <div class="card">
                <div class="card-header">
                    <h4>List Brand <i class="bx bx-bold"></i>
                        <a href="" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#addBrandModal">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brand->name }}</th>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            Tidak ada kategori
                                        @endif
                                    </td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>
                                        @if ($brand->status === 0)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Diarsipkan</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td>Brand kosong</td>
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
    <script>
        window.addEventListener("close-modal", event => {
            $("#addBrandModal").modal("hide");
            $("#updateBrandModal").modal("hide");
            $("#deleteBrandModal").modal("hide");
        })
    </script>
@endpush

