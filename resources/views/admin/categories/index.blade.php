@extends('layouts.admin')

@section('content')
<div>
    <livewire:admin.category.index />
</div>
@endsection

@push('js')
<script src="{{ asset('admin/node_modules/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/js/page/modules-sweetalert.js') }}"></script>
<script>
    window.addEventListener('show-delete-confirmation', event => {
        swal({
                title: 'Anda yakin?'
                , text: 'Ingin menghapus data ini?'
                , icon: 'warning'
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    Livewire.emit('deleteConfirmed')
                } else {
                    swal('Data anda masih aman!');
                }
            });
    });

    window.addEventListener('categoryDeleted', event => {
        swal('Data telah dihapus!', {
            icon: 'success'
        , });
    });

</script>
@endpush
