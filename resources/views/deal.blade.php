@extends('layouts.welcome')
@section('title')
    Hot Deals - Limited-time offers & exclusive discounts
@endsection
@section('description')
    Discover today's hottest deals and limited-time offers from your favorite stores. Save big with our exclusive discounts!
@endsection
@section('keywords')
    hot deals, limited-time offers, flash sales, exclusive discounts, online shopping deals
@endsection
@push('styles')
<style>
    :root {
        --deal-primary: #e63946;
        --deal-primary-hover: #d62839;
        --deal-secondary: #457b9d;
        --deal-accent: #ffddd2;
        --deal-dark: #1d3557;
        --deal-light: #f1faee;
    }

    /* Deal Card Styles */
    .deal-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        background: white;
        position: relative;
    }

    .deal-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .deal-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--deal-primary);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 2;
    }

    .deal-image-container {
        height: 180px;
        overflow: hidden;
        position: relative;
    }

    .deal-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .deal-card:hover .deal-image {
        transform: scale(1.05);
    }

    .deal-content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: calc(100% - 180px);
    }

    .deal-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--deal-dark);
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .deal-description {
        font-size: 15px;
        color: #6c757d;
        margin-bottom: 15px;
        flex-grow: 1;
    }

    .deal-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .deal-expiry {
        font-size: 14px;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .deal-usage {
        font-size: 14px;
        color: #38a169;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Button Styles */
    .view-deal-btn {
        padding: 12px 24px;
        background: linear-gradient(135deg, var(--deal-primary) 0%, var(--deal-primary-hover) 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
        margin-top: 15px;
    }

    .view-deal-btn:hover {
        background: linear-gradient(135deg, var(--deal-primary-hover) 0%, var(--deal-primary) 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        color: white;
    }

    .more-offers-btn {
        padding: 10px 20px;
        background-color: white;
        color: var(--deal-secondary);
        border: 1px solid var(--deal-secondary);
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        text-align: center;
        text-decoration: none;
        display: block;
    }

    .more-offers-btn:hover {
        background-color: var(--deal-secondary);
        color: white;
    }

    /* Header Styles */
    .deals-header {
        background: linear-gradient(135deg, var(--deal-primary) 0%, #ef476f 100%);
        color: white;
        padding: 40px 0;
        margin-bottom: 30px;
        text-align: center;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .deals-header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.1)" d="M0,0 L100,0 L100,100 L0,100 Z"></path></svg>');
        background-size: cover;
        opacity: 0.1;
    }

    .deals-header h1 {
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 15px;
        position: relative;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    }

    .deals-header p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
        position: relative;
    }

    /* Category Filter */
    .deal-categories {
        margin-bottom: 30px;
    }

    .category-badge {
        display: inline-block;
        padding: 8px 15px;
        margin-right: 10px;
        margin-bottom: 10px;
        background-color: var(--deal-light);
        color: var(--deal-dark);
        border-radius: 20px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .category-badge:hover, .category-badge.active {
        background-color: var(--deal-primary);
        color: white;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .deals-header h1 {
            font-size: 2.2rem;
        }

        .deal-title {
            font-size: 1.2rem;
        }

        .view-deal-btn, .more-offers-btn {
            padding: 10px 15px;
            font-size: 14px;
        }

        .deal-image-container {
            height: 150px;
        }
    }
</style>
@endpush

@section('main')
<main class="container">
    <!-- Page Header -->
    <div class="deals-header">
        <div class="container">
            <h1>🔥 FLASH DEALS ALERT!</h1>
            <p class="lead">Limited-time offers you won't want to miss - act fast before they're gone!</p>
        </div>
    </div>

    <!-- Category Filters -->
    <div class="deal-categories text-center">
        <h5 class="mb-3">Shop by Category:</h5>
        <div>
            <span class="category-badge active">All Deals</span>
            <span class="category-badge">Fashion</span>
            <span class="category-badge">Electronics</span>
            <span class="category-badge">Home & Garden</span>
            <span class="category-badge">Travel</span>
            <span class="category-badge">Food & Drink</span>
        </div>
    </div>

    <!-- Deal List -->
    <div class="row">
        @foreach ($coupons as $coupon)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="deal-card h-100">
                @if($coupon->is_featured)
                <div class="deal-badge">HOT DEAL</div>
                @endif

                <div class="deal-image-container">
                    @if ($coupon->image)
                    <img src="{{ asset('uploads/deals/' . $coupon->image) }}" class="deal-image" alt="{{ $coupon->name }}" loading="lazy">
                    @else
                    <img src="{{ asset('uploads/stores/' . $coupon->store->image) }}" class="deal-image" alt="{{ $coupon->store->name }}" loading="lazy">
                    @endif
                </div>

                <div class="deal-content">
                    <h3 class="deal-title">{{ $coupon->name }}</h3>
                    <p class="deal-description">{{ $coupon->description }}</p>

                    <div class="deal-meta">
                        <div class="deal-expiry">
                            <i class="far fa-clock"></i> Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('M d') }}
                        </div>
                        <div class="deal-usage">
                            <i class="fas fa-users"></i> {{ $coupon->clicks }}
                        </div>
                    </div>

                    <a href="{{ $coupon->store->destination_url }}" target="_blank" class="view-deal-btn" onclick="updateClickCount({{ $coupon->id }})">
                        View Deal
                    </a>

                    <a href="{{ route('store.detail', ['slug' => Str::slug($coupon->store->slug)]) }}" class="more-offers-btn">
                        More Offers
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $coupons->links('vendor.pagination.custom') }}
    </div>
</main>
@endsection

@push('scripts')
<script>
    function updateClickCount(couponId) {
        fetch('{{ route("update.clicks") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ coupon_id: couponId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const usedCountElement = document.querySelector(`.deal-card[data-id="${couponId}"] .deal-usage`);
                if (usedCountElement) {
                    usedCountElement.innerHTML = `<i class="fas fa-users me-1"></i> ${data.clicks}`;
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Category filter functionality
    document.querySelectorAll('.category-badge').forEach(badge => {
        badge.addEventListener('click', function() {
            document.querySelector('.category-badge.active').classList.remove('active');
            this.classList.add('active');
            // Here you would typically filter deals by category
            // For now we'll just simulate it
            console.log('Filtering by:', this.textContent);
        });
    });
</script>
@endpush
