@extends('layouts.admin')

@section('content')
<div>
    <livewire:admin.category.index />
</div>
@endsection

@push('js')
<script src="{{ asset('admin/node_modules/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/js/page/components-table.js') }}"></script>
@endpush
