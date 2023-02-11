<div class="row">
    <div class="col">
        {{-- @if (session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('message') }}
                </div>
            </div>
        @endif --}}
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <a href="{{ url('admin/banners/create') }}" class="btn btn-icon btn-primary" type="button">
                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                <span class="btn-inner--text">Tambah data</span>
            </a>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($banners as $banner)
                <tr>
                    <td>{{ $banner->title }}</td>
                    <td>
                        <img src="{{ asset($banner->image) }}" style="width: 70px; height: 45px;" />
                    </td>
                    <td>{!! html_entity_decode($banner->description) !!}</td>
                    <td>
                        @if ($banner->status == 1)
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
                        <a href="{{ url('admin/banners/'.$banner->id.'/edit') }}" class="table-action" data-toggle="tooltip" data-original-title="Edit banner">
                            <i class="fas fa-user-edit"></i>
                          </a>
                          <a href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{ $banner->id }})' class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete banner">
                            <i class="fas fa-trash"></i>
                          </a>
                        {{-- <a href="{{ url('admin/banners/'.$banner->id.'/edit') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" wire:click.prevent='deleteConfirmation({{ $banner->id }})' class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Hapus</a> --}}
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data banner tidak ditemukan!</td>
                </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>