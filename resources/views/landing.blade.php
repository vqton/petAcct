@extends('layouts.app')

@section('title', 'Welcome to Our Accounting Firm')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Professional Accounting Services</h1>
            <p class="lead">Helping you manage your finances efficiently and effectively.</p>
            <a href="#services" class="btn btn-light btn-lg mt-3">Our Services</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="row text-center">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->title }}</h5>
                                <p class="card-text">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>We are a team of experienced and dedicated accountants committed to providing high-quality financial
                        services. Our mission is to help our clients achieve financial success through personalized and
                        reliable accounting solutions.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/aboutUs.jpg') }}" alt="About Us" class="img-fluid" width="500"
                        height="300">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-center">What Our Clients Say</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">"The team at this firm is exceptional. They helped me save a significant
                                amount on my taxes and provided excellent financial advice."</p>
                            <h5 class="card-title">John Doe</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">"Their bookkeeping services are top-notch. I can now focus on growing my
                                business without worrying about my financial records."</p>
                            <h5 class="card-title">Jane Smith</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">"Highly recommend this firm for anyone seeking reliable and professional
                                accounting services. They truly care about their clients."</p>
                            <h5 class="card-title">Michael Johnson</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4"
                                required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
