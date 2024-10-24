@include('user.layouts.header')


<div class="container" style="margin-top: 80px;">
    <!-- Added manual margin-top of 80px -->
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Withdraw Cryptocurrency</h2>
        <form action="{{ route('withdrawals.confirm') }}" method="POST">
            @csrf
            <!-- Select Withdrawal Cryptocurrency -->
            <div class="form-group mb-3">
                <label for="crypto" class="form-label">Select Cryptocurrency</label>
                <select class="form-control" id="crypto" name="crypto">
                    <option value="Bitcoin">Bitcoin (BTC)</option>
                    <option value="Ethereum">Ethereum (ETH)</option>
                    <option value="Litecoin">Litecoin (LTC)</option>
                    <option value="USDT">Tether (USDT)</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <!-- Wallet Address -->
            <div class="form-group mb-3">
                <label for="wallet" class="form-label">Wallet Address</label>
                <input type="text" class="form-control" id="wallet" name="wallet"
                    placeholder="Enter your wallet address" required>
            </div>

            <!-- Withdrawal Amount -->
            <div class="form-group mb-4">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit Withdrawal Request</button>
            </div>
        </form>
    </div>
</div>


@include('user.layouts.footer')