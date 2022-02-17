@extends('admin.app')
@section('content')

<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex">
            <a class="btn bg-gradient-primary mt-1 w-15" href="" type="button">Tambah</a>
          </div>
        </div>
        <div class="card-body px-3 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="dataTable" class="table align-items-center p-3 mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                  <th class="text-secondary opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($penulis as $data )
                <tr class="p-3">
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $data->name }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <form action="{{ route('penulis.destroy', $data->id) }}"
                        method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('penulis.destroy', $data->id) }}"
                            class="btn btn-success btn-sm"><i
                                class="nav-icon fas fa-edit"></i>Edit
                        </a>

                        <button class="btn btn-danger btn-sm"><i
                                class="nav-icon fas fa-trash-alt"></i>Hapus</button>
                    </form>
                </td>
                  {{--  <td class="align-middle">

                    <div class="d-flex px-2 py-1">
                    <a href="{{ route('penulis.destroy', $data->id) }}" class="btn-sm bg-info text-white">
                      Edit
                    </a>
                    <form action="{{ route('penulis.destroy', $data->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-sm"><i class="mr-2 nav-icon fas fa-trash-alt"></i>Hapus</button>
                  </form>
                    </div>
                  </td>  --}}
                </tr>               
                @endforeach
              </tbody>
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
<script>
   $("#dataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  // $(function () {
  //     $('#dataTable').DataTable({
  //         processing: true,
  //         serverSide: true,
  //         ajax: '{{ route('penulis.data') }}',
  //         columns: [
  //             { data: 'DT_RowIndex', orderable: false, searchable : false},
  //             { data: 'name'},
  //             { data: 'action'}
  //         ]
  //     });
  // });
</script>
@endpush

