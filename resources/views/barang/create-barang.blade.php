@extends('template.main-layout')
@section('title', 'Tambah Barang')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left ml-2">
                <a href="/barang" class="btn btn-md btn-primary ml-2"><i class="fas fa-arrow-alt-circle-left"></i>
                    Kembali</a>
            </ol>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Kopi Awan</a></li>
                <li class="breadcrumb-item"><a href="/barang">Barang</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline ">
                        <div class="card-header">
                            <h5 class="m-0">@yield('title')
                                {{-- <a href="{{ url('/create-bandung') }}" class="btn btn-md float-end"
                                    style="background-color: #F2F7A1"><i class="fas fa-plus-square"></i> Tambah Data</a>
                                <a href="{{ url('/exportexceldetailbandung') }}"
                                    class="btn btn-md btn-success float-end mr-1"><i class="fas fa-file-upload"></i> Export
                                    Excel</a> --}}
                            </h5>
                        </div>
                        <div class="card-body ">
                            <form action="{{ url('create-barang') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('nama_barang') is-invalid @enderror"
                                                placeholder="Masukkan Nama Barang" name="nama_barang" id="nama_barang"
                                                value="{{ old('nama_barang') }}">
                                            @error('nama_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file"
                                                class="form-control @error('gambar') is-invalid @enderror form-control-sm"
                                                name="gambar" id="gambar" value="{{ old('gambar') }}">
                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number"
                                                class="form-control form-control-sm @error('stock') is-invalid @enderror"
                                                name="stock" id="stock" placeholder="Masukan Stock Barang"
                                                value="{{ old('stock') }}">
                                            @error('stock')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_barang">Jenis Barang</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('jenis_barang') is-invalid @enderror"
                                                name="jenis_barang" id="jenis_barang" placeholder="Masukan Jenis Barang"
                                                value="{{ old('jenis_barang') }}">
                                            @error('jenis_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- J-Query --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>

@endsection
