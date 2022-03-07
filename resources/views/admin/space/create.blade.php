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
                                        <label class="form-control-label">{{ __('Judul') }}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukkan title " value="Judul">
                                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Alamat') }}</label>
                                        <textarea name="addres" cols="30" rows="2" class="form-control @error('addres') is-invalid @enderror" placeholder="Tuliskan deskripsi ">Alamat</textarea>
                                        @error('addres') <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Keterangan') }}</label>
                                        <textarea name="description" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan deskripsi ">Keterangan</textarea>
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
                                            <input name="lotitude" id="lat" class="form-control @error('lotitude') is-invalid @enderror" value="3234234">
                                            @error('lotitude') <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Longitude') }}</label>
                                            <input name="longitude" id="lng" class="form-control @error('longitude') is-invalid @enderror" value="43453">
                                            @error('longitude') <div class="text-danger">{{ $message }}</div>
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
    $(document).ready(function() {
        $(".btn-add").click(function() {
            let markup = $(".invisible").html();
            $(".increment").append(markup);
        });

        $("body").on("click", ".btn-remove", function() {
            $(this).parent(".input-group").remove();
        })
    });

    if (navigator.geolocation) { //jika navigator tersedia
        navigator.geolocation.getCurrentPosition(showPosition, showError);

    } else { //jika navigator tidak tersedia
        console.log("Geolocation is not supported by this device");
    }

    //jika location allowed
    function showPosition(position) {
        localCoord = position.coords;
        objLocalCoord = {
            lat: localCoord.latitude
            , lng: localCoord.longitude
        , };

        let platform = new H.service.Platform({
            apikey: 'QymcgCMbysQyyAzi3rTMINJy_hBU6wi_rh88B_tq02w'
        });
        let defaultLayers = platform.createDefaultLayers();
        let map = new H.Map(document.getElementById('mapContainer')
            , defaultLayers.vector.normal.map, {
                center: objLocalCoord
                , zoom: 13
                , pixelRatio: window.devicePixelRatio || 1
            });

        window.addEventListener('resize', () => map.getViewPort().resize());
        let behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
        let ui = H.ui.UI.createDefault(map, defaultLayers);

        // function addMarkersToMap(map) {
        //     var parisMarker = new H.map.Marker(objLocalCoord);
        //     map.addObject(parisMarker);
        // }

        function addDraggableMarker(map, behavior) {




            var marker = new H.map.Marker(objLocalCoord, {
                // mark the object as volatile for the smooth dragging
                volatility: true
            });
            // Ensure that the marker can receive drag events
            marker.draggable = true;
            map.addObject(marker);

            // disable the default draggability of the underlying map
            // and calculate the offset between mouse and target's position
            // when starting to drag a marker object:
            map.addEventListener('dragstart', function(ev) {
                var target = ev.target
                    , pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    var targetPosition = map.geoToScreen(target.getGeometry());
                    target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer.viewportY - targetPosition.y);
                    behavior.disable();
                }
            }, false);


            // re-enable the default draggability of the underlying map
            // when dragging has completed
            map.addEventListener('dragend', function(ev) {
                var target = ev.target;
                if (target instanceof H.map.Marker) {
                    behavior.enable();
                    let inputlat = document.getElementById("lat");
                    let inputlng = document.getElementById("lng");

                    if (inputlat.value != "" && inputlng.value != "") {
                        objLocalCoord = {
                            lat: inputlat.value
                            , lng: inputlng.value
                        , };
                    }
                }
            }, false);

            // Listen to the drag event and move the position of the marker
            // as necessary
            map.addEventListener('drag', function(ev) {
                var target = ev.target
                    , pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    target.setGeometry(map.screenToGeo(pointer.viewportX - target['offset'].x, pointer.viewportY - target['offset'].y));
                }
            }, false);
        }

        window.onload = function() {
            addDraggableMarker(map, behavior);
            // addMarkersToMap(map);
        }



    }


    //jika location disabled atau not allowed
    function showError(error) {

        switch (error.code) {
            case error.PERMISSION_DENIED:
                console.log("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                console.log("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                console.log("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                console.log("An unknown error occurred.");
                break;
        }
    }
    window.action = "submit";

</script>

@endpush
