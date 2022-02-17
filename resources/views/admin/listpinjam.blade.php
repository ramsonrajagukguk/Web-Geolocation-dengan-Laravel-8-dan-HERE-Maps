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
                                        <h5 class="mb-0">Daftar Buku Yang Sedang dipinjam</h5>
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
                                                    ID</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nama</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Judul Buku</th>
                                                <th class="text-secondary text-center opacity-7">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($borrow as $data)
                                                <tr>
                                                    <td style="width: 10px">
                                                        <p class="text-xs text-center font-weight-bold mb-0">
                                                            {{ $loop->iteration }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->user->name }}</h6>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->book->judul }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('returnBook', $data->id) }}" method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <button class="btn btn-danger px-3 btn-sm"><i
                                                                    class="nav-icon fs-6">Pengembalian
                                                                    Buku</i></button>
                                                        </form>
                                                    </td>
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
@endsection

@push('scripts')
    <script>
        $("#dataTable").DataTable({
            "responsive": true,
            "autoWidth": true,
        });
    </script>
@endpush
