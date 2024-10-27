
@include('user.layouts.header')


   
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"> <b>Welcome to your Portfolio</b></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- START: Card Data-->
        <div class="col-12 col-lg-12 col-xl-12 mt-3">
            <div class="card">
                <!-- Order Book Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview_orderbook"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-depth.js" async>
                    {
                        "symbol": "BINANCE:BTCUSDT",
                        "width": "100%",
                        "height": 490,
                        "colorTheme": "light",
                        "locale": "en"
                    }
                    </script>
                </div>
                <!-- Order Book Widget END -->
            </div>
        </div>
        
        
</main>
@include('user.layouts.footer')
