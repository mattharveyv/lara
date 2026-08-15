@extends('layouts.app')

@section('title', $title ?? 'Dashboard')

@section('styles')
<style>
    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .user-badge {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.7rem 1rem;
        border-radius: 999px;
        font-weight: 600;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .product-box {
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        padding: 1.5rem;
    }

    .product-box h3 {
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .price-tag {
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0.75rem 0;
    }

    .checkout-form {
        margin-top: 2rem;
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        padding: 1.5rem;
    }

    .checkout-form h2 {
        margin-top: 0;
    }

    .checkout-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1rem;
    }

    .checkout-grid input,
    .checkout-grid select,
    .checkout-grid textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
    }

    .checkout-actions {
        margin-top: 1rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
</style>
@endsection

@section('content')
<div class="topbar">
    <div>
        <h1 style="text-align:left; margin:0;">{{ $title }}</h1>
        <p style="margin-top:0.5rem;">Welcome back, {{ $customer['name'] ?? 'Customer' }}.</p>
    </div>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="btn btn-secondary">Logout</button>
    </form>
</div>

<div class="user-badge">Status: {{ $customer['status'] ?? 'Active' }}</div>

<div class="dashboard-grid">
    @foreach($products as $product)
        <div class="product-box">
            <div style="font-size:2.5rem; margin-bottom:0.75rem;">{{ $product['icon'] }}</div>
            <h3>{{ $product['name'] }}</h3>
            <p>High-quality product for everyday use.</p>
            <div class="price-tag">${{ $product['price'] }}</div>
        </div>
    @endforeach
</div>

<div class="checkout-form">
    <h2>Order Now</h2>
    <form method="POST" action="/checkout">
        @csrf

        <div class="checkout-grid">
            <div>
                <label for="product">Product</label>
                <select id="product" name="product" required>
                    <option value="Wireless Headphones">Wireless Headphones</option>
                    <option value="Smart Watch">Smart Watch</option>
                    <option value="Smartphone">Smartphone</option>
                    <option value="Laptop">Laptop</option>
                </select>
            </div>

            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required>
            </div>

            <div>
                <label for="payment">Mode of Payment</label>
                <select id="payment" name="payment" required>
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>

            <div>
                <label for="name">Customer Name</label>
                <input type="text" id="name" name="name" value="{{ $customer['name'] ?? 'Customer' }}" required>
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="address">Delivery Address</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter delivery address"></textarea>
            </div>
        </div>

        <div class="checkout-actions">
            <button type="submit" class="btn">Place Order</button>
            <a href="/home" class="btn btn-secondary">Back to Home</a>
        </div>
    </form>
</div>
@endsection
