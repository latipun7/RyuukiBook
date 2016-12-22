@extends('layouts.dashboard')

@section('report', 'active')
@section('nav_title', 'Transactions Report Detail')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Transactions Report</h4>
            <p class="category">Transaction detail from {{ $from }} to {{ $to }}.</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table">
                <thead class="text-primary">
                	<th>Invoice</th>
                    <th>Buyer Name</th>
                	<th>Book Title</th>
                	<th class="text-right">Book Price</th>
                    <th class="text-right">Qty</th>
                    <th>Purchased</th>
                </thead>
                <tbody>
                    @foreach( $transaction as $trans )
                        <tr>
                            <td><a href="{{ route('report.invoice', $trans->order->invoice) }}">{{ $trans->order->invoice }}</a></td>
                            <td>{{ $trans->order->user->name }}</td>
                            <td>{{ $trans->book->title }}</td>
                            <td class="text-right">{{ "Rp ".number_format($trans->book->price,2, ',', '.') }}</td>
                            <td class="text-right">{{ $trans->qty }}</td>
                            <td>{{ $trans->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card"><div class="card-content text-center">{!! $transaction->links() !!}</div></div>
</div>
@endsection
