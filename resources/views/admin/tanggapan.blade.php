@extends('app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Otorisasi Tanggapan</h4>
                        </div>
                        <div class="col-12 my-3">
                            <form>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input type="text" placeholder="Regular" class="form-control" disabled />
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" placeholder="Search" type="text">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group mb-4">
                                        <input class="form-control" placeholder="Birthday" type="text">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group has-success">
                                      <input type="text" placeholder="Success" class="form-control is-valid" />
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group has-danger">
                                      <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                                    </div>
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
@endsection
