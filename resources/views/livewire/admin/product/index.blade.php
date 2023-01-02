<section class="section">
    <div class="section-header">
        <h1>Data Produk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Produk</a></div>
            <div class="breadcrumb-item">Daftar Produk</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4><a href="{{ url('admin/products/create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i></i> Tambah data</a></h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Kategori</th>
                                        <th>Produk</th>
                                        <th>Harga Asli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Sentra Bibit</th>
                                        <th>Trending</th>
                                        <th>Status</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @currency($product->original_price)
                                        </td>
                                        <td>
                                            @currency($product->selling_price)
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->sentraBibit->name }}</td>
                                        <td>
                                            @if ($product->trending == 1)
                                            <div class="badge badge-success">Ya</div>
                                            @else
                                            <div class="badge badge-danger">Tidak</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == 1)
                                            <div class="badge badge-primary">Draft</div>
                                            @else
                                            <div class="badge badge-success">Publish</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" wire:click.prevent='deleteConfirmation({{ $product->id }})' class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Data Produk tidak ditemukan!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        {{ $products->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
