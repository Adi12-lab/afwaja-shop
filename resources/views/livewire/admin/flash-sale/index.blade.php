<div>
    @include('livewire.admin.flash-sale.modal-form')
    <div class="row">
        <div class="col-12">
            @if (session('message'))
                <div class="alert alert-{{session("message")["status"] === "success" ? "succes" : "danger"}}">{{ session('message')["text"] }}</div>
            @endif
            <h6 class="mb-0 text-uppercase">
                Flash Sale <i class="bx bx-bold"></i>
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#addBrandModal">Tambah FlashSale</button>
            </h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Dedline</th>
                                <th scope="col">Gambar1</th>
                                <th scope="col">Gambar2</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($flashSaleProducts as $flashSale)
                                <tr wire:key="{{ $flashSale->id }}">
                                    <th scope="row">{{ $flashSale->product->name }}</th>
                                    <td>{{ rupiah($flashSale->price) }}</td>
                                    <td>
                                        @if ($flashSale->isActive === 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-info">Diarsipkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$flashSale->deadline}}
                                    </td>
                                    <td>
                                        <img src="{{asset($flashSale->image1)}}" style="width: 200px; fit-content: cover;">
                                    </td>
                                    <td>
                                        <img src="{{asset($flashSale->image2)}}" style="width: 200px; fit-content: cover;">
                                    </td>
                                    
                                    <td>
                                        <a href="#" wire:click="editFlashSale({{ $flashSale->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" wire:click="deleteFlashSale({{ $flashSale->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td>Flash Sale masih Kosong</td>
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
        document.addEventListener("livewire:init", function() {
            Livewire.on("close-modal", event => {
                $("#addBrandModal").modal("hide");
                $("#updateBrandModal").modal("hide");
                $("#deleteBrandModal").modal("hide");
            })

            $("#addBrandModal").on("hidden.bs.modal", function(e) {
                Livewire.dispatch("close-modal")
            })
            $("#updateBrandModal").on("hidden.bs.modal", function(e) {
                Livewire.dispatch("close-modal")
            })
            $("#deleteBrandModal").on("hidden.bs.modal", function(e) {
                Livewire.dispatch("close-modal")
            })
        })

    </script>
@endpush
