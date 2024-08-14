@extends('layouts.app')

@section('title', 'Welcome to Our Accounting Firm')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endpush

@section('content')
<section class="hero bg-primary text-white text-center py-5" style="background: url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center / cover;">
    <div class="container">
        <h1 class="display-4">Professional Accounting Services</h1>
        <p class="lead">Helping you manage your finances efficiently and effectively.</p>
        <a href="#services" class="btn btn-outline-light btn-lg mt-3">Explore Our Services</a>
        <a href="#contact" class="btn btn-light btn-lg mt-3 ml-2">Get a Quote</a>
    </div>
</section>

    <!-- Services Section -->
    <section id="services" class="services py-5">
        <div class="container">
            <div class="row text-center">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow">
                            <div class="card-body">
                                <div class="service-icon mb-3">
                                    <img src="{{ asset('icons/' . $service->icon) }}" alt="{{ $service->title }}" class="img-fluid">
                                </div>
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
    <section id="about" class="about bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2>About Us</h2>
                    <p class="text-muted">We are a team of experienced and dedicated accountants committed to providing high-quality financial services.</p>
                    <ul class="timeline">
                        <li><strong>2010:</strong> Firm Founded</li>
                        <li><strong>2015:</strong> Expanded to New Markets</li>
                        <li><strong>2020:</strong> Reached 1000+ Clients</li>
                    </ul>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/aboutUs.jpg') }}" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials py-5">
        <div class="container">
            <h2 class="text-center mb-4">What Our Clients Say</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner text-center">
                    @foreach ($testimonials as $key => $testimonial)
                        <div class="carousel-item @if($key === 0) active @endif">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="card-text">"{{ $testimonial->content }}"</p>
                                        <footer class="blockquote-footer">{{ $testimonial->author }}</footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>
    

    <!-- Contact Section -->
    <section id="contact" class="contact bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Get in Touch</h2>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2750444080915!2d106.70765031507314!3d10.803645761075446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752d6f8e6ff0e1%3A0x4e6e8c8f7b340ab!2s131%20Điện%20Biên%20Phủ%20Street%2C%20Phường%2015%2C%20Quận%20Bình%20Thạnh%2C%20Thành%20phố%20Hồ%20Chí%20Minh%2C%20Việt%20Nam!5e0!3m2!1sen!2sau!4v1617863903946!5m2!1sen!2sau" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>
        </div>
    </section>
    
@endsection
