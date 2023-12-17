@extends('app')
@section('content')
<div class="container-fluid py-4 min-vh-75">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Dashboard Page Supervisor</h5>
                        </div>
                        <div class="col-12 my-4">
                            <div class="row">
                                @for ($i = 0; $i < 4; $i++)
                                <div class="col-12 col-lg-3">
                                    <div class="card rounded-4 shadow">
                                        <div class="card-body">
                                            <h5>Test</h5>
                                        </div>
                                    </div>
                                </div>
                                @endfor
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
        $('#table-dashboard-supervisor').DataTable({
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