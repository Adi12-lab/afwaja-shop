<div> <!-- Komponen livewire harus di wrap dengan div-->

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title text-white">Hapus Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="destroyCategory">
                    <div class="modal-body text-white">
                        <p>Anda yakin ingin menghapus category ini ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h6 class="mt-4 text-uppercase">Daftar kategori <i class="bx bx-cube"></i></h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->name }}</th>
                                    <td>
                                        <p>
                                            {{ $category->slug }}
                                        </p>
                                    </td>
                                    <td>
                                        @if ($category->status === 0)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Diarsipkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" width="100" alt="Category Image">
                                    </td>
                                    <td>
                                    
                                        <a href="{{route("category.edit", $category->id)}}" class="btn btn-warning px-3">Edit</a>
                                        <a href="#" wire:click="deleteCategory({{ $category->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <h4>Tidak ada kategori yang tersedia</h4>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>

@section('script')
    <script>
        window.addEventListener("close-modal", event => {
            $("#deleteModal").modal("hide");
        })
    </script>
@endsection
