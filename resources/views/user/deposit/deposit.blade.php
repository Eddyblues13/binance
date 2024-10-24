<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Deposit | User Panel</title>
    <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .crypto-img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .crypto-card {
            text-align: center;
            padding: 20px;
        }

        .deposit-btn {
            margin-top: 10px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
        }

        .deposit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Select Deposit Method</h2>
                <p>Choose a cryptocurrency method to make your deposit</p>
            </div>
        </div>

        <div class="row">
            @php
            $cryptos = [
            ['name' => 'Bitcoin', 'image' => 'bitcoin.png'],
            ['name' => 'Ethereum', 'image' => 'ethereum.png'],
            ['name' => 'Litecoin', 'image' => 'litecoin.png'],
            ['name' => 'Ripple', 'image' => 'ripple.png'],
            ['name' => 'Tether (USDT)', 'image' => 'tether.png'],
            ['name' => 'Binance Coin', 'image' => 'binancecoin.png'],
            ['name' => 'Cardano', 'image' => 'cardano.png'],
            ['name' => 'Dogecoin', 'image' => 'dogecoin.png'],
            ['name' => 'Polkadot', 'image' => 'polkadot.png'],
            ['name' => 'Solana', 'image' => 'solana.png'],
            ];
            @endphp

            @foreach ($cryptos as $crypto)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card crypto-card">
                    <img src="{{ asset('dist/images/cryptos/' . $crypto['image']) }}" alt="{{ $crypto['name'] }} logo"
                        class="crypto-img mb-3">
                    <h5>{{ $crypto['name'] }}</h5>
                    <form action="{{ route('deposit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="crypto_method" value="{{ $crypto['name'] }}">
                        <button type="submit" class="btn deposit-btn">Deposit with {{ $crypto['name'] }}</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>