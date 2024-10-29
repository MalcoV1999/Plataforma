@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="point_id">Point</label>
            <select name="point_id" id="point_id" class="form-control">
                @foreach ($points as $point)
                    <option value="{{ $point->id }}">{{ $point->amount }} points</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount_used">Amount Used</label>
            <input type="number" name="amount_used" id="amount_used" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Transaction</button>
    </form>
</div>
@endsection
