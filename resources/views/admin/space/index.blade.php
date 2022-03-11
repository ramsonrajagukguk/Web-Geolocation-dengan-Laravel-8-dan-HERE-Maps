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
                            <a href="{{ route('browse') }}" class="btn btn-info"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pt-0 pb-2">
                    <div class="row">
                        @foreach ($spaces as $space )
                        <div class="col-12 mx-auto">
                            <div class="row py-lg-7 py-5">
                                <div class="col-lg-3 col-md-5 position-relative my-auto">
                                    {{-- <img class="img border-radius-lg max-width-400 w-100 position-relative z-index-2" src="{{ Storage::url($space->photos->path) }}" alt="bruce"> --}}
                                </div>
                                <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mt-sm-0 mt-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="mb-0">{{ $space->title }}</h4>
                                        <div class="d-block">
                                            @if ($space->user_id == Auth::user()->id)
                                            <form action="{{ route('space.destroy',$space->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="Submit" class="btn btn-sm btn-outline-danger text-nowrap mb-0">Hapus</button>
                                                <a href="{{ route('space.edit',$space) }}" class="btn btn-sm btn-outline-info text-nowrap mb-0">Edit</a>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-4">
                                        <div class="col-auto">
                                            <span>Penulis</span>
                                            <span class="h6">{{ $space->user->name }}</span>
                                </div>
                            </div> --}}
                            <p>{{ $space->addres }}</p>

                            <blockquote>
                                {{ $space->description }}
                            </blockquote>
                            <a href="{{ route('space.show',$space) }}">Link Deskripsi</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                {{ $spaces->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $("#dataTable").DataTable({
        "responsive": true
        , "autoWidth": false
    , });

</script>
@endpush
