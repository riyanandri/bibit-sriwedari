@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('header')
Banner
@endsection

@section('content')
<div>
    <livewire:admin.banner.index />
</div>
@endsection

@push('js')
<script src="{{ asset('admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script>
    // window.addEventListener('show-delete-confirmation', event => {
    //     swal({
    //             title: 'Anda yakin?'
    //             , text: 'Ingin menghapus data ini?'
    //             , icon: 'warning'
    //             , buttons: true
    //             , dangerMode: true
    //         , })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 Livewire.emit('deleteConfirmed')
    //             } else {
    //                 swal('Data anda masih aman!');
    //             }
    //         });
    // });

    window.addEventListener('bannerDeleted', event => {
        Swal.fire(
        'Berhasil',
        'Data banner telah dihapus.',
        'success'
        )
    });

</script>
@endpush
