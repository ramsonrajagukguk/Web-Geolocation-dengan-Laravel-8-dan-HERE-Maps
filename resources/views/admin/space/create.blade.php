@extends('admin.app')

@push('style')

@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-2 ">Tambah Baru</h5>
                        <a href="{{ route('space.index') }}" class="btn btn-outline-secondary btn-sm mb-0" type="button"><i class="fa fa-angle-double-left text-sm">&nbsp;Kembali</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('space.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Nama Tempat') }}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama tempat">
                                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Alamat') }}</label>
                                        <textarea name="address" cols="30" rows="2" class="form-control @error('address') is-invalid @enderror" placeholder="Tuliskan deskripsi ">{{ old('address') }}</textarea>
                                        @error('address') <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Keterangan') }}</label>
                                        <textarea name="description" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan deskripsi ">{{ old('description') }}</textarea>
                                        @error('description') <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="here-maps" class="form-group">
                                            <label class="form-control-label">{{ __('Pin Location') }}</label>
                                            <div style="width: 640px; height: 300px" id="mapContainer"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Location') }}</label>
                                            <input name="latitude" id="lat" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
                                            @error('latitude') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Longitude') }}</label>
                                            <input name="longitude" id="lng" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}">
                                            @error('longitude') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Photo Depan') }}</label>
                                            <div class="input-group mb-4">
                                                <input class="form-control @error('photoutama') is-invalid @enderror" value="{{ old('photoutama') }}" name="photoutama" type="file">
                                            </div>
                                            @error('photoutama') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group increment">
                                            <label class="form-control-label">{{ __('Photo') }}</label>
                                            <div class="input-group mb-4">
                                                <input class="form-control @error('photo') is-invalid @enderror" name="photo[]" type="file">
                                                <button type="button" class="input-group-text btn-primary btn-add"><i class="fas fa-plus-square"></i></button>
                                            </div>
                                            @error('photo') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="clone invisible">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" name="photo[]" type="file">
                                                    <button type="button" class="input-group-text btn-outline-danger btn-remove"><i class="fas fa-minus-square"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{
                                        'Simpan' }}</button>
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
    window.action = "submit"

    $(document).ready(function() {
        $(".btn-add").click(function() {
            let markup = $(".invisible").html();
            $(".increment").append(markup);
        });

        $("body").on("click", ".btn-remove", function() {
            $(this).parent(".input-group").remove();
        });
    });

</script>
@endpush
