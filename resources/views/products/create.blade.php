@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<h1 style="text-align:left; margin-bottom:1.5rem;">Create Product</h1>

<form method="POST" action="/products" style="display:grid; gap:1rem;">
    @csrf

    <div>
        <label for="name" style="display:block; margin-bottom:0.5rem; font-weight:600; color:#111;">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" style="width:100%; padding:0.8rem; border:1px solid #ccc; border-radius:8px;">
        @error('name')
            <p style="color:#b91c1c; margin-top:0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" style="display:block; margin-bottom:0.5rem; font-weight:600; color:#111;">Description</label>
        <textarea id="description" name="description" rows="4" style="width:100%; padding:0.8rem; border:1px solid #ccc; border-radius:8px;">{{ old('description') }}</textarea>
        @error('description')
            <p style="color:#b91c1c; margin-top:0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:1rem;">
        <div>
            <label for="price" style="display:block; margin-bottom:0.5rem; font-weight:600; color:#111;">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" style="width:100%; padding:0.8rem; border:1px solid #ccc; border-radius:8px;">
            @error('price')
                <p style="color:#b91c1c; margin-top:0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock" style="display:block; margin-bottom:0.5rem; font-weight:600; color:#111;">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" style="width:100%; padding:0.8rem; border:1px solid #ccc; border-radius:8px;">
            @error('stock')
                <p style="color:#b91c1c; margin-top:0.25rem;">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div style="display:flex; gap:1rem; flex-wrap:wrap;">
        <button type="submit" class="btn">Save Product</button>
        <a href="/products" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection
