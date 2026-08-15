@extends('layouts.app')

@section('title', $title ?? 'Receipt')

@section('styles')
<style>
    .receipt-box {
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        border-radius: 16px;
        padding: 2rem;
    }

    .receipt-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 1rem;
        flex-wrap: wrap;
    }

    .receipt-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .receipt-table th,
    .receipt-table td {
        padding: 0.85rem 0.75rem;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }

    .receipt-total {
        margin-top: 1rem;
        text-align: right;
        font-size: 1.1rem;
        font-weight: 700;
    }
</style>
@endsection

@section('content')
<div class="receipt-box">
    <div class="receipt-header">
        <div>
            <p style="margin:0; color:#667eea; font-weight:700;">Receipt</p>
            <h1 style="margin:0.2rem 0 0; text-align:left;">{{ $title }}</h1>
        </div>
        <div class="user-badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:white; padding:0.6rem 1rem; border-radius:999px; font-weight:700;">
            {{ $receipt['id'] ?? 'INV-00000000' }}
        </div>
    </div>

    <p><strong>Customer:</strong> {{ $receipt['customer'] ?? 'Customer' }}</p>
    <p><strong>Email:</strong> {{ $receipt['email'] ?? 'customer@example.com' }}</p>
    <p><strong>Payment Method:</strong> {{ $receipt['payment'] ?? 'Cash' }}</p>
    <p><strong>Status:</strong> {{ $receipt['status'] ?? 'Paid' }}</p>

    <table class="receipt-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $receipt['product'] ?? 'Product' }}</td>
                <td>{{ $receipt['quantity'] ?? 1 }}</td>
                <td>${{ $receipt['unit_price'] ?? 0 }}</td>
                <td>${{ $receipt['subtotal'] ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <div class="receipt-total">
        <p>Tax: ${{ $receipt['tax'] ?? 0 }}</p>
        <p>Total: ${{ $receipt['total'] ?? 0 }}</p>
    </div>

    <div class="checkout-actions" style="justify-content:flex-start; margin-top:1.5rem;">
        <a href="/dashboard" class="btn">Back to Dashboard</a>
        <a href="/home" class="btn btn-secondary">Continue Shopping</a>
    </div>
</div>
@endsection
