@extends('layouts.admin')

@section('style')
    <link href="{{ asset('admin/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Tambah produk</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <form action="">

                                <input type="text" name="adi">
                                <div class="row">
                                    <div class="col-xl-9 mx-auto">
                                        <h6 class="mb-0 text-uppercase">Image Uploadify</h6>
                                        <hr />
                                        <div class="card">
                                            <div class="card-body">
                                                    <input id="product_image" type="file"
                                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                        multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit">SUbmit</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('admin/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('admin/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('admin/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#product_image').imageuploadify();
            //Tambah Variant Item
            $("#addVariantItem").click(function(e) {
                e.preventDefault()
                $("#variant").append(
                    /* html*/
                    `
                   <div class="variant-item">
                        <hr>
                        <div class="row mb-3">
                            <label for="variant_name"
                                class="col-sm-3 col-form-label">Variant</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="variant_name"
                                    name="variant_name[]" placeholder="Nama Variant">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="variant_kode"
                                class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="variant_kode"
                                    name="variant_kode[]" placeholder="Kode Variant">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="selling_price" class="col-sm-3 col-form-label">Harga
                                Jual</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="selling_price"
                                    name="selling_price[]" placeholder="Harga Jual">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="original_price" class="col-sm-3 col-form-label">Harga
                                Asli</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control"
                                    id="original_price[]" name="original_price"
                                    placeholder="Harga Asli">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="quantity" class="col-sm-3 col-form-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="quantity"
                                    name="quantity[]" placeholder="Stok barang">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger px-3 remove-variant">Hapus</button>
                        <hr>
                    </div>
                `
                )
            })

            $("#variant").on("click", ".remove-variant", function(e) {
                $(this).parents(".variant-item").remove()
            })
        })
    </script>
@endsection
