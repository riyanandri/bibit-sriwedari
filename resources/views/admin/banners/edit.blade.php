@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/vendor/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/quill/dist/quill.core.css') }}">
@endpush

@section('header')
Edit Data Banner
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-wrapper">
          <!-- Input groups -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <a href="{{ url('admin/banners') }}" class="btn btn-primary" type="button">
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <form action="{{ url('admin/banners/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Input groups with icon -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="title">Judul</label>
                          <input class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $banner->title }}" type="text"/>
                          @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="image">Upload Gambar</label>
                          <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"/>
                          <div class="mt-3">
                            <img src="{{ asset($banner->image) }}" style="width: 100px; height: 65px;"/>
                          </div>
                          @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="description">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $banner->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" data-toggle="select" name="status">
                                <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Publish</option>
                                <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-icon btn-primary float-right" type="submit">
                    <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                    <span class="btn-inner--text">Simpan</span>
                </button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('admin/vendor/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admin/vendor/nouislider/distribute/nouislider.min.js') }}"></script>
<script src="{{ asset('admin/vendor/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('admin/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
@endpush
