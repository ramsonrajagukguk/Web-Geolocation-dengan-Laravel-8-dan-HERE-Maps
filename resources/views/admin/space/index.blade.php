@extends('admin.app')
@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
     @include('admin.components.space')
    </div>
  </div>
</div>


@endsection

@push('scripts')
<script>
   $("#dataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
</script>
@endpush

