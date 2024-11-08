@include('user.layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        /* Centering wrapper */
        .center-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        /* Main container */
        .container {
            text-align: center;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        /* Text styles */
        .total-label {
            font-size: 14px;
            color: #888;
            margin-bottom: 5px;
        }
        .total-amount {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
 /* Coinbase button */
 .coinbase-button {
            width: 100%;
            padding: 15px;
            margin: 20px 0;
            background-color: #0052ff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .coinbase-button:hover {
            background-color: #0041cc;
        }
        .coinbase-button:hover {
            background-color: #0041cc;
        }
        /* Cryptocurrency selection styles */
        .crypto-selection {
            font-size: 14px;
            color: #888;
            margin: 20px 0 10px;
        }
        .crypto-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }
        .crypto-option:hover {
            background-color: #f0f0f0;
        }
        .crypto-option img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }
        .crypto-option span {
            font-size: 16px;
            color: #333;
        }
        /* Hidden crypto details */
        .crypto-details {
            display: none;
            margin-top: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: left;
        }
        .crypto-details p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
        .crypto-details img {
            width: 100px;
            height: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="center-wrapper">
    <div class="container">
        <!-- Total Amount -->
        <div class="total-label">Total</div>
        <p class="total-amount">@if(session('amount')) {{ session('amount') }} @endif</p>

        <br>
        <!-- Coinbase Payment Button -->
        <a href="https://www.coinbase.com/" class="coinbase-button">Pay With Coinbase</a>

        <!-- Cryptocurrency Selection -->
        <div class="crypto-selection">Or, select a cryptocurrency</div>

        <!-- Cryptocurrency Options -->
        <div class="crypto-option" onclick="toggleCryptoDetails('bitcoin')">
            <div style="display: flex; align-items: center;">
                <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin">
                <span>Bitcoin</span>
            </div>
            <span>+</span>
        </div>
        <div id="crypto-details-bitcoin" class="crypto-details">
            <p><strong>Bitcoin Address:</strong> </p>
            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" alt="Bitcoin QR Code">
        </div>

        <div class="crypto-option" onclick="toggleCryptoDetails('ethereum')">
            <div style="display: flex; align-items: center;">
                <img src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt="Ethereum">
                <span>Ethereum</span>
            </div>
            <span>+</span>
        </div>
        <div id="crypto-details-ethereum" class="crypto-details">
            <p><strong>Ethereum Address:</strong> 0x32Be343B94f860124dC4fEe278FDCBD38C102D88</p>
            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=0x32Be343B94f860124dC4fEe278FDCBD38C102D88" alt="Ethereum QR Code">
        </div>

        <div class="crypto-option" onclick="toggleCryptoDetails('usdt')">
            <div style="display: flex; align-items: center;">
                <img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="USDT">
                <span>USDT (Tether)</span>
            </div>
            <span>+</span>
        </div>
        <div id="crypto-details-usdt" class="crypto-details">
            <p><strong>Tether (USDT) Address:</strong> TFL5SLmv7DivfNa1A1zP1eP5QGefi2DMPTf</p>
            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=TFL5SLmv7DivfNa1A1zP1eP5QGefi2DMPTf" alt="USDT QR Code">
        </div>

        <div class="crypto-option" onclick="toggleCryptoDetails('ripple')">
            <div style="display: flex; align-items: center;">
                <img src="https://cryptologos.cc/logos/xrp-xrp-logo.png" alt="Ripple">
                <span>Ripple (XRP)</span>
            </div>
            <span>+</span>
        </div>
        <div id="crypto-details-ripple" class="crypto-details">
            <p><strong>Ripple (XRP) Address:</strong> rDsbeomae4FXwgQTJp9Rs64Qg9vDiTCdBv</p>
            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=rDsbeomae4FXwgQTJp9Rs64Qg9vDiTCdBv" alt="Ripple QR Code">
        </div>

        <div class="crypto-option" onclick="toggleCryptoDetails('cardano')">
            <div style="display: flex; align-items: center;">
                <img src="https://cryptologos.cc/logos/cardano-ada-logo.png" alt="Cardano">
                <span>Cardano (ADA)</span>
            </div>
            <span>+</span>
        </div>
        <div id="crypto-details-cardano" class="crypto-details">
            <p><strong>Cardano (ADA) Address:</strong> addr1qypqgdcrml79jcf9lsfzphk4h5h3zqc4g34szq4p93ylvydg0jm8j</p>
            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=addr1qypqgdcrml79jcf9lsfzphk4h5h3zqc4g34szq4p93ylvydg0jm8j" alt="Cardano QR Code">
        </div>

    </div>
</div>

<script>
    // Function to toggle the visibility of cryptocurrency details
    function toggleCryptoDetails(crypto) {
        const details = document.getElementById('crypto-details-' + crypto);
        
        // Hide other crypto details
        document.querySelectorAll('.crypto-details').forEach(function(el) {
            if (el !== details) el.style.display = 'none';
        });
        
        // Toggle the selected crypto details
        details.style.display = details.style.display === 'block' ? 'none' : 'block';
    }
</script>

</body>
</html>


@include('user.layouts.footer')