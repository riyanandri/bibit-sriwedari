@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data Banner</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Banner</a></div>
            <div class="breadcrumb-item">Edit data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form action="{{ url('admin/banners/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Form Tambah Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $banner->title }}" name="title">
                                        @error('title')
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
                                        <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description">{{ $banner->description }}</textarea>
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
                                        <label>Banner</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                        <div class="mt-3 border">
                                            <img src="{{ asset($banner->image) }}" alt="banner">
                                        </div>
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
                                            <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Publish</option>
                                            <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Draft</option>
                                        </select>
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
