@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Data Kategori</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori</a></div>
            <div class="breadcrumb-item">Tambah data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form Tambah Data</h4>
                        </div>
                        <div class="card-body">
                            <div id="accordion">
                                <div class="accordion">
                                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#input-data" aria-expanded="true">
                                        <h4>Input Data</h4>
                                    </div>
                                    <div class="accordion-body collapse show" id="input-data" data-parent="#accordion">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Nama Kategori</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Slug</label>
                                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug">
                                                    @error('slug')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description"></textarea>
                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label>Gambar</label>
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label>Status</label>
                                                    <select class="form-control selectric" name="status">
                                                        <option value="0">Publish</option>
                                                        <option value="1">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion">
                                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#seo-tags">
                                        <h4>SEO Tags</h4>
                                    </div>
                                    <div class="accordion-body collapse" id="seo-tags" data-parent="#accordion">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Meta title</label>
                                                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                                                    @error('meta_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label>Meta keyword</label>
                                                    <textarea class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword"></textarea>
                                                    @error('meta_keyword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label>Meta deskripsi</label>
                                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"></textarea>
                                                    @error('meta_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
