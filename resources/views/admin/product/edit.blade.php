@extends('layouts.admin')

@section('style')
    <link href="{{ asset('admin/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('wrapper')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah produk</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#core_product" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Produk</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#meta_tags" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Meta tags</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#images" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-images font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Gambar</div>
                                </div>
                            </a>
                        </li>
                    </ul>

                    {{-- Content --}}

                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="core_product" role="tabpanel">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $product->name) }}" placeholder="Nama Produk">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="category_id" class="col-sm-3 col-form-label">Pilih Kategori</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">--Pilih kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category->id === $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="brand_id" class="col-sm-3 col-form-label">Pilih Brand</label>
                                    <div class="col-sm-9">
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="">--Pilih Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $product->brand->id === $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Slug" value="{{ old('slug', $product->slug) }}">
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="small_description" class="col-sm-3 col-form-label">Deskripsi
                                        bagian</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="small_description" rows="2" placeholder="Deskripsi bagian produk"
                                            name="small_description">{{ old('small_description', $product->small_description) }}</textarea>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea id="description" rows="3" placeholder="Deskripsi Produk" name="description">{!! old('description', $product->description) !!}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status"
                                                name="status" {{ old('status', $product->status) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">Aktif</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="isNew"
                                                name="isNew" {{ old('isNew', $product->isNew) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="isNew">isNew</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- Tab Meta --}}
                            <div class="tab-pane fade" id="meta_tags" role="tabpanel">
                                <div class="row mb-3">
                                    <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="meta_title"
                                            placeholder="Judul Meta Halaman"
                                            value="{{ old('meta_title', $product->meta_title) }}" name="meta_title">
                                        @error('meta_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="meta_keyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                            placeholder="Keyword Meta Halaman"
                                            value="{{ old('meta_keyword', $product->meta_keyword) }}">
                                        @error('meta_keyword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-3 col-form-label">Meta
                                        Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="meta_description" rows="3" class="form-control" name="meta_description"
                                            placeholder="Deskripsi Meta Halaman">{{ old('meta_description', $product->meta_description) }}</textarea>
                                        @error('meta_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Tab Image Produk --}}
                            <div class="tab-pane fade" id="images" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-9 mx-auto">
                                        <h6 class="mb-0 text-uppercase">Gambar produk</h6>
                                        <hr />
                                        <div class="row">
                                            <div class="col-md-5 mx-auto">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($product->productImages as $image)
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset($image->image) }}" width="120"
                                                                        alt="Product image">
                                                                    <input type="hidden" name="previous_image[]"
                                                                        value="{{ $image->id }}">
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="remove-image border-0 bg-white">
                                                                        <span class="font-22 text-danger"><i
                                                                                class="lni lni-close"></i></span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <input id="product_image" name="images[]" type="file"
                                                    accept="image/*" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Simpan</button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
        referrerpolicy="origin"></script>
    <script>
        $(document).ready(function() {
            $('#product_image').imageuploadify();
            $(function() {
                tinymce.init({
                    selector: '#description'
                });
            });
            $(".remove-image").click(function(e) {
                $(this).parents("tr").remove()
            })
        })
    </script>
@endsection
