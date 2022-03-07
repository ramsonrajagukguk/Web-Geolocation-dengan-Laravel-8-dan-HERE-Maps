<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SISFO Perpustakaan </title>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/soft-design-system.css') }}" rel="stylesheet" />
</head>

<body class="presentation-page">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="{{ url('/') }}">
                            SISFO Perpustakaan
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-5 w-100">
                                @guest
                                <li class="nav-item ms-lg-auto">
                                    <a href="{{ route('login') }}" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-2 mt-2 mt-md-0">Login</a>
                                </li>
                                <li class="nav-item my-auto ms-3 ms-lg-0">
                                    <a href="{{ route('register') }}" class="btn btn-sm  bg-outline-danger  btn-round mb-0 me-1 mt-2 mt-md-0">REGISTER</a>
                                </li>
                                @else
                                <li class="nav-item ms-lg-auto">
                                    <h5 class="text-dark mb-0 me-2 mt-2 mt-md-0">{{ Auth::user()->name }}</h5>
                                </li>
                                <li class="nav-item my-auto ms-3 ms-lg-0">
                                    <a class="btn btn-sm  bg-gradient-primary  btn-round" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <header class="header-2">
        <div class="page-header min-vh-55 relative" style="background-image: url('./assets/img/curved.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n5">SISTEM INFORMASI PERPUSTAKAAN</h1>
                        {{-- <p class="lead text-white mt-3">Free & Open Source Web UI Kit built over Bootstrap 5.
                            <br /> Join over 1.4 million developers around the world.
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="position-absolute w-100 z-index-1 bottom-0">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                    </g>
                </svg>
            </div>
        </div>
    </header>
    <section class="pt-3 pb-4">
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
                                                    <input name="lotitude" class="form-control @error('lotitude') is-invalid @enderror" value="3234234">
                                                    @error('lotitude') <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label">{{ __('Longitude') }}</label>
                                                    <input name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="43453">
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
    </section>


    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
    <footer class="footer pt-5 mt-2">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class=" row">
                <div class="col-12 mb-4 ms-auto">
                    <div class="text-center">
                        <h6 class="text-gradient text-primary font-weight-bolder">Soft UI Design System</h6>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-center">
                        <p class="my-4 text-sm">
                            <script>
                                document.write(new Date().getFullYear())

                            </script> Soft UI Design System by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>

    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
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

                let inputlat = document.getElementById("lat");
                let inputlng = document.getElementById("lng");

                if (inputlat.value != "" && inputlng.value != "") {
                    objLocalCoord = {
                        lat: inputlat.value
                        , lng: inputlng.value
                    , };
                }



                function addDragableMarker(map, behavior) {
                    let inputlat = document.getElementById("lat");
                    let inputlng = document.getElementById("lng");

                    if (inputlat.value != "" && inputlng.value != "") {
                        objLocalCoord = {
                            lat: inputlat.value
                            , lng: inputlng.value
                        , };
                    }

                    let marker = new H.map.Marker(objLocalCoord, {
                        volatility: true
                    , });

                    // marker.draggable = true;
                    map.addObject(marker);
                    map.setCenter(objLocalCoord);

                    map.addEventListener(
                        "dragstart"
                        , function(ev) {
                            let target = ev.target
                                , pointer = ev.currentPointer;

                            if (target instanceof H.map.Marker) {
                                let targetPosition = map.geoToScreen(
                                    target.getGeometry()
                                );
                                terget["offset"] = new H.math.Point(
                                    pointer.viewportX - targetPosition.x
                                    , pointer.viewportY - targetPosition.y
                                );
                                behavior.disable();
                            }
                        }
                        , false
                    );
                }


            });
        } else {
            console.error("Geolocatin not support thi browser");
        }

    </script>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/toastr.min.js') }}" type="text/javascript"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets/js/soft-design-system.min.js') }}" type="text/javascript"></script>
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

    </script>
    @if (Session::has('success'))
    <script>
        toastr.success("{{ Session('success') }}");

    </script>
    @endif
</body>

</html>
