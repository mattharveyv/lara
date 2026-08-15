@extends('layouts.app')

@section('title', $title ?? 'Login')

@section('styles')
<style>
    .login-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        align-items: center;
    }

    .login-panel,
    .login-info {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 2rem;
        border: 1px solid #eaeaea;
    }

    .login-info {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .login-info h2,
    .login-info p,
    .login-info li {
        color: white;
    }

    .login-info ul {
        margin-top: 1rem;
        padding-left: 1.2rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #667eea;
    }

    .form-group input {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #ddd;
        border-radius: 10px;
        font-size: 1rem;
    }

    .form-group input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .btn-block {
        width: 100%;
        display: inline-block;
        text-align: center;
    }

    @media (max-width: 768px) {
        .login-wrapper {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="login-wrapper">
    <div class="login-info">
        <h2>Welcome back</h2>
        <p>Sign in to continue browsing, place orders, and track your purchases.</p>
        <ul>
            <li>Fast checkout</li>
            <li>Secure payment options</li>
            <li>Instant order receipt</li>
        </ul>
    </div>

    <div class="login-panel">
        <h1 style="text-align:left; margin-bottom:1.5rem;">{{ $title }}</h1>

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="customer@example.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="secret123" required>
            </div>

            <button type="submit" class="btn btn-block">Login to Dashboard</button>
        </form>
    </div>
</div>
@endsection
