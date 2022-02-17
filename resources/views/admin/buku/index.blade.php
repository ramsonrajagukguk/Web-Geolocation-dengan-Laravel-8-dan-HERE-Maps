@extends('admin.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
         <div class="card-header pb-3">
              <div class="d-flex flex-row justify-content-between">
                      <h5 class="mb-0 ps-4">Daftar Buku</h5>
                  <a href="{{ route('buku.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Buku Baru</a>
              </div>
          </div>
            <div class="card-body px-4 pt-0 pb-2">
              <div class="table-responsive p-0">
                  <table id="dataTable" class="table align-items-center mb-0">
                      <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cover</th>
                        <th class="text-center text-uppercase text-start text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                        <th class="text-center text-uppercase text-start text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $buku )
                      <tr>
                        <td class="text-center" style="width: 20px">
                          <p class="text-xs  font-weight-bold mb-0">{{ $loop->iteration }}</p>
                        </td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              {{-- <img src="{{ asset('assets/img/kal-visuals-square.jpg') }}" class="avatar avatar-sm me-3"> --}}
                              <img src="{{ Storage::url($buku->cover) }}" class="avatar avatar-lg me-3">
                            </div>
                          </div>
                        </td>
                        <td class="text-start">
                          <p class="text-xs font-weight-bold mb-0">{{ $buku->judul }}</p>
                      </td>
                        <td class="text-start">
                          <p class="text-xs font-weight-bold mb-0">
                            @foreach ($penulis as $item)
                            @if ($item->id == $buku->penulis_id)
                            {{ $item->name }}
                            @endif
                            @endforeach
                          </p>
                      </td>
                        <td class="align-middle text-center">
                          <form action="{{ route('buku.destroy', $buku->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('buku.edit', $buku) }}"
                                class="btn btn-success px-3 btn-sm"><i
                                    class="nav-icon fas fa-edit fs-6"></i>
                            </a>
    
                            <button class="btn btn-danger px-3 btn-sm"><i
                                    class="nav-icon fas fa-trash-alt fs-6"></i></button>
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
@endsection

@push('scripts')
<script>
   $("#dataTable").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
</script>
@endpush