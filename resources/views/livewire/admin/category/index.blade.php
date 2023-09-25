<div>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <form wire:submit.prevent="query">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Kategori" aria-describedby="search"
                        wire:model.defer="search">
                    <button class="btn btn-secondary" type="submit" id="search">Cari</button>
                </div>
            </form>
        </div>

        <div class="col-xl-9 mx-auto">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h6 class="text-uppercase">Daftar kategori <i class="bx bx-cube"></i>
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-end">Tambah Kategori</a>
            </h6>
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
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->name }}</th>
                                    <td>
                                        <p>
                                            {{ $category->slug }}
                                        </p>
                                    </td>
                                    <td>
                                        @if ($category->status === 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-info">Diarsipkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" width="100" alt="Category Image">
                                    </td>
                                    <td>

                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <button wire:click="deleteCategory({{ $category->id }})"
                                            class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        {{$categories->links()}}
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
