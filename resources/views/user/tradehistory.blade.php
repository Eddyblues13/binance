
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
                <div class="col-12 col-lg-12 col-xl-12 mt-3">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-body p-4">
                            <!-- Trade History Card -->
                            <div class="card card-primary card-outline border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <!-- Trade History Header -->
                                    <h4 class="text-center font-weight-bold mb-3">Trade History</h4>
                                    <hr class="my-3">
        
                                    <!-- Trade History Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Pair</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.5 BTC</td>
                                                    <td>Buy</td>
                                                    <td>2024-10-26</td>
                                                    <td>BTC/USD</td>
                                                </tr>
                                                <tr>
                                                    <td>0.75 ETH</td>
                                                    <td>Sell</td>
                                                    <td>2024-10-25</td>
                                                    <td>ETH/USD</td>
                                                </tr>
                                                <!-- Add more trade records as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- CSS for Trade History Table -->
            <style>
                .table thead th {
                    background-color: #007bff;
                    color: white;
                    text-align: center;
                }
        
                .table tbody tr td {
                    text-align: center;
                    vertical-align: middle;
                }
        
                .card-body {
                    padding: 20px;
                }
        
                .font-weight-bold {
                    font-size: 1rem;
                }
        
                hr {
                    border-top: 1px solid #e0e0e0;
                }
            </style>
        </div>
        
</main>
@include('user.layouts.footer')
