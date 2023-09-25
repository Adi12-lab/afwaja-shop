@extends('layouts.app')

@section('main')
    <div class="container">

        <!-- Large modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large
            modal</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="container px-5 py-4">
                        <h4>Tambah Alamat</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Nama Alamat">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Nama Penerima">
                            </div>
                            <div class="col-lg-8">
                                <div class="input-item">
                                    <select class="nice-select">
                                        <option>Pilih provinsi</option>
                                        <option>Australia</option>
                                    
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
    
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
