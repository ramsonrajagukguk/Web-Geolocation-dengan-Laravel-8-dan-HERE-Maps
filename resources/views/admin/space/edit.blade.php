@extends('admin.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-2 ">Update Spaces</h5>
                        <a href="{{ route('space.index') }}" class="btn btn-outline-secondary btn-sm mb-0" type="button"><i class="fa fa-angle-double-left text-sm">&nbsp;Kembali</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('space.update',$space) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Judul') }}</label>
                                        <input type="text" value="{{ $space->title }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukkan title">
                                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Alamat') }}</label>
                                        <textarea name="addres" cols="30" rows="2" class="form-control @error('addres') is-invalid @enderror" placeholder="Alamat">{{ $space->address }}</textarea>
                                        @error('addres') <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Keterangan') }}</label>
                                        <textarea name="description" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Keterangan ">{{ $space->description }}</textarea>
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
                                            <input name="latitude" id="lat" class="form-control @error('latitude') is-invalid @enderror" value="{{ $space->latitude}}">
                                            @error('latitude') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Longitude') }}</label>
                                            <input name="longitude" id="lng" class="form-control @error('longitude') is-invalid @enderror" value="{{$space->longitude}}">
                                            @error('longitude') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @if($space->photoutama)
                                        <img src="{{ Storage::url($space->photoutama) }}" alt="gambar utamat" class="mg-preview img-fluid mb-3 col-sm-5">
                                        @else
                                        <div class="img-preview img-fluid mb-3 col-sm-5"></div>
                                        @endif

                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Photo Depan') }}</label>
                                            <div class="input-group mb-4">
                                                <input class="form-control @error('photoutama') is-invalid @enderror" value="{{ old('photoutama') }}" name="photoutama" id="image" onchange="previewImage()" type="file">
                                            </div>
                                            @error('photoutama') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group increment">
                                            <label class="form-control-label">{{ __('Photo') }}</label>
                                            <input type="hidden" name="oldimage" value="{{ $space->photoutama }}">

                                            <div class="input-group mb-4">
                                                <input class="form-control" name="photo[]" type="file">
                                                <button type="button" class="input-group-text btn-primary btn-add"><i class="fas fa-plus-square"></i></button>
                                            </div>
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
                                        'Update' }}</button>
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
