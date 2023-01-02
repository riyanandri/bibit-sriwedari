@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data Produk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Produk</a></div>
            <div class="breadcrumb-item">Edit data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                @if (session('message'))
                <div class="alert alert-warning alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>
                @endif
                <div class="card">
                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Form Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item mr-1">
                                    <a class="nav-link active" id="produk-tab3" data-toggle="tab" href="#produk" role="tab" aria-controls="produk" aria-selected="true">Data Produk</a>
                                </li>
                                <li class="nav-item mr-1">
                                    <a class="nav-link" id="detail-tab3" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Produk Detail</a>
                                </li>
                                <li class="nav-item mr-1">
                                    <a class="nav-link" id="image-tab3" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">Gambar Produk</a>
                                </li>
                                <li class="nav-item mr-1">
                                    <a class="nav-link" id="seo_tags-tab3" data-toggle="tab" href="#seo_tags" role="tab" aria-controls="seo_tags" aria-selected="false">SEO Tags</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="produk" role="tabpanel" aria-labelledby="produk-tab3">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Kategori Produk</label>
                                                <select class="form-control selectric" name="category_id">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Sentra Bibit</label>
                                                <select class="form-control selectric" name="sentra_bibit">
                                                    @foreach ($sentra_bibits as $sentra)
                                                    <option value="{{ $sentra->id }}" {{ $sentra->id == $product->sentra_bibit ? 'selected' : '' }}>
                                                        {{ $sentra->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input type="text" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" name="name">
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
                                                <input type="text" value="{{ $product->slug }}" class="form-control @error('slug') is-invalid @enderror" name="slug">
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
                                                <label>Deskripsi Produk</label>
                                                <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description">{{ $product->description }}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab3">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Harga Asli</label>
                                                <input type="text" value="{{ $product->original_price }}" class="form-control @error('original_price') is-invalid @enderror" name="original_price">
                                                @error('original_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Harga Jual</label>
                                                <input type="text" value="{{ $product->selling_price }}" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price">
                                                @error('selling_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Stok</label>
                                                <input type="number" value="{{ $product->quantity }}" class="form-control @error('quantity') is-invalid @enderror" name="quantity">
                                                @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Trending</label>
                                                <select class="form-control selectric" name="trending">
                                                    <option value="1" {{ $product->trending == 1 ? 'selected' : '' }}>Ya</option>
                                                    <option value="0" {{ $product->trending == 0 ? 'selected' : '' }}>Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control selectric" name="status">
                                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Publish</option>
                                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab3">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group mb-0">
                                                <label>Upload Gambar Produk</label>
                                                <input name="image[]" type="file" class="form-control @error('image') is-invalid @enderror" multiple />
                                                @if ($product->productImages)
                                                <div class="mt-3 mb-0 mr-3">
                                                    <div class="gallery gallery-md">
                                                        @foreach ($product->productImages as $image)
                                                        <div class="gallery-item border" data-image="{{ asset($image->image) }}" data-title="Gambar Produk">
                                                        </div>
                                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="btn-sm btn-icon icon-left btn-outline-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @else
                                                <div class="text-secondary">Gambar tidak ditemukan!</div>
                                                @endif

                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seo_tags" role="tabpanel" aria-labelledby="seo_tags-tab3">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>Meta title</label>
                                                <input type="text" value="{{ $product->meta_title }}" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
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
                                            <div class="form-group">
                                                <label>Meta keyword</label>
                                                <textarea class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword">{{ $product->meta_keyword }}</textarea>
                                                @error('meta_keyword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Meta deskripsi</label>
                                                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description">{{ $product->meta_description }}</textarea>
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
                            <div class="card-footer text-right p-0 mb-1">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
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
<script src="{{ asset('admin/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endpush
