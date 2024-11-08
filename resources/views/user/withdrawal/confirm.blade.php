<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bitcoin Deposit | User Panel</title>
    <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">

    <div class="container mt-5">
        <div class="card shadow-lg p-5">
            <h2 class="text-center mb-4">Withdrawal Confirmation</h2>

            <div class="alert alert-success text-center">
                <h4>Your withdrawal request has been received!</h4>
            </div>

            <!-- Transaction Details -->
            <div class="receipt border p-4 rounded">
                <h5 class="text-center mb-4">Withdrawal Receipt</h5>
                <div class="row mb-3">
                    <div class="col-md-6"><strong>Transaction ID:</strong></div>
                    <div class="col-md-6">{{ $transactionId }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><strong>Cryptocurrency:</strong></div>
                    <div class="col-md-6">{{ $crypto }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><strong>Wallet Address:</strong></div>
                    <div class="col-md-6">{{ $wallet }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><strong>Amount:</strong></div>
                    <div class="col-md-6">${{ number_format($amount, 2) }}</div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary" onclick="window.print()">Print Receipt</button>
                    <a href="{{ route('user.withdrawals.create') }}" class="btn btn-secondary">Make Another Withdrawal</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>