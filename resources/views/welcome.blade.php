@extends('layouts.welcome')

@section('title', '| Latest Discount Codes of '. date('y') .' | Best Offers and Deals')
@section('description', 'Explore our amazing stores and offers. Find the best products and services in one place.')
@section('keywords', 'coupons, discount codes, best offers, deals')
@section('author', 'john doe')

@push('styles')
<style>
hr {
    border: none;
    border-top: 3px dashed #e63946; /* Dashed border */
    height: 0;
    background: none;
    border-radius: 0;
    opacity: 0.8;
    margin: 1.5rem 15%;
    transition: all 0.4s ease;
}

/* Optional: Add a hover animation */
hr:hover {
    opacity: 1;
    border-top-width: 4px;
    border-top-color: #e63946;
}
       /* slider Section */

    .hero-slider {
        position: relative;
    }

    .carousel-item {
        height: 200px;
        overflow: hidden;
        border-radius: 0.75rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: fill;
        transition: transform 0.5s ease;
    }

    .carousel-item:hover img {
        transform: scale(1.03);
    }

    .slide-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        color: white;
        padding: 2rem;
        padding-top: 4rem;
    }

    .slide-overlay h2 {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }
    .slider-title{
        font-size: 15px;
    }

    .slide-overlay p {
        font-size: 1.125rem;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .shop-now-btn {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: all 0.3s ease;
        background-color: rgba(0,0,0,0.9);
        color: white;
        border: 2px solid white;
        padding: 12px 20px;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 30px;
        text-decoration: none;
    }

    .carousel-item:hover .shop-now-btn {
        opacity: 1;
    }

    .shop-now-btn:hover {
        background-color: white;
        color: black;
        text-decoration: none;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }

    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin: 0 5px;
        border: none;
        background-color: rgba(255,255,255,0.5);
    }

    .carousel-indicators button.active {
        background-color: white;
    }
    .slider-image{
        width:100%;
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: 350px;
        }

        .slide-overlay h2 {
            font-size: 1.5rem;
        }

        .slide-overlay p {
            font-size: 1rem;
        }
    }
    /* store Section */

    .stores-section {
        position: relative;
    }

    .store-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px !important;
    }

    .store-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .store-image-container {
        position: relative;
        margin: 0 auto;
        width: 150px;
        height: 150px;
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 40px;
        height: 40px;
        background: white;
        border: 1px solid #dee2e6;
        color: #000000;
        top: 50%;
        transform: translateY(-50%);
    }
    .store-heading h1 {
        font-size: 2rem;
        font-weight: 600;
        color: #22223b;
        letter-spacing: 1px;
        text-transform: uppercase;
        background: linear-gradient(90deg, #e63946 0%, #e63946 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 8px rgba(255, 204, 51, 0.15);
    }
    .store-heading p{

    }
    .swiper-button-prev {
        left: -20px;
    }

    .swiper-button-next {
        right: -20px;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        font-size: 14px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .swiper-button-prev,
        .swiper-button-next {
            display: none;
        }

        .store-image-container {
            width: 120px;
            height: 120px;
        }
    }
/* Coupon Card Container */
.couponcode {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.coupon-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
}

/* Button Styles with Hidden Code */
.get-code-btn {
    padding: 10px 20px;
    background-color: #e63946;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    text-transform: uppercase;
}

.get-code-btn:hover {
    color: white;
    background-color: #ea0b1e;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.get-code-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}

.btn-text {
    flex-grow: 1;
    text-align: left;
    padding-left: 10px;
}

.code-preview {
    background: rgba(255, 255, 255, 0.2);
    padding: 4px 10px;
    border-radius: 4px;
    font-family: 'Courier New', monospace;
    font-weight: bold;
    position: relative;
    margin-right: 10px;
}

.code-preview::before {
    content: "•••";
    letter-spacing: 2px;
    margin-right: 5px;
    opacity: 0.7;
}

/* Corner Flag */
.corner-flag {
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 30px 30px 0;
    border-color: transparent #ff6b6b transparent transparent;
}

/* Other styles remain the same as previous example */
.ribbon-wrapper {
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    z-index: 2;
}

.ribbon {
    padding: 4px 12px;
    font-size: 0.7rem;
    font-weight: 600;
    color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.ribbon.verified {
    background: linear-gradient(135deg, #ff5e62, #ff2400);
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
}

.ribbon.exclusive {
    background: linear-gradient(135deg, #4776E6, #8E54E9);
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}

.store-logo {
    padding: 20px 10px 0;
}

.store-img {
    height: 100px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.coupon-card:hover .store-img {
    transform: scale(1.05);
}

.coupon-info {
    position: relative;
    z-index: 1;
}

.coupon-title {
    font-size: 1rem;
    font-weight: 700;
    color: #333;
    line-height: 1.3;
    min-height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.expiry-badge .badge {
    font-size: 0.7rem;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 50px;
    box-shadow: inset 0 0 5px rgba(0,0,0,0.05);
}

.deal-btn {
    background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
    color: #333;
    border: none;
    border-radius: 8px;
    padding: 10px;
    font-weight: 700;
    transition: all 0.3s ease;
}

.deal-btn:hover {
    background: linear-gradient(135deg, #c2e9fb 0%, #a1c4fd 100%);
    color: #333;
    transform: translateY(-2px);
}

.coupon-footer {
    position: relative;
    z-index: 1;
}
 /* blog styles*/
  .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .transition-scale {
        transition: transform 0.5s ease;
    }

    .blog-card:hover .transition-scale {
        transform: scale(1.05);
    }

    .object-cover {
        object-fit: cover;
    }

    .hover-shadow:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endpush

@section('main')
<!-- Hero Slider Section -->
<section class="hero-slider">
    <div class="container px-0 px-md-3">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $key => $slider)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner rounded-xl">
                @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $slider->image ? asset('uploads/slider/' . $slider->image) : asset('front/assets/images/no-image-found.jpg') }}"
                         class="slider-image"
                         alt="{{ $slider->title }}"
                         loading="lazy">
                    <div class="slide-overlay">
                        <span class="fw-bold mb-2">{{ $slider->title }}</span>
                        <p class="mb-0">{{ $slider->description }}</p>
                    </div>
                    <a href="{{ $slider->link }}" target="_blank" class="shop-now-btn"> <span class=" slider-title">{{ $slider->title }}</span></a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<hr>
<!-- Stores Section -->
<section class="stores-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <div class="store-heading">
                <h1>Latest Discount Codes & Promo Codes From Popular Stores</h1>
                <p> Discover our beautifully curated stores offering the best products and services</p>
            </div>
        </div>

        <div class="position-relative">
            <div class="swiper storesSwiper">
                <div class="swiper-wrapper pb-4">
                    @foreach ($stores as $store)
                    @php
                        $storeUrl = $store->slug ? route('store.detail', ['slug' => Str::slug($store->slug)]) : '#';
                    @endphp

                    <div class="swiper-slide">
                        <div class="card store-card h-100 border-0  overflow-hidden">
                            <div class="store-image-container p-4">
                                <a href="{{ $storeUrl }}" class="text-decoration-none text-dark">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ $store->image ? asset('uploads/stores/' . $store->image) : asset('front/assets/images/no-image-found.jpg') }}"
                                             class="img-fluid rounded-circle object-fit-fill"
                                             alt="{{ $store->name }}"
                                             loading="lazy"
                                             onerror="this.src='{{ asset('assets/images/no-image-found.png') }}'">
                                    </div>
                                </a>
                            </div>
                            <div class="card-body text-center pt-0">
                                <a href="{{ $storeUrl }}" class=" text-decoration-none text-dark">
                                    <span class="h6 card-title fw-bold mb-4 text-nowrap">{{ $store->name }}</span>
                                </a>
                                <p class="card-text text-muted mb-3">{{ Str::limit($store->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination position-relative mt-3"></div>
            </div>

            <!-- Custom navigation buttons -->
            <button class="swiper-button-prev text-dark shadow-sm"></button>
            <button class="swiper-button-next text-dark shadow-sm"></button>
        </div>
    </div>
</section>
<hr>
<!-- Featured Couponscode Section -->
<section class="couponcode container py-5">
       <div class="text-center mb-5">
            <div class="coupon-heading">
                <h2>Shop Today's Trending Coupon and Save Big</h2>
             </div>
        </div>
    <div class="row g-4">
        @foreach ($couponscode as $coupon)
        <div class="col-md-6 col-lg-3">
            <div class="coupon-card position-relative h-100">
                <!-- Ribbon Badges -->
                <div class="ribbon-wrapper">
                    <span class="ribbon verified"><i class="fas fa-check-circle me-1"></i> Verified</span>
                    <span class="ribbon exclusive">Exclusive</span>
                </div>

                <!-- Store image -->
                <div class="store-logo text-center mb-3">
                    <a href="{{ route('store.detail', ['slug' => Str::slug($coupon->store->slug)]) }}">
                        <img src="{{ $coupon->store->image ? asset('uploads/stores/' . $coupon->store->image) : asset('front/assets/images/no-image-found.jpg') }}"
                            alt="{{ $coupon->store->name }}"
                            class="img-fluid store-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('assets/images/no-image-found.png') }}'">
                    </a>
                </div>

                <!-- Coupon Info -->
                <div class="coupon-info px-3">
                    <h5 class="coupon-title mb-2">{{ $coupon->name }}</h5>

                    <!-- Expiry Info -->
                    <div class="expiry-badge mb-3">
                        <span class="badge bg-light text-dark">
                            <i class="fas fa-clock me-1 text-warning"></i>
                            @if(\Carbon\Carbon::parse($coupon->ending_date)->isPast())
                                Expired
                            @else
                                Expires: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M Y') }}
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Get Code Button -->
                @if ($coupon->code)
                <div class="code-wrapper px-3 mb-3">
                    <button class="btn get-code-btn w-100 position-relative"
                        onclick="handleRevealCode(event, {{ $coupon->id }}, '{{ $coupon->code }}', '{{ $coupon->name }}', '{{ asset('uploads/stores/' . $coupon->store->image) }}', '{{ $coupon->store->destination_url }}', '{{ $coupon->store->name }}')">
                        <span class="btn-text">Get Code</span>

                        <span class="corner-flag"></span>
                    </button>
                </div>
                @else
                <div class="code-wrapper px-3 mb-3">
                    <a href="{{ $coupon->store->destination_url }}" target="_blank" class="btn deal-btn w-100"
                        onclick="updateClickCount({{ $coupon->id }})">
                        Get Deal <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
                @endif

                <!-- Footer Stats -->
                <div class="coupon-footer px-3 pb-2">
                    <div class="d-flex justify-content-between small">
                        <span class="text-muted"><i class="fas fa-users me-1"></i> {{ $coupon->clicks ?? 0 }} used</span>
                        <span class="text-success fw-bold"><i class="fas fa-bolt me-1"></i> Active</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<hr>
<!-- category Section -->
<section class="category-section py-5 ">
    <div class="container">
        <div class="text-center mb-5">
            <div class="category-heading">
                    <h3 class="fw-bold text-dark">Popular Categories</h3>
               </div>
        </div>

        <div class="position-relative">
            <div class="swiper storesSwiper">
                <div class="swiper-wrapper pb-4">
                    @foreach ($categories as $category)
                    @php
                        $categoryurl = $category->slug ?  route('category.detail', ['slug' => Str::slug($category->slug)]) : '#';
                    @endphp

                    <div class="swiper-slide">
                        <div class="card category-card h-100 border-0  overflow-hidden">
                            <div class="category-image-container p-4">
                                <a href="{{ $categoryurl }}" class="text-decoration-none text-dark">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ $category->image ? asset('uploads/categories/' . $category->image) : asset('front/assets/images/no-image-found.jpg') }}"
                                             class="img-fluid rounded-circle object-fit-fill"
                                             alt="{{ $category->name }}"
                                             loading="lazy"
                                             onerror="this.src='{{ asset('assets/images/no-image-found.png') }}'">
                                    </div>
                                </a>
                            </div>
                            <div class="card-body text-center pt-0">
                                <a href="{{ $categoryurl }}" class=" text-decoration-none text-dark">
                                    <span class="h6 card-title fw-bold mb-4 text-nowrap">{{ $category->name }}</span>
                                </a>
                                <p class="card-text text-muted mb-3">{{ Str::limit($category->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination position-relative mt-3"></div>
            </div>

            <!-- Custom navigation buttons -->
            <button class="swiper-button-prev text-dark shadow-sm"></button>
            <button class="swiper-button-next text-dark shadow-sm"></button>
        </div>
    </div>
</section>
<hr>
<!-- Featured Couponscode Section -->
<section class="couponcode container py-5">
           <div class="text-center mb-5">
            <div class="coupon-heading">
                <h4>Shop Today's Trending Coupon and Save Big</h4>
             </div>
        </div>
    <div class="row g-4">
        @foreach ($couponsdeal as $coupon)
        <div class="col-md-6 col-lg-3">
            <div class="coupon-card position-relative h-100">
                <!-- Ribbon Badges -->
                <div class="ribbon-wrapper">
                    <span class="ribbon verified"><i class="fas fa-check-circle me-1"></i> Verified</span>
                    <span class="ribbon exclusive">Exclusive</span>
                </div>

                <!-- Store image -->
                <div class="store-logo text-center mb-3">
                    <a href="{{ route('store.detail', ['slug' => Str::slug($coupon->store->slug)]) }}">
                        <img src="{{ $coupon->store->image ? asset('uploads/stores/' . $coupon->store->image) : asset('front/assets/images/no-image-found.jpg') }}"
                            alt="{{ $coupon->store->name }}"
                            class="img-fluid store-img"
                            loading="lazy"
                            onerror="this.src='{{ asset('assets/images/no-image-found.png') }}'">
                    </a>
                </div>

                <!-- Coupon Info -->
                <div class="coupon-info px-3">
                    <h5 class="coupon-title mb-2">{{ $coupon->name }}</h5>

                    <!-- Expiry Info -->
                    <div class="expiry-badge mb-3">
                        <span class="badge bg-light text-dark">
                            <i class="fas fa-clock me-1 text-warning"></i>
                            @if(\Carbon\Carbon::parse($coupon->ending_date)->isPast())
                                Expired
                            @else
                                Expires: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M Y') }}
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Get Code Button -->
                @if ($coupon->code)
                <div class="code-wrapper px-3 mb-3">
                    <button class="btn get-code-btn w-100 position-relative"
                        onclick="handleRevealCode(event, {{ $coupon->id }}, '{{ $coupon->code }}', '{{ $coupon->name }}', '{{ asset('uploads/stores/' . $coupon->store->image) }}', '{{ $coupon->store->destination_url }}', '{{ $coupon->store->name }}')">
                        <span class="btn-text">Get Code</span>

                        <span class="corner-flag"></span>
                    </button>
                </div>
                @else
                <div class="code-wrapper px-3 mb-3">
                    <a href="{{ $coupon->store->destination_url }}" target="_blank" class="btn deal-btn w-100"
                        onclick="updateClickCount({{ $coupon->id }})">
                        Get Deal <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
                @endif

                <!-- Footer Stats -->
                <div class="coupon-footer px-3 pb-2">
                    <div class="d-flex justify-content-between small">
                        <span class="text-muted"><i class="fas fa-users me-1"></i> {{ $coupon->clicks ?? 0 }} used</span>
                        <span class="text-success fw-bold"><i class="fas fa-bolt me-1"></i> Active</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<hr>
<!-- Blog Section -->
<section class="blog-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3 d-inline-flex align-items-center">
                <i class="fas fa-newspaper me-2"></i>Latest Updates
            </span>
            <h2 class="fw-bold mb-3">Discover Our Latest Blogs</h2>
            <p class="text-muted mb-0">Stay updated with our insightful articles and news</p>
        </div>

        <div class="row g-4">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="card blog-card h-100 border-0 shadow-sm overflow-hidden transition-all hover-shadow">
                    <div class="card-img-top position-relative overflow-hidden" style="height: 220px;">
                       <a href="{{ route('blog.detail', ['slug' => Str::slug($blog->slug)]) }}">
                            <img src="{{ $blog->image ? asset('uploads/blogs/' . $blog->image) : asset('front/assets/images/no-image-found.jpg') }}"
                                 alt="{{ $blog->title }}"
                                 class="img-fluid w-100 h-100 object-cover transition-scale"
                                 loading="lazy"
                                 onerror="this.src='{{ asset('assets/images/no-image-found.png') }}'">
                        </a>
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <span class="badge bg-primary bg-opacity-90 position-absolute top-0 end-0 m-3">{{ $blog->category->name ?? 'General' }}</span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt me-2"></i>{{ $blog->created_at->format('M d, Y') }}
                            </small>
                            <small class="text-muted ms-3">
                                <i class="far fa-clock me-2"></i>{{ ceil(str_word_count($blog->description) / 200) }} min read
                            </small>
                        </div>

                        <h5 class="card-title fw-bold mb-3">{{ Str::limit($blog->name, 60) }}</h5>


                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <a href="{{ route('blog.detail', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-link text-primary p-0 text-decoration-none d-flex align-items-center">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            <div class="d-flex">
                                <!-- Add social sharing icons if needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('blog', ['lang' => app()->getLocale()]) }}" class="btn btn-primary px-4 py-2 rounded-pill">
                <i class="fas fa-book-open me-2"></i>View All Articles
            </a>
        </div>
    </div>
</section>



@endsection

@push('scripts')


<script>
    // Optional: Add autoplay functionality
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#heroCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000, // Change slide every 5 seconds
            pause: 'hover' // Pause on hover
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.storesSwiper', {
            slidesPerView: 6,
            spaceBetween: 24,
            loop: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
                1200: { slidesPerView: 6 }
            }
        });
    });
</script>
@endpush
