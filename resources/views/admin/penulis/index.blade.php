@extends('admin.app')

@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        
        <div class="card-header pb-0">
          <h6>Penulis</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="dataTable" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                  <th class="text-secondary opacity-7">Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form action="" method="post" id="deleteForm">
  @csrf
  @method("DELETE")
  <input type="submit" value="Hapus" style="display: none">
</form>



@endsection

@push('scripts')
<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
      $('#dataTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('penulis.data') }}',
          columns: [
              { data: 'DT_RowIndex', orderable: false, searchable : false},
              { data: 'name'},
              { data: 'action'}
          ]
      });
  });
</script>
@endpush