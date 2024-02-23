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
            <div class="dropdown mt-2">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                        class="badge bg-danger">{{ count((array) session('barang')) }}</span>
                </button>
                <ul class="dropdown-menu" style="width: 23rem" aria-labelledby="dropdownMenuButton">
                    <li class="fw-bold">
                        <div class="row">
                            @php $total = 0 @endphp
                            @foreach ((array) session('barang') as $id => $details)
                                @php $total += $details['quantity'] @endphp
                            @endforeach

                            <p class="ms-3">Total: <span class="text-info">{{ $total }}</span></p>
                        </div>
                    </li>
                    @if (session('barang'))
                        @foreach (session('barang') as $id => $details)
                            <li class="ms-3 fw-bold">
                                <div class="row">
                                    <p style="margin-bottom: -1px">{{ $details['nama_barang'] }}</p>
                                    <div class="rounded-xl ">
                                        <img class="bg-fixed shadow-xl rounded-lg overflow-hidden border"
                                            src="{{ url('images') }}/{{ $details['gambar'] }}">
                                    </div>
                                    <div class="mb-3">
                                        <span class="fw-bold text-red-500">Stock:
                                            {{ $details['stock'] - $details['quantity'] }}</span>
                                        <span>Quantity:
                                            {{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    <li>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-block btn-sm">View All</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($barang as $item)
                <div class="col-md-4 mt-3">
                    <div class="card rounded-3 shadow-lg h-full">
                        <img src="{{ url('images') }}/{{ $item->gambar }}" class="card-img-top h-80 object-cover"
                            style="width: auto">
                        <div class="card-body flex flex-col justify-between">
                            <h5 class="card-title">{{ $item->nama_barang }}</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis earum quas alias
                                aliquam nulla dicta delectus sapiente culpa rerum explicabo?
                                <br><strong>Stok : {{ $item->stock }}</strong>
                            </p>
                            <a href="{{ route('addToCart', $item->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-shopping-cart"></i>
                                Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
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
