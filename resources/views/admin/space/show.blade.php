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
                                <div class="d-flex justify-content-between">
                                    @foreach ($space->photos as $photo )
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="{{ Storage::url($photo->path) }}" alt="img-blur-shadow" style="width: 250px" class="img-fluid shadow border-radius-xl">
                                    </a>
                                    @endforeach
                                </div>

                                <div class="card-body px-1 pb-0">

                                    <h6>{{ $space->title }}</h6>

                                    <p class="text-gradient text-dark mb-2 text-sm">
                                        {{ $space->addres}}</p>
                                    <p class="text-gradient text-dark mb-2 text-sm">
                                        {{ $space->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endsection
