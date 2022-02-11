{{-- <a href="{{ route('penulis.edit', $model) }}" class="btn btn-warning">Edit</a> --}}
<button href="{{ route('penulis.destroy', $model) }}" class="btn btn-danger" id="delete">Hapus</button>

@push('scripts')
<script>
    $('#delete').on('click', function(e){
        alert('ok');
        // e.preventDefault();
        // var href = $(this).attr('href');
        // document.getElementById('deleteForm').action = href;
        // document.getElementById('deleteForm').submit();
</script>
@endpush
