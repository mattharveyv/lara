@extends('layouts.app')

@section('title', $title ?? 'Your Cart')

@section('styles')
<style>
    .cart-layout {
        display: grid;
        grid-template-columns: 1.4fr 0.8fr;
        gap: 2rem;
    }

    .cart-items,
    .summary-box {
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        border-radius: 16px;
        padding: 1.5rem;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin: 0.9rem 0;
    }

    .checkout-form input,
    .checkout-form select,
    .checkout-form textarea {
        width: 100%;
        padding: 0.75rem;
        margin-top: 0.4rem;
        margin-bottom: 1rem;
        border: 2px solid #ddd;
        border-radius: 8px;
    }

    .checkout-form label {
        font-weight: 600;
        color: #667eea;
    }

    @media (max-width: 768px) {
        .cart-layout {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<h1 style="text-align:left; margin-bottom:1.5rem;">{{ $title }}</h1>

<div class="cart-layout">
    <div class="cart-items">
        @if(empty($items))
            <p>Your cart is empty. Add a product from the homepage.</p>
            <a href="/" class="btn">Continue Shopping</a>
        @else
            @foreach($items as $item)
                <div class="cart-item">
                    <div>
                        <h3 style="margin:0; color:#667eea;">{{ $item['name'] }}</h3>
                        <p style="margin:0.4rem 0 0;">Qty: {{ $item['quantity'] }}</p>
                    </div>
                    <div>
                        <strong>${{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="summary-box">
        <h2 style="margin-top:0; color:#667eea;">Order Summary</h2>
        <div class="summary-row"><span>Subtotal</span><span>${{ number_format($total ?? 0, 2) }}</span></div>
        <div class="summary-row"><span>Shipping</span><span>$0.00</span></div>
        <div class="summary-row"><span>Tax</span><span>${{ number_format(($total ?? 0) * 0.12, 2) }}</span></div>
        <div class="summary-row" style="font-size:1.1rem; font-weight:700;"><span>Total</span><span>${{ number_format(($total ?? 0) * 1.12, 2) }}</span></div>

        <form method="POST" action="/checkout" class="checkout-form">
            @csrf
            @foreach($items as $index => $item)
                <input type="hidden" name="items[{{ $index }}][name]" value="{{ $item['name'] }}">
                <input type="hidden" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
                <input type="hidden" name="items[{{ $index }}][price]" value="{{ $item['price'] }}">
            @endforeach

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Maria Santos" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="09123456789" required>

            <label for="address">Delivery Address</label>
            <textarea id="address" name="address" rows="3" placeholder="House number, street, city" required></textarea>

            <label for="payment">Mode of Payment</label>
            <select id="payment" name="payment" required>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Bank Payment">Bank Payment</option>
                <option value="GCash">GCash</option>
            </select>

            <button type="submit" class="btn" style="width:100%; margin-top:1rem;">Buy Now</button>
        </form>
    </div>
</div>
@endsection
