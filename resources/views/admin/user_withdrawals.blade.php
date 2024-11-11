@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">User Withdrawal History</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-hover text-dark">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Method</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                        <tr>
                            <td>{{ $withdrawal->transaction_id }}</td>
                            <td>{{ $withdrawal->method }}</td>
                            <td>{{ $withdrawal->account_name }}</td>
                            <td>{{ $withdrawal->account_number }}</td>
                            <td>{{ number_format($withdrawal->amount, 2) }}</td>
                            <td>{{ ucfirst($withdrawal->status) }}</td>
                            <td>{{ $withdrawal->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')