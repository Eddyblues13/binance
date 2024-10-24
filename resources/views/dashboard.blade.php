<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binance Live Trading</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #1c1c1c;
            color: white;
        }

        .sidebar {
            width: 250px;
            background: #232323;
            position: fixed;
            height: 100%;
            padding: 20px;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .table {
            width: 100%;
            background-color: #2c2c2c;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Binance</h2>
        <ul>
            <li><a href="#">Board</a></li>
            <li><a href="#">Order Book</a></li>
            <li><a href="#">Market</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">News</a></li>
        </ul>
    </div>

    <div class="content">
        <h3>BINANCE: ETH/BTC</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Symbol</th>
                    <th>Last Price</th>
                    <th>Change (%)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamic data goes here -->
                @foreach($tickers as $ticker)
                <tr>
                    <td>{{ $ticker['symbol'] }}</td>
                    <td>{{ $ticker['lastPrice'] }}</td>
                    <td>{{ $ticker['priceChangePercent'] }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>