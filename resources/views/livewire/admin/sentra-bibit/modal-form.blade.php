<!-- Insert -->
<div wire:ignore.self class="modal fade" id="modalSentraBibit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Tambah Data</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form wire:submit.prevent="storeSentraBibit">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label" for="name">Nama Sentra Bibit</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name" name="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="slug">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" wire:model.defer="slug" name="slug">
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="status">Status</label>
                    <select class="form-control" wire:model.defer="status" data-toggle="select" name="status">
                        <option value="0">Publish</option>
                        <option value="1">Draft</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<!-- Update -->
<div wire:ignore.self class="modal fade" id="updateSentraBibit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Edit Data</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form wire:submit.prevent="updateSentraBibit">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label" for="name">Nama Sentra Bibit</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name" name="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="slug">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" wire:model.defer="slug" name="slug">
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="status">Status</label>
                    <select class="form-control" wire:model.defer="status" data-toggle="select" name="status">
                        <option value="0">Publish</option>
                        <option value="1">Draft</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
