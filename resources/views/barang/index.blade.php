@extends('template.main-layout')
@section('title', 'Barang')
@section('content')
    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if ($storebarang = Session::get('storebarang'))
        <script>
            Swal.fire({
                title: 'Tambah Data Berhasil!',
                text: '{{ session('storebarang') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2500,
                timerProgressBar: true
            });
        </script>
    @elseif ($updatebarang = Session::get('updatebarang'))
        <script>
            Swal.fire({
                title: 'Update Data Berhasil!',
                text: '{{ session('updatebarang') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2500,
                timerProgressBar: true
            });
        </script>
    @elseif ($deletebarang = Session::get('deletebarang'))
        <script>
            Swal.fire({
                title: 'Hapus Data Berhasil!',
                text: '{{ session('deletebarang') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2500,
                timerProgressBar: true
            });
        </script>
    @endif
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Kopi Awan</a></li>
                <li class="breadcrumb-item active">Barang</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_Barang }}</h3>
                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning text-white">
                <div class="inner">
                    <h3>{{ $total_Stock }}</h3>
                    {{-- <sup style="font-size: 20px">%</sup> --}}
                    <p>Total All Stock</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_Barang_Terjual }}</h3>
                    <p>Total Barang Terjual</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_Transaksi }}</h3>
                    <p>Banyak Transaksi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">



                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="my-auto">Tabel Barang
                                <a href="{{ url('/create-barang') }}" class="float-end btn btn-sm btn-primary"><i
                                        class="fas fa-plus"></i>
                                    Tambah Barang</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="text-center table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Jenis Barang</th>
                                            <th>Gambar</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->jenis_barang }}</td>
                                                <td>
                                                    @if ($item->gambar)
                                                        <img src="{{ url('images') . '/' . $item->gambar }}"
                                                            style="max-width: 90px; max-height: 70px"
                                                            class="shadow-lg rounded-3">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/edit-barang/{{ $item->id }}"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="/barang-destroy/{{ $item->id }}" method="POST"
                                                        class="delete-form">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger mt-2"><i
                                                                class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            {{-- SweetAlert --}}
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            {{-- DataTable --}}
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#datatables').DataTable()
                });

                document.querySelectorAll('.delete-form').forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            html: 'Data ini akan diakan dihapus!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Jika pengguna mengklik "Ya, hapus!", submit form secara manual
                                this.submit();
                            }
                        });
                    });
                });
            </script>
        @endsection
