<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KOPI AWAN | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=" {{ asset('lte/plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
        .coordinate {
            position: absolute;
            bottom: 10px;
            right: 40%;
            font-family: Arial, Helvetica, sans-serif;
        }

        .jarak-bawah {
            margin-bottom: 50px;
        }

        .divider {
            width: 100%;
            height: 1px;
            background: #BBB;
            margin: 1rem 0;
        }

        .button-container .btn {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .button-container .btn:hover {
            background-color: #f7f7f7;
            color: #333;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini" style="font-family: poppins;">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    {{-- Barang --}}
                    @if (Request::is('barang'))
                        <strong><a href="{{ url('/barang') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>
                    @elseif (Request::is('create-barang'))
                        <strong><a href="{{ url('/create-barang') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>
                    @elseif (Request::is('edit-barang/*'))
                        <strong><a href="{{ url('/edit-barang/*') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>

                        {{-- Transaksi --}}
                    @elseif (Request::is('transaksi'))
                        <strong><a href="{{ url('/transaksi') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>
                    @elseif (Request::is('create-transaksi'))
                        <strong><a href="{{ url('/create-transaksi') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>
                    @elseif (Request::is('edit-transaksi/*'))
                        <strong><a href="{{ url('/edit-transaksi/*') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>
                    @elseif (Request::is('order'))
                        <strong><a href="{{ url('/order') }}"
                                class="nav-link">@yield('title')</a></strong></a></strong>
                    @endif
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}
                <!-- Perbesar / Perkecil -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link text-center" style="text-decoration: none">
                {{-- <img src="../lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text fw-bold">KOPI AWAN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link
                                {{-- Barang --}}
                            @if (Request::is('barang')) active
                            @elseif(Request::is('create-barang')) active 
                            @elseif(Request::is('edit-barang/*')) active 
                            {{-- Detail --}}    
                            @elseif(Request::is('order')) active 
                            @elseif(Request::is('transaksi')) active 
                            @elseif(Request::is('create-transaksi')) active 
                            @elseif(Request::is('edit-transaksi/*')) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Kopi Awan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                                        <i class="fas fa-compress nav-icon"></i>
                                        <p>Home</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/order" class="nav-link {{ Request::is('order') ? 'active' : '' }}">
                                        <i class="fas fa-money-check nav-icon"></i>
                                        <p>Toko</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/barang"
                                        class="nav-link {{ ((Request::is('barang') ? 'active' : '' || Request::is('create-barang')) ? 'active' : '' || Request::is('edit-barang/*')) ? 'active' : '' }}">
                                        <i class="fas fa-columns nav-icon"></i>
                                        <p>Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/transaksi"
                                        class="nav-link {{ (((Request::is('transaksi') ? 'active' : '' || Request::is('create-transaksi')) ? 'active' : '' || Request::is('edit-transaksi/*')) ? 'active' : '' || Request::is('transaksi')) ? 'active' : '' }}">
                                        <i class="fas fa-calculator nav-icon"></i>
                                        <p>Transaksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <strong>KOPI AWAN</strong> Version 2024.1
            </div>
            <!-- Default to the left -->
            Supported By <strong> <a href="#">Ihsan Zaky Fadillah</a></strong> |
            2024
        </footer>

        <!-- jQuery -->
        <script src=" {{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- Bootstrap 5 --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <!-- AdminLTE App -->
        <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
        {{-- Map --}}
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        {{-- J-Query --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        {{-- DataTable --}}
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
