@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; gap:1rem; flex-wrap:wrap; margin-bottom:1.5rem;">
    <h1 style="text-align:left; margin:0;">Products</h1>
    <a href="/products/create" class="btn">Add Product</a>
</div>

<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1rem;">
    @foreach($products as $product)
        <div style="background:#f8f8f8; border:1px solid #ddd; border-radius:12px; padding:1rem;">
            <h3 style="color:#111; margin-bottom:0.5rem;">{{ $product->name }}</h3>
            <p style="color:#444; margin-bottom:0.75rem;">{{ $product->description }}</p>
            <p style="font-weight:700; margin-bottom:0.5rem;">$ {{ number_format($product->price, 2) }}</p>
            <p style="color:#555; margin-bottom:1rem;">Stock: {{ $product->stock }}</p>

            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                <a href="/products/{{ $product->id }}/edit" class="btn btn-secondary">Edit</a>
                <form method="POST" action="/products/{{ $product->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background:#111; color:#fff;">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
