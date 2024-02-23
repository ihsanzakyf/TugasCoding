<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Toko Kopi Awan</title>
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container">
            <a class="navbar-brand text-zinc-300 text-2xl" href="#">Kopi Awan</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Stock</th>
                        <th>Jenis barang</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if (session('barang'))
                        @foreach (session('barang') as $id => $details)
                            @php $total += $details['quantity'] @endphp
                            <tr data-th="{{ $id }}">
                                <td data-th="Nama Barang">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <div class="col-sm-9">
                                                <h4>{{ $details['nama_barang'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Gambar">
                                    <div class="text-center">
                                        <img class="shadow-lg rounded-lg mx-auto"
                                            src="{{ url('images') }}/{{ $details['gambar'] }}" alt=""
                                            style="max-width: 100%;">
                                    </div>
                                </td>
                                <td data-th="Stock">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control"
                                        min="1">
                                </td>
                                <td data-th="Jenis Barang">
                                    <input type="text" value="{{ $details['jenis_barang'] }}" class="form-control"
                                        min="1">
                                </td>
                                <td data-th="Total" class="text-center">{{ $details['quantity'] }}</td>
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
