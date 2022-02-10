{{-- <a href="{{ route('penulis.edit', $model) }}" class="btn btn-warning">Edit</a> --}}
<button href="{{ route('penulis.destroy', $model) }}" class="btn btn-danger" id="delete">Hapus</button>

<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        document.getElementById('deleteForm').action = href;
        document.getElementById('deleteForm').submit();
</script>
