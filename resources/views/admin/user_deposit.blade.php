@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Deposit History</h1>
            </div>

            <div class="mb-5 row">
                <div class="col-md-12 shadow card p-4 bg-light">
                    <div class="table-responsive">
                        <table class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>Deposit Type</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Status</th>
                                    <th>Proof</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposits as $deposit)
                                <tr>
                                    <td>{{ $deposit->deposit_type }}</td>
                                    <td>{{ $deposit->amount }}</td>
                                    <td>{{ $deposit->payment_mode }}</td>
                                    <td>{{ $deposit->status }}</td>
                                    <td>
                                        @if($deposit->proof)
                                        <a href="{{ asset($deposit->proof) }}" target="_blank">View Proof</a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.deposits.approve', $deposit->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Are you sure you want to approve this deposit?')">Approve</button>
                                        </form>

                                        <form action="{{ route('admin.deposits.reject', $deposit->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to reject this deposit?')">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $deposits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')