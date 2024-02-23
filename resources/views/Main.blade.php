<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">\
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Toko Kopi Awan</title>
</head>

<body class="d-flex align-items-center justify-content-center"
    style="min-height: 100vh; background-image: url({{ asset('images/bg.avif') }}); background-size: cover;">

    <div class="container">
        <div class="col-md-12 text-center mb-[100px]"> <!-- Menambahkan mb-4 dan mt-5 -->
            <h3 class="text-4xl fw-bold text-neutral-500 shadow-lg rounded-xl w-50 mx-auto py-3">SELAMAT DATANG</h3>
        </div>
        <div class="row justify-content-center mb-[300px]">
            <div class="col-md-4">
                <div class="card">
                    <a href="/order" class="card-body text-center bg-lime-300 rounded-md shadow-lg overflow-hidden hover:bg-lime-500 focus:ring-1 duration-300 focus:ring-lime-700 focus:border-lime-700 active:bg-lime-900">
                        <h5 class="card-title text-2xl">Toko</h5>
                        <i class="fas fa-store" style="font-size: 4em;"></i>
                        <p class="card-text text-xl mt-1">Lanjutkan Kehalaman Toko.</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <a href="/barang" class="card">
                    <div class="card-body text-center bg-sky-300 rounded-md shadow-lg overflow-hidden hover:bg-sky-500 focus:ring-1 duration-300 focus:ring-sky-700 focus:border-sky-700 active:bg-sky-900">
                        <h5 class="card-title text-2xl">Barang</h5>
                        <i class="fas fa-th" style="font-size: 4em;"></i>
                        <p class="card-text text-xl mt-1">Lanjutkan Kehalaman Barang.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/transaksi" class="card">
                    <div class="card-body text-center bg-fuchsia-300 rounded-md shadow-lg overflow-hidden hover:bg-fuchsia-500 focus:ring-1 duration-300 focus:ring-fuchsia-700 focus:border-fuchsia-700 active:bg-fuchsia-900">
                        <h5 class="card-title text-2xl">Transaksi</h5>
                        <i class="fas fa-money-bill-wave-alt" style="font-size: 4em;"></i>
                        <p class="card-text text-xl mt-1">Lanjutkan Kehalaman Transaksi.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
