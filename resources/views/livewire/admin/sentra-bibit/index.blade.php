<div>
    @include('livewire.admin.sentra-bibit.modal-form')
    <section class="section">
        <div class="section-header">
            <h1>Data Sentra Bibit</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Sentra Bibit</a></div>
                <div class="breadcrumb-item">Daftar Sentra Bibit</div>
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
                            <h4><a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#modalSentraBibit"><i class="fas fa-plus"></i></i> Tambah data</a></h4>
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
                                            <th>No</th>
                                            <th>Sentra Bibit</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sentra_bibit as $sentra)
                                        <tr>
                                            <td>{{ $sentra->id }}</td>
                                            <td>{{ $sentra->name }}</td>
                                            <td>
                                                <div class="badge badge-success">{{ $sentra->status == 1 ? 'Draft' : 'Publish' }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/sentra-bibit/'.$sentra->id.'/edit') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#" wire:click.prevent='deleteConfirmation({{ $sentra->id }})' class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data Sentra Bibit tidak ditemukan!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="card-footer text-right">
                                    <nav class="d-inline-block">
                                        <ul class="pagination mb-0">
                                            {{ $sentra_bibit->links() }}
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
</div>

@push('js')
<script>
    window.addEventListener('close-modal', event => {
        $('#modalSentraBibit').modal('hide');
    });

</script>
@endpush
