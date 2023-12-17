@extends('app')
@section('content')
<div class="container-fluid py-4 min-vh-75">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Temuan Page Supervisor</h5>
                        </div>
                        <div class="col-12">
                            <div class="col-12 my-3" style="width:100%">
                                <div class="table-responsive">
                                  <table class="table table-striped " id="table-temuan-supervisor">
                                    <thead class="table-orange">
                                        <tr>
                                            <th>No</th>
                                            <th>Object Pemeriksaan</th>
                                            <th>Jenis Audit</th>
                                            <th>Auditor</th>
                                            <th>Risk</th>
                                            <th>Issue Summary</th>
                                            <th>Issue Detail</th>
                                            <th>Recomendation</th>
                                            <th>Corective Action Plan</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($temuan as $item)                                    
                                        <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $item->object_pemeriksaan }}</td>
                                          <td>{{ $item->jenis_audit }}</td>
                                          <td>{{ $item->auditor }}</td>
                                          <td>{{ $item->risk }}</td>
                                          <td>{{ $item->issue_summary }}</td>
                                          <td>{{ $item->issue_detail }}</td>
                                          <td>{{ $item->recomendation }}</td>
                                          <td>{{ $item->corrective_action_plan }}</td>
                                          <td>{{ $item->status }}</td>
                                          <td>
                                            <div class="d-grid gap-2 d-md-block">
                                              <a href="{{ route ('update.status.temuan.supervisor', ['id' => $item->id]) }}" class="btn btn-success btn-approved-temuan {{ $item->status == 2 || $item->status == 4 ? 'disabled' : '' }}" type="button">Approved</a>
                                              <a href="{{ route ('supervisor.edit.temuan.page', ['id' => $item->id]) }}" class="btn btn-warning {{ $item->status == 2 || $item->status == 4 ? 'disabled' : '' }}">Edit</a>
                                              <a href="{{ route ('delete.temuan.supervisor', ['id' => $item->id]) }}" class="btn btn-danger btn-delete-temuan {{ $item->status == 2 || $item->status == 4 ? 'disabled' : '' }}">Delete</a>
                                            </div>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())

                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Rayhan yuda
                        lesmana</a>
                </div>
            </div>
        </div>
        </div>
</footer>
</div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function () {
        $('#table-temuan-supervisor').DataTable({
            responsive: true,
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, 'All'],
            ],
            order: [[0, 'asc']],
        });
    });

    $(document).on('click', '.btn-approved-temuan', function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        Swal.fire({
            title: 'Update Status Temuan',
            text: "You won't be able to revert this!",
            icon: 'warning',
            toast: true,
            position: 'top-end',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Update'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'warning',
                    title: 'The item is being updated',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: function (toast) {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                }).then(() => {
                    window.location.href = href;
                });
            }
        });
    });

    $(document).on('click', '.btn-delete-temuan', function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        Swal.fire({
            title: 'Delete Temuan',
            text: "You won't be able to revert this!",
            icon: 'warning',
            toast: true,
            position: 'top-end',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'warning',
                    title: 'The item is being deleted',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: function (toast) {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                }).then(() => {
                    window.location.href = href;
                });
            }
        });
    });
  </script>
@endpush