<div class="modal fade bd-example-modal-lg" id="addAddressModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container px-5 py-4">
                <h4>Tambah Alamat</h4>
                <form class="row">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Nama Alamat">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Nama Penerima">
                    </div>
                    <div class="col-lg-8">
                        <div class="input-item">
                            <select wire:model="selected_province" class="nice-select">
                                <option>Pilih provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{$province->province_id}}" wire:key="{{"province-$province->province_id"}}">{{$province->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-item">
                            <select class="nice-select">
                                <option>Pilih Kabupaten</option>
                                <option>Australia</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-item">
                            <select class="nice-select">
                                <option>Pilih Kecamatan</option>
                                <option>Australia</option>

                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-item input-item-textarea ltn__custom-icon">
                            <textarea name="ltn__message" placeholder="Alamat lengkap"></textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="submit-button-1 ml-auto" data-toggle="modal"
                            data-target="#addAddressModal">Tambah Alamat</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
