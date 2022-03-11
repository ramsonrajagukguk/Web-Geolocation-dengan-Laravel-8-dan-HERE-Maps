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
                                <div style="height: 500px" id="mapContainer"></div>
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
        window.action = "browse"

    </script>
    @endpush
