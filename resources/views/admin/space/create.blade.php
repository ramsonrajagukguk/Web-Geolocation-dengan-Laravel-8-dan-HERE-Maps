@extends('admin.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <h5 class="mb-2 ">Tambah Space Baru</h5>
            <a href="{{ route('space.index') }}" class="btn btn-outline-secondary btn-sm mb-0" type="button"><i
                class="fa fa-angle-double-left text-sm">&nbsp;Kembali</i></a>
          </div>
          <div class="card-body">
            <form action="{{ route('space.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">{{ __('Judul') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                      placeholder="Masukkan title " value="{{ old('title') }}">
                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">{{ __('Alamat') }}</label>
                    <textarea name="address" cols="30" rows="2"
                      class="form-control @error('address') is-invalid @enderror"
                      placeholder="Tuliskan deskripsi ">{{ old('address') }}</textarea>
                    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">{{ __('Keterangan') }}</label>
                    <textarea name="description" cols="30" rows="3"
                      class="form-control @error('description') is-invalid @enderror"
                      placeholder="Tuliskan deskripsi ">{{ old('description') }}</textarea>
                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div id="here-maps" class="form-group">
                      <label class="form-control-label">{{ __('Pin Location') }}</label>
                      <div style="height: 500px" id="mapContainer"></div>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">{{ __('Location') }}</label>
                      <input name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{
                      old('latitude') }}">
                      @error('latitude') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-control-label">{{ __('Longtitude') }}</label>
                      <input name="longtitude" class="form-control @error('longtitude') is-invalid @enderror" value="{{
                      old('longtitude') }}">
                      @error('longtitude') <div class="text-danger">{{ $message }}</div> @enderror
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