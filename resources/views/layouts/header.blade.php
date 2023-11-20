<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset ('assets/img/favicon.png') }}">
    <title>
        Application Monitoring Audit
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset ('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset ('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset ('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset ('assets/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
    type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/datatables.css') }}">
    <link id="pagestyle" href="{{ asset ('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    @stack('style')
</head>
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ session('division') }} - {{ session('role') }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (session('role_id') == '2')
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Periode</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{Request::url() == route('show.supervisor.temuan.page') ? 'active' : ''}}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Otorisasi Temuan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-check-bold text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Otorisasi Tanggapan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Audit Trail</span>
                    </a>
                </li>
            @elseif (session('role_id') == '3')
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Periode</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{Request::url() == route('show.supervisor.temuan.page') ? 'active' : ''}}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Otorisasi Temuan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-check-bold text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Otorisasi Tanggapan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Audit Trail</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Periode</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{Request::url() == route('show.temuan.page') ? 'active' : ''}}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Otorisasi Temuan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-check-bold text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Otorisasi Tanggapan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Audit Trail</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                {{-- <h6 class="font-weight-bolder text-white mb-0"></h6> --}}
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center text-white">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">{{ session('name') }}</span>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route ('logout') }}" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-sign-out me-sm-1"></i>
                            <span class="d-sm-inline d-none">Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
