@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-10">
                            <div class="card-header pb-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">Daftar Peneulis</h5>
                                    </div>
                                    <a href="{{ route('penulis.create') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                        type="button">+&nbsp; Penulis Baru</a>
                                </div>
                            </div>
                            <div class="card-body px-3 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table id="dataTable" class="table align-items-center p-3 mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nomor</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Penulis</th>
                                                <th class="text-secondary text-center opacity-7">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penulis as $data)
                                                <tr>
                                                    <td style="width: 10px">
                                                        <p class="text-xs text-center font-weight-bold mb-0">
                                                            {{ $loop->iteration }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('penulis.destroy', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{ route('penulis.edit', $data->id) }}"
                                                                class="btn btn-success px-3 btn-sm"><i
                                                                    class="nav-icon fas fa-edit fs-6"></i>
                                                            </a>

                                                            <button class="btn btn-danger px-3 btn-sm"><i
                                                                    class="nav-icon fas fa-trash-alt fs-6"></i></button>
                                                        </form>
                                                    </td>
                                                    {{-- <td class="align-middle">
    
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
                      </td> --}}
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
            "autoWidth": true,
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
