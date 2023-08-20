@extends('layouts.admin')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page content">

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-cube me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Kategori Baru</h5>
                                </div>
                                <hr />
                                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" id="name" value="{{old("name")}}"
                                                placeholder="Nama Kategori">
                                                @error("name") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="slug"  name="slug" placeholder="Slug"  value="{{old("slug")}}">
                                            @error("slug") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="description" rows="3" placeholder="Deskripsi kategori" name="description" >{{old("description")}}</textarea>
                                            @error("description") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="meta_title"
                                                placeholder="Judul Meta Halaman"  value="{{old("meta_title")}}" name="meta_title">
                                                @error("meta_title") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="meta_keyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="meta_keyword"  name="meta_keyword"
                                                placeholder="Keyword Meta Halaman"  value="{{old("meta_keyword")}}">
                                                @error("meta_keyword") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="meta_description" class="col-sm-3 col-form-label">Meta
                                            Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="meta_description" rows="3" name="meta_description" placeholder="Deskripsi Meta Halaman">{{old("meta_description")}}</textarea>
                                            @error("meta_description") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-3 col-form-label">Gambar kategori</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" id="image" name="image">
                                            @error("image") <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status">
                                                <label class="form-check-label" for="status" name="status" {{old("status") ? "checked" : ""}}>Arsipkan</label>
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
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
