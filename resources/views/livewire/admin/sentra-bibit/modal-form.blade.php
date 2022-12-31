@push('css')
<link rel="stylesheet" href="{{ asset('admin/node_modules/selectric/public/selectric.css') }}">
@endpush

<!-- Insert Data -->
<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="modalSentraBibit" aria-labelledby="modalSentraBibit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Sentra Bibit</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeSentraBibit">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Sentra Bibit</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" wire:model="slug" name="slug">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control selectric" wire:model="status" name="status">
                            <option value="0">Publish</option>
                            <option value="1">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Data -->
<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="updateSentraBibit" aria-labelledby="modalSentraBibit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Sentra Bibit</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateSentraBibit">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Sentra Bibit</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" wire:model="slug" name="slug">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control selectric" wire:model="status" name="status">
                            <option value="0">Publish</option>
                            <option value="1">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('admin/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
