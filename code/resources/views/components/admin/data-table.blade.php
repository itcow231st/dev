<table id="{{ $id }}" class="table table-bordered"></table>

@push('scripts')
<script>
$(function () {
    $('#{{ $id }}').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.datatable') }}",
            data: {
                table: @json($table),
                actions: @json($actions)
            }
        },
        columns: @json($columns)
    });
});
</script>
@endpush
