@extends('layouts.app')

@section('title', 'Contact Us')

@section('styles')
<style>
    .contact-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .contact-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 2rem;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .contact-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 10px;
        border-left: 4px solid #667eea;
    }

    .contact-icon-box {
        font-size: 2rem;
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        color: white;
    }

    .contact-details h3 {
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .contact-details p {
        color: #666;
        margin: 0;
    }

    .contact-form {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #667eea;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-family: inherit;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .social-links {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #ddd;
        text-align: center;
    }

    .social-links h3 {
        color: #667eea;
        margin-bottom: 1rem;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .social-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: scale(1.1) translateY(-3px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    @media (max-width: 768px) {
        .contact-content {
            grid-template-columns: 1fr;
        }

        .contact-form {
            padding: 1.5rem;
        }

        .form-submit {
            margin-top: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="contact-header">
    <div class="contact-icon">💬</div>
    <h1>{{ $title ?? 'Contact Us' }}</h1>
    <p style="font-size: 1.1rem; color: #666;">{{ $description ?? 'Get in touch with us today' }}</p>
</div>

<div class="contact-content">
    <div class="contact-info">
        <div class="contact-item">
            <div class="contact-icon-box">📍</div>
            <div class="contact-details">
                <h3>Address</h3>
                <p>123 Ibabang Dupay<br>Lucena City, Red-V</p>
            </div>
        </div>

        <div class="contact-item">
            <div class="contact-icon-box">📞</div>
            <div class="contact-details">
                <h3>Phone</h3>
                <p><a href="tel:+1234567890" style="color: #667eea; text-decoration: none;">+63 (234) 567-8901</a></p>
            </div>
        </div>

        <div class="contact-item">
            <div class="contact-icon-box">✉️</div>
            <div class="contact-details">
                <h3>Email</h3>
                <p><a href="mailto:hello@example.com" style="color: #667eea; text-decoration: none;">matt@gmail.com</a></p>
            </div>
        </div>

        <div class="contact-item">
            <div class="contact-icon-box">⏰</div>
            <div class="contact-details">
                <h3>Hours</h3>
                <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat - Sun: Closed</p>
            </div>
        </div>

        <div class="social-links">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#" class="social-icon" title="Facebook">f</a>
                <a href="#" class="social-icon" title="Twitter">𝕏</a>
                <a href="#" class="social-icon" title="LinkedIn">in</a>
                <a href="#" class="social-icon" title="Instagram">📷</a>
            </div>
        </div>
    </div>

    <div class="contact-form">
        <h2 style="color: #667eea; margin-top: 0; margin-bottom: 1.5rem;">Send us a Message</h2>
        <form method="POST" action="/contact" onsubmit="return handleSubmit(event)">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="matt" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="matt@example.com" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="How can we help?" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your message here..." required></textarea>
            </div>

            <button type="submit" class="form-submit">Send Message</button>
        </form>
    </div>
</div>

<script>
    function handleSubmit(event) {
        event.preventDefault();
        // Temporarily show a success message for demonstration
        alert('Thank you for your message! We will get back to you soon.');
        event.target.reset();
        return false;
    }
</script>
@endsection