@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transactions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Point ID</th>
                <th>Product ID</th>
                <th>Amount Used</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->point_id }}</td>
                    <td>{{ $transaction->product_id }}</td>
                    <td>{{ $transaction->amount_used }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
