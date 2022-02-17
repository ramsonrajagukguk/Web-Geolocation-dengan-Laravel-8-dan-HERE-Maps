@extends('admin.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <h5 class="mb-2 ">Tambah Buku</h5>
                <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary btn-sm mb-0" type="button"><i class="fa fa-angle-double-left text-sm">&nbsp;Kembali</i></a>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-control-label">{{ __('Judul Buku') }}</label>
                          <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan judul buku" value="{{ old('judul') }}">
                          @error('judul') <div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Nama Penulis') }}</label>
                           <select id="form-select-sm" class="form-select @error('penulis_id') is-invalid @enderror" name="penulis_id" id="">
                            {{-- <option value="">-- Pilih Penulis --</option> --}}
                             @foreach ($penulis as $item )
                             <option value="{{ $item->id }}">{{ $item->name ?? old('penulis_id') }}</option>
                             @endforeach
                          </select>
                        @error('penulis_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-control-label">{{ __('Keterangan') }}</label>
                          <textarea name="keterangan"  cols="30" rows="2" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Tuliskan deskripsi buku">{{ old('keterangan') }}</textarea>
                          @error('keterangan') <div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-control-label">{{ __('Jumlah') }}</label>
                          <input type="number"  class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" placeholder="10" value="{{ old('jumlah') }}">
                          @error('jumlah') <div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-control-label">{{ __('Cover') }}</label>
                          <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" placeholder="Gambar">
                          @error('cover') <div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div>
              </div>
              <div class="d-flex justify-content-start">
                  <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
              </div>
          </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('select').select2({
    theme: "bootstrap-5",
    dropdownParent: $("#form-select-sm").parent(), // Required for dropdown styling
});
});
</script>
  
@endpush