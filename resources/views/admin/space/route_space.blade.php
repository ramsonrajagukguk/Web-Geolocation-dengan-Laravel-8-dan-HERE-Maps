@extends('admin.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between mb-3">
                        <div id="create-space">
                            <a href="{{ route('space.create') }}" class="btn btn-primary">Pin</a>
                        </div>
                        <div id="view-space">
                            <a href="{{ route('space.index') }}" class="btn btn-secondary"><i class="fas fa-list"></i></a>
                            <a href="" class="btn btn-info"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pt-0 pb-2">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-xl-0 mt-4 mb-5">
                            <div class="card card-blog card-plain">
                                <div id="here-maps" class="form-group">
                                    <label class="form-control-label">{{ __('Route Direction') }}</label>
                                    <div style="width: 100%; height: 500px" id="mapContainer"></div>
                                </div>

                                <div class="d-flex justify-content-center mb-4">
                                    <img src="{{ Storage::url($space->photoutama) }}" alt="img-blur-shadow" style="width: 500px" class="img-fluid shadow border-radius-xl">
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                @foreach($space->photos as $key => $photo )
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                                                @endforeach

                                            </div>
                                            <div class="carousel-inner">
                                                @foreach ($space->photos as $key => $photo )
                                                <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ Storage::url($photo->path) }}" alt="img-blur-shadow" class="img-fluid shadow w-100 border-radius-xl">
                                                </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body px-1 pb-0">
                                    <h6>{{ $space->title }}</h6>
                                    <p class="text-gradient text-dark mb-2 text-sm">
                                        {{ $space->addres}}</p>
                                    <p class="text-gradient text-dark mb-2 text-sm">
                                        {{ $space->description }}</p>
                                </div>
                                <div id="summary"></div>
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
        window.action = "direction"

    </script>
    @endpush
