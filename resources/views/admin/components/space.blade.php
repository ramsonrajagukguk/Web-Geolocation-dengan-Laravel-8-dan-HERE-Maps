<div class="card mb-4">
  <div class="card-header pb-0">
    <div class="d-flex justify-content-between mb-3">
      <div id="create-space">
        <a href="{{ route('space.create') }}" class="btn btn-primary">Pin</a>
      </div>
      <div id="view-space">
        <a href="" class="btn btn-secondary"><i class="fas fa-list"></i></a>
        <a href="" class="btn btn-info"><i class="fas fa-globe"></i></a>
      </div>
    </div>
  </div>
  <div class="card-body px-3 pt-0 pb-2">
    <div class="table-responsive p-0">
      <table id="dataTable" class="table align-items-center p-3 mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
            <th class="text-secondary opacity-7">Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>