@extends('app')
@section('content')
<div class="container-fluid py-4 min-vh-75">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Audit Page Supervisor</h5>
                        </div>
                        <div class="col-12">
                            <div class="col-12 my-3" style="width:100%">
                                <div class="table-responsive">
                                  <table class="table table-striped " id="table-audit-supervisor">
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
                                        @for ($i = 0; $i < 10; $i++)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endfor
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
        $('#table-audit-supervisor').DataTable({
            responsive: true,
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, 'All'],
            ],
            order: [[0, 'asc']],
        });
    });
  </script>
@endpush