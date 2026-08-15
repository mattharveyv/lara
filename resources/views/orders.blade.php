@extends('layouts.app')

@section('title', $title ?? 'Order History')

@section('styles')
<style>
    .history-box {
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        border-radius: 16px;
        padding: 1.5rem;
    }

    .order-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin-top: 1rem;
    }

    .order-row {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 0.5rem;
    }

    .order-product-list {
        margin-top: 0.75rem;
        padding-left: 1.2rem;
    }
</style>
@endsection

@section('content')
<h1 style="text-align:left; margin-bottom:1.5rem;">{{ $title }}</h1>

<div class="history-box">
    @if(empty($orders))
        <p>No orders yet. Buy a product to create your first order history.</p>
        <a href="/" class="btn">Shop Now</a>
    @else
        @foreach($orders as $order)
            <div class="order-card">
                <div class="order-row">
                    <strong>{{ $order['id'] ?? 'INV-00000000' }}</strong>
                    <span>{{ $order['status'] ?? 'Paid' }}</span>
                </div>
                <div class="order-row">
                    <span>Customer: {{ $order['customer'] ?? 'Customer' }}</span>
                    <span>{{ $order['payment'] ?? 'Cash on Delivery' }}</span>
                </div>
                <div class="order-row">
                    <span>Phone: {{ $order['phone'] ?? 'N/A' }}</span>
                    <span>Total: ${{ number_format($order['total'] ?? 0, 2) }}</span>
                </div>

                <ul class="order-product-list">
                    @foreach($order['items'] ?? [] as $item)
                        <li>{{ $item['name'] ?? 'Item' }} x {{ $item['quantity'] ?? 1 }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endif
</div>
@endsection
