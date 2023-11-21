@extends('app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Edit Otorisasi Temuan</h4>
                        </div>
                        <div class="col-12 my-5">
                          <form action="{{ route ('update.temuan.operator', ['id' => $temuan->id]) }}" method="POST">
                           @csrf
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="object_pemeriksaan" class="form-control-label">Object Pemeriksaan</label>
                                  <input type="text" class="form-control" id="object_pemeriksaan" name="object_pemeriksaan" value="{{ $temuan->object_pemeriksaan }}" placeholder="Object Pemeriksaan">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="jenis_audit" class="form-control-label">Kredit Cabang</label>
                                  <input type="text" class="form-control" id="jenis_audit" name="jenis_audit" value="{{ $temuan->jenis_audit }}" placeholder="Jenis Audit">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="auditor" class="form-control-label">Auditor</label>
                                  <input type="text" class="form-control" id="auditor" name="auditor" value="{{ $temuan->auditor }}" placeholder="Auditor">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="risk" class="form-control-label">Risk</label>
                                  <input type="text" class="form-control" id="risk" name="risk" value="{{ $temuan->risk }}" placeholder="Risk">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="issue_summary" class="form-control-label">Issue Summary</label>
                                  <textarea class="form-control" name="issue_summary" id="issue_summary" cols="20" rows="5">{{ $temuan->issue_summary }}</textarea>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="issue_detail" class="form-control-label">Risk</label>
                                  <textarea class="form-control" name="issue_detail" id="issue_detail" cols="20" rows="5">{{ $temuan->issue_detail }}</textarea>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="recomendation" class="form-control-label">Recommendation</label>
                                  <textarea class="form-control" name="recomendation" id="recomendation" cols="20" rows="5">{{ $temuan->recomendation }}</textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="corrective_action_plan" class="form-control-label">Corrective Action Plan</label>
                                  <input type="text" class="form-control" id="corrective_action_plan" name="corrective_action_plan" value="{{ $temuan->corrective_action_plan }}" placeholder="Corrective Action Plan">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update Temuan</button>
                              </div>
                            </div>
                          </form>
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


@push('scripts')
  <script>
      $(document).ready(function () {
        $('#table-temuan-operator').DataTable({
            responsive: true,
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, 'All'],
            ],
            order: [[0, 'asc']],
        });

        $('.btn-import-excel-file').on('click', function() {
            $('#importexcel-Modal').modal('show');
        });
    });
  </script>
@endpush
@endsection
