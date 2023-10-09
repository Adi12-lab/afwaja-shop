<div>
    @include('livewire.admin.quote.modal-form')
    <div class="row">
        <div class="col-xl-11 mx-auto">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h6 class="mb-0 text-uppercase">
                Quote <i class="bx bx-bold"></i>
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#addBrandModal">Tambah Quote</button>
            </h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Author</th>
                                <th scope="col">Quote</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($quotes as $quote)
                                <tr wire:key="{{ $quote->id }}">
                                    <td>{{$quote->author}}</td>
                                    <td>
                                        <p>{{$quote->quote}}</p>
                                    </td>
                                    <td>
                                        <a href="#" wire:click="editQuote({{ $quote->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" wire:click="deleteQuote({{ $quote->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Quote Kosong</td>
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

