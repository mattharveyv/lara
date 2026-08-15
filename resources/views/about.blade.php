@extends('layouts.app')

@section('title', 'About Us')

@section('styles')
<style>
    .about-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .about-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }

    .feature-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .feature-card h3 {
        margin: 1rem 0;
        font-size: 1.3rem;
        color: white;
    }

    .feature-card p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
    }

    .mission-section {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
        margin: 2rem 0;
        border-left: 4px solid #667eea;
    }

    .mission-section h2 {
        color: #667eea;
        margin-top: 0;
    }

    .team-section {
        margin-top: 3rem;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-top: 1.5rem;
    }

    .team-member {
        text-align: center;
    }

    .member-avatar {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .team-member h3 {
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .team-member p {
        color: #999;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .features {
            grid-template-columns: 1fr;
        }

        .team-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }
</style>
@endsection


@section('content')

<div class="about-header">

    <div class="about-icon">
        🚀
    </div>

    <h1>{{ $title ?? 'About Us' }}</h1>

    <p style="font-size: 1.1rem; color:#666;">
        {{ $description ?? 'Learn more about our mission and vision' }}
    </p>

</div>


<div class="mission-section">

    <h2>🎯 Our Mission</h2>

    <p>
        We are passionate about creating meaningful digital experiences.
        Our team is dedicated to building exceptional web applications
        that help businesses and individuals achieve their goals.
        We believe in the power of technology to transform ideas into reality.
    </p>

</div>


<h2 style="text-align:center; margin-top:2rem;">
    ✨ Why Choose Us?
</h2>


<div class="features">


    <div class="feature-card">

        <div class="feature-icon">
            💻
        </div>

        <h3>
            Modern Technology
        </h3>

        <p>
            Built with the latest web technologies and best practices
            to ensure optimal performance and scalability.
        </p>

    </div>



    <div class="feature-card">

        <div class="feature-icon">
            👥
        </div>

        <h3>
            Expert Team
        </h3>

        <p>
            Our experienced developers and designers are committed
            to delivering excellence in every project.
        </p>

    </div>



    <div class="feature-card">

        <div class="feature-icon">
            🎨
        </div>

        <h3>
            Beautiful Design
        </h3>

        <p>
            We create intuitive and visually stunning interfaces
            that users love to interact with.
        </p>

    </div>



    <div class="feature-card">

        <div class="feature-icon">
            ⚡
        </div>

        <h3>
            High Performance
        </h3>

        <p>
            Optimized for speed and efficiency to provide
            the best user experience possible.
        </p>

    </div>


</div>
<div class="team-section">

    <h2>
        👥 Our Team
    </h2>


    <div class="team-grid">


        <div class="team-member">

            <div class="member-avatar">
                👨‍💼
            </div>

            <h3>
                Matt Developer
            </h3>

            <p>
                Mark Developer
            </p>

        </div>



        <div class="team-member">

            <div class="member-avatar">
                👩‍🎨
            </div>

            <h3>
                Sarah Designer
            </h3>

            <p>
                UI/UX Designer
            </p>

        </div>



        <div class="team-member">

            <div class="member-avatar">
                👨‍💻
            </div>

            <h3>
                Mike Fullstack
            </h3>

            <p>
                Full Stack Developer
            </p>

        </div>



        <div class="team-member">

            <div class="member-avatar">
                👩‍💼
            </div>

            <h3>
                Emma Manager
            </h3>

            <p>
                Project Manager
            </p>

        </div>


    </div>

</div>



<div class="mission-section" style="margin-top:3rem;">

    <h2>
        📈 Our Vision
    </h2>


    <p>
        We envision a future where technology is accessible to everyone
        and simplifies the way people work and communicate.
        Our commitment is to continuously innovate and provide solutions
        that make a real difference in our clients' lives.
    </p>

</div>



<div style="text-align:center; margin-top:2rem;">

    <a href="/contact" class="btn">
        Get in Touch With Us
    </a>

</div>


@endsection