@push('css')
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('header')
Sentra Bibit
@endsection

<div>
    @include('livewire.admin.sentra-bibit.modal-form')
    <div class="row">
        <div class="col">
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Sukses!</strong> {{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <a href="#" wire:click="openModal" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#modalSentraBibit">
                    <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                    <span class="btn-inner--text">Tambah data</span>
                </a>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>Sentra Bibit</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($sentra_bibit as $sentra)
                    <tr>
                        <td>{{ $sentra->name }}</td>
                        <td>{{ $sentra->slug }}</td>
                        <td>
                            @if ($sentra->status == 1)
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i>
                                    <span class="status">Draft</span>
                                </span>
                            @else
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">Publish</span>
                                </span>
                            @endif
                        </td>
                        <td class="table-actions">
                            <a href="#" wire:click="editSentraBibit({{ $sentra->id }})" data-toggle="modal" data-target="#updateSentraBibit" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fas fa-user-edit"></i>
                              </a>
                              <a href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{ $sentra->id }})' class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fas fa-trash"></i>
                              </a>
                        </td>
                      </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data sentra bibit tidak ditemukan!</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script>
    window.addEventListener('close-modal', event => {
        $('#modalSentraBibit').modal('hide');
        $('#updateSentraBibit').modal('hide');
    });

</script>
<script>
    window.addEventListener('sentraBibitDeleted', event => {
        Swal.fire(
        'Berhasil',
        'Data sentra bibit telah dihapus.',
        'success'
        )
    });

</script>
@endpush
