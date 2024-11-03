@include('user.layouts.header')
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


<div class="container mt-5">
    <div class="row mt-5" style="margin-top: 20px;">
        <div class="col-12 text-center" style="margin: 10px;">
            <h2>Select Deposit Method</h2>
            <p>Choose a cryptocurrency method to make your deposit</p>
        </div>
    </div>


    <div class="row">


        @foreach ($cryptos as $crypto)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card crypto-card">
                <center><img src="{{ asset('dist/images/cryptos/' . $crypto['image']) }}"
                        alt="{{ $crypto['name'] }} logo" class="crypto-img mb-3"> </center>
                <h5>{{ $crypto['name'] }}</h5>
                <form action="{{ route('handle.deposit',$crypto['id']) }}" method="POST">
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
@include('user.layouts.footer')