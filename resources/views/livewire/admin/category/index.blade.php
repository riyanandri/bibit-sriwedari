<section class="section">
    <div class="section-header">
        <h1>Data Kategori</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori</a></div>
            <div class="breadcrumb-item">Daftar Kategori</div>
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
                        <h4><a href="{{ url('admin/category/create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i></i> Tambah data</a></h4>
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
                                        <th width="15%">Nama</th>
                                        <th width="15%">Slug</th>
                                        <th width="30%">Deskripsi</th>
                                        <th width="15%">Status</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{!! html_entity_decode($category->description) !!}</td>
                                        <td>
                                            @if ($category->status == 1)
                                            <div class="badge badge-primary">Draft</div>
                                            @else
                                            <div class="badge badge-success">Publish</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" wire:click.prevent='deleteConfirmation({{ $category->id }})' class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Kategori tidak ditemukan!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        {{ $categories->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
