@extends('layouts.app')

@section('title', $title ?? 'Home')

@section('styles')
<style>
    .hero {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 2rem;
        align-items: center;
        margin-bottom: 2rem;
    }

    .hero-copy h1 {
        text-align: left;
        margin-bottom: 1rem;
    }

    .hero-copy p {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
    }

    .hero-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.25);
        text-align: center;
    }

    .hero-price {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 1rem 0;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .product-card {
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        border-radius: 14px;
        padding: 1.25rem;
        text-align: center;
        transition: transform 0.2s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-image {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .product-card h3 {
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .price {
        font-weight: 700;
        color: #333;
        margin: 0.75rem 0;
    }

    .cta-row {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .cart-bar {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 1rem;
    }

    .cart-button {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #667eea;
        color: white;
        padding: 0.75rem 1rem;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.2);
    }

    .cart-count {
        background: #ff6b6b;
        color: white;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .add-cart {
        margin-top: 0.75rem;
        display: inline-block;
        background: #764ba2;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.6rem 1rem;
        font-weight: 600;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .hero {
            grid-template-columns: 1fr;
        }

        .hero-copy h1 {
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<div class="cart-bar">
    <a href="/contact" class="cart-button" aria-label="Shopping cart">
        <span>🛒</span>
        <span>Cart</span>
        <span class="cart-count">3</span>
    </a>
</div>

<div class="hero">
    <div class="hero-copy">
        <h1>{{ $title ?? 'Shop the Latest Deals' }}</h1>
        <p>{{ $subtitle ?? 'Premium gadgets and everyday essentials at unbeatable prices.' }}</p>
        <div class="cta-row">
            <a href="/about" class="btn">About Us</a>
            <a href="/contact" class="btn btn-secondary">Contact</a>
        </div>
    </div>

    <div class="hero-card">
        <div style="font-size:3rem;">🛍️</div>
        <h2 style="color:white; margin-bottom:1rem;">Flash Sale</h2>
        <p style="color:rgba(255,255,255,0.9);">Limited-time offer on top-rated devices.</p>
        <div class="hero-price">$199</div>
        <a href="/contact" class="btn" style="background:white; color:#667eea; border-color:white;">Buy Now</a>
    </div>
</div>

<div>
    <h2 style="text-align:center; color:#667eea; margin-top:2rem; margin-bottom:1rem;">Featured Products</h2>
    <div class="product-grid">
        <div class="product-card">
            <div class="product-image">🎧</div>
            <h3>Wireless Headphones</h3>
            <p>Rich sound and all-day comfort.</p>
            <div class="price">$79</div>
            <a href="/contact" class="add-cart">Add to Cart</a>
        </div>

        <div class="product-card">
            <div class="product-image">⌚</div>
            <h3>Smart Watch</h3>
            <p>Track health and stay connected.</p>
            <div class="price">$129</div>
            <a href="/contact" class="add-cart">Add to Cart</a>
        </div>

        <div class="product-card">
            <div class="product-image">📱</div>
            <h3>Smartphone</h3>
            <p>Powerful camera and fast performance.</p>
            <div class="price">$249</div>
            <a href="/contact" class="add-cart">Add to Cart</a>
        </div>

        <div class="product-card">
            <div class="product-image">💻</div>
            <h3>Laptop</h3>
            <p>Performance built for work and play.</p>
            <div class="price">$699</div>
            <a href="/contact" class="add-cart">Add to Cart</a>
        </div>
    </div>
</div>
@endsection