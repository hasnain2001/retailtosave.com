@extends('layouts.welcome')
@section('title') {{ $store->title }} @endsection
@section('description') {{ $store->meta_description }} @endsection
@section('keywords') {{ $store->meta_keyword }} @endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/store_detail.css') }}">
       <style>
            @media (max-width: 576px) {
            .store-header {
                min-height: 200px !important;
                padding: 1.5rem 0.5rem !important;
            }
            .store-logo-container {
                width: 60px !important;
                height: 60px !important;
            }
            .store-logo {
                width: 60px !important;
                height: 60px !important;
            }
            .store-header h1 {
                font-size: 1.25rem !important;
            }
            .store-header .lead {
                font-size: 1rem !important;
            }
            }
            @media (max-width: 576px) {
                .content-text {
                    font-size: 0.97rem !important;
                    word-break: break-word;
                }
            }
            @media (max-width: 576px) {
            .breadcrumb {
                flex-wrap: nowrap !important;
                overflow-x: auto !important;
                white-space: nowrap !important;
                font-size: 0.95rem;
            }
            .breadcrumb-item {
                flex-shrink: 0 !important;
            }
            }
        </style>
@endpush
@section('main')

    <main class="container ">
        @php
        $codeCount = 0;
        $dealCount = 0;
        foreach ($coupons as $coupon) {
            if ($coupon->code) {
                $codeCount++;
            } else {
                $dealCount++;
            }
        }
        $totalCount = $codeCount + $dealCount;
        @endphp
        <!-- Breadcrumb with Icons (Responsive) -->
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb bg-light p-1 rounded-3 shadow-sm flex-nowrap overflow-auto" style="white-space: nowrap;">
            <li class="breadcrumb-item flex-shrink-0">
                <a href="{{ url(app()->getLocale() . '/') }}" class="text-decoration-none text-dark">
                <i class="fas fa-home me-2"></i>@lang('nav.home')
                </a>
            </li>
            @if($store->category)
                <li class="breadcrumb-item flex-shrink-0">
                <a href="{{ route('category.detail', ['slug' => Str::slug($store->category->slug)]) }}" class="text-decoration-none text-dark">
                    <i class="fas fa-tag me-2"></i>{{ $store->category->name }}
                </a>
                </li>
            @endif
            <li class="breadcrumb-item flex-shrink-0">
                <a href="{{ route('stores') }}" class="text-decoration-none text-dark">
                <i class="fas fa-store me-2"></i>@lang('nav.stores')
                </a>
            </li>
            <li class="breadcrumb-item active flex-shrink-0" aria-current="page">
                <i class="fas fa-chevron-right me-2 text-muted"></i>{{ $store->name }}
            </li>
            </ol>
        </nav>


        <!-- Store Header with Icons -->
        <div class="store-header bg-primary bg-gradient p-4 p-md-5 mb-4 mb-lg-5 text-center text-white rounded-4 position-relative overflow-hidden" >
            <div class="position-absolute top-0 end-0 opacity-10 d-none d-sm-block">
            <i class="fas fa-certificate fa-7x"></i>
            </div>
            <div class="position-absolute bottom-0 start-0 opacity-10 d-none d-sm-block">
            <i class="fas fa-tags fa-6x"></i>
            </div>
            <div class="position-relative h-100 d-flex flex-column justify-content-center align-items-center">
            <div class="store-logo-container mx-auto mb-3 mb-md-4" style="width: 70px; height: 70px;">
                <img src="{{ asset('uploads/stores/' . $store->image) }}" alt="{{ $store->name }}" class="store-logo img-fluid rounded-circle shadow border-4 border-white" style="width: 70px; height: 70px; object-fit: cover;">
            </div>
            <h1 class="h4 h-md display-5 fw-bold mb-2 mb-md-3">
                <i class="fas fa-store-alt me-2"></i>{{ $store->name }}
            </h1>
            <p class="lead mb-2 mb-md-4 fs-6 fs-md-5">
                <i class="fas fa-tag me-2"></i>{{ $store->tagline ?? 'Save more with exclusive deals & coupons!' }}
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3">
                <a href="{{ $store->destination_url }}" target="_blank" class="btn btn-light btn-sm btn-lg rounded-pill px-3 px-md-4">
                <i class="fas fa-external-link-alt me-2"></i> @lang('message.Visit Store')
                </a>
                <div class="vr d-none d-md-block"></div>
                <div class="d-flex align-items-center bg-white bg-opacity-25 px-2 px-md-3 rounded-pill">
                <div class="rating me-2">
                    @for ($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star {{ $i <= 4 ? 'text-warning' : 'text-white-50' }}"></i>
                    @endfor
                </div>
                <span class="text-white small small-md">{{ $totalCount }} @lang('message.Offers')</span>
                </div>
            </div>
            </div>
        </div>


        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-9">
                @if($coupons->isEmpty())
                    <div class="alert alert-warning text-center py-5 rounded-4 shadow-sm">
                        <div class="mb-4">
                            <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                        </div>
                        <h4 class="alert-heading fw-bold">@lang('message.Oops! No Coupons Available')</h4>
                        <p class="mb-4">@lang('message.Dont worry, you can still explore amazing deals from our partnered brands.')</p>
                        <a href="{{ route('stores') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                            <i class="fas fa-store me-2"></i>@lang('message.Explore Brands')
                        </a>
                    </div>
                @else
                    <!-- Filter Buttons (Mobile First) -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <a href="{{ url()->current() }}" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-list me-2"></i>All ({{ $totalCount }})
                        </a>
                        <a href="{{ url()->current() }}?sort=codes" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-ticket-alt me-2"></i>@lang('message.Codes') ({{ $codeCount }})
                        </a>
                        <a href="{{ url()->current() }}?sort=deals" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-percentage me-2"></i>@lang('message.Deals') ({{ $dealCount }})
                        </a>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($coupons as $coupon)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                                    <div class="card-body d-flex flex-column p-4">
                                        <!-- Store Logo -->
                                        <div class="text-center mb-3">
                                            <img src="{{ asset('uploads/stores/' . $store->image) }}" alt="{{ $store->name }}" class="img-fluid" style="max-height: 60px; width: auto;">
                                        </div>

                                        <!-- Coupon Content -->
                                        <div class="flex-grow-1">
                                            <!-- Coupon Title -->
                                            <h5 class="card-title fw-bold mb-3">
                                                <i class="fas {{ $coupon->code ? 'fa-ticket-alt text-dark' : 'fa-percentage text-success' }} me-2"></i>
                                                {{ $coupon->name }}
                                            </h5>

                                            <!-- Coupon Description -->
                                            @if($coupon->description)
                                                <div class="mb-3">
                                                    <p class="small text-muted mb-1">
                                                        <i class="fas fa-info-circle me-1"></i> Details:
                                                    </p>
                                                    <p class="small">{{ $coupon->description }}</p>
                                                </div>
                                            @endif

                                            <!-- Expiry & Usage -->
                                            <div class="d-flex justify-content-between small mb-3">
                                                <span class="{{ strtotime($coupon->ending_date) < strtotime(now()) ? 'text-danger' : 'text-muted' }}">
                                                    <i class="far fa-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($coupon->ending_date)->format('M d, Y') }}
                                                </span>
                                                <span class="text-muted" id="usedCount{{ $coupon->id }}">
                                                    <i class="fas fa-users me-1"></i> {{ $coupon->clicks ?? 0 }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Action Button -->
                                        <div class="mt-auto">
                                            @if ($coupon->code)
                                                <button class=" btn-code w-100 reveal-code"
                                                    onclick="handleRevealCode(event, {{ $coupon->id }}, '{{ $coupon->code }}', '{{ $coupon->name }}', '{{ asset('uploads/stores/' . $coupon->store->image) }}', '{{ $coupon->store->destination_url }}', '{{ $coupon->store->name }}')">
                                                    <i class="fas fa-ticket-alt me-2"></i> @lang('welcome.Get Code')
                                                </button>
                                            @else
                                                <a href="{{ $coupon->store->destination_url }}" target="_blank"
                                                   class=" btn-deal w-100"
                                                   onclick="updateClickCount({{ $coupon->id }})">
                                                    <i class="fas fa-shopping-bag me-2"></i> @lang('welcome.View Deal')
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Store Content Section -->
                @if ($store->content)
                    <div class="mt-5 bg-white p-3 p-md-4 rounded-4 shadow-sm w-100">
                        <div class="d-flex align-items-center mb-3 mb-md-4 flex-column flex-md-row text-center text-md-start">
                            <i class="fas fa-info-circle fa-2x text-dark me-0 me-md-3 mb-2 mb-md-0"></i>
                            <h3 class="mb-0 fs-5 fs-md-3">About {{ $store->name }}</h3>
                        </div>
                        <div class="content-text" style="font-size: 1rem;">
                            {!! $store->content !!}
                        </div>
                    </div>

                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <!-- Store Summary -->
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-pie me-2"></i> Store Summary
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <span class="text-muted">
                                    <i class="fas fa-ticket-alt text-dark me-2"></i> Coupon Codes
                                </span>
                                <span class="badge bg-primary rounded-pill">{{ $codeCount }}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <span class="text-muted">
                                    <i class="fas fa-percentage text-success me-2"></i> Deals
                                </span>
                                <span class="badge bg-success rounded-pill">{{ $dealCount }}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center py-2">
                                <span class="text-muted">
                                    <i class="fas fa-tags text-info me-2"></i> Total Offers
                                </span>
                                <span class="badge bg-info rounded-pill">{{ $totalCount }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Quick Links -->
                    <div class="card-header bg-light py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-link me-2"></i> Quick Links
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ $store->destination_url }}" target="_blank" class="btn btn-outline-primary text-start">
                                <i class="fas fa-external-link-alt me-2"></i> Visit Store
                            </a>
                            <a href="{{ route('stores') }}" class="btn btn-outline-secondary text-start">
                                <i class="fas fa-store me-2"></i> All Stores
                            </a>
                            @if($store->category)
                                <a href="{{ route('category.detail', ['slug' => Str::slug($store->category->slug)]) }}" class="btn btn-outline-secondary text-start">
                                    <i class="fas fa-tag me-2"></i> {{ $store->category->name }} Category
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Store Details -->
                    <div class="card-header bg-light py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i> Store Details
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted mb-3">
                            <i class="fas fa-align-left me-2"></i> {{ $store->description }}
                        </p>
                        @if($store->user)
                            <p class="small text-muted mb-0">
                                <i class="fas fa-user-plus me-2"></i> Added by: {{ $store->user->name }}
                            </p>
                        @endif
                    </div>
                        <!-- Store Details -->
                    <div class="card-header bg-light py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i> About Store
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted mb-3">
                            <i class="fas fa-align-left me-2"></i> {{ $store->about }}
                        </p>
                    </div>
                    <!-- Related Stores -->
                    <div class="card-header bg-light py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-store-alt me-2"></i> Related Stores
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($relatedStores->isNotEmpty())
                            <ul class="list-unstyled mb-0">
                                @foreach ($relatedStores as $related)
                                    <li class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <img src="{{ asset('uploads/stores/' . $related->image) }}" alt="{{ $related->name }}" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                                        </div>
                                        <div>
                                            <a href="{{ route('store.detail', ['slug' => Str::slug($related->slug)]) }}" class="fw-semibold text-dark text-decoration-none">
                                                {{ $related->name }}
                                            </a>
                                            @if($related->tagline)
                                                <div class="small text-muted">{{ $related->tagline }}</div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="small text-muted mb-0">
                                <i class="fas fa-info-circle me-2"></i> No related stores found.
                            </p>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </main>

    <!-- Coupon Code Modal -->
    <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow border-0">
                <!-- Modal Header -->
                <div class="modal-header position-relative bg-primary text-white border-0 rounded-top-4">
                    <div class="position-absolute top-0 start-50 translate-middle mt-n4">
                        <span class="badge bg-danger px-3 py-2 shadow-sm">
                            <i class="fas fa-bolt me-1"></i> LIMITED TIME
                        </span>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body text-center py-4 px-5">
                    <!-- Logo -->
                    <div class="mb-4">
                        <img src="" alt="Brand Logo" id="storeImage" class="img-fluid rounded-circle shadow border-4 border-light" style="width: 80px; height: 80px; object-fit: contain;">
                    </div>
                    <!-- Title -->
                    <h5 class="fw-bold text-dark mb-3" id="couponName"></h5>
                    <!-- Coupon Code Section -->
                    <div class="bg-light rounded-3 p-3 mb-4">
                        <p class="small text-muted mb-2">
                            <i class="fas fa-tag me-1"></i> YOUR COUPON CODE
                        </p>
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                            <span id="couponCode" class="fw-bold fs-4 text-dark"></span>
                            <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard()">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                        <p id="copyMessage" class="small text-success fw-bold mb-0" style="display: none;">
                            <i class="fas fa-check-circle me-1"></i> Copied to clipboard!
                        </p>
                    </div>
                    <!-- Instructions -->
                    <p class="small text-muted mb-0">
                        <i class="fas fa-info-circle me-1"></i> Use this code at checkout on
                        <a href="" id="couponUrl" class="text-decoration-none fw-semibold text-dark"></a>
                    </p>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer bg-light rounded-bottom-4 justify-content-center">
                    <a href="" id="storeLink" class="btn-deal rounded-pill px-4">
                        <i class="fas fa-external-link-alt me-2"></i> Go to Store
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let couponModal = null;

        document.addEventListener('DOMContentLoaded', function() {
            couponModal = new bootstrap.Modal(document.getElementById('couponModal'));
        });

        function handleRevealCode(event, couponId, couponCode, couponName, storeImage, destinationUrl, storeName) {
            event.preventDefault();

            // Update modal content
            document.getElementById('couponCode').textContent = couponCode;
            document.getElementById('couponName').textContent = couponName;
            document.getElementById('storeImage').src = storeImage;
            document.getElementById('couponUrl').href = destinationUrl;
            document.getElementById('couponUrl').textContent = storeName;
            document.getElementById('storeLink').href = destinationUrl;

            // Update click count
            updateClickCount(couponId);

            // Show modal
            if (couponModal) {
                couponModal.show();
                // Redirect to destination_url after showing modal
                setTimeout(function() {
                    window.open(destinationUrl, '_blank');
                }, 500); // Adjust delay as needed
            } else {
                window.open(destinationUrl, '_blank');
            }
        }

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
                    const usedCountElement = document.getElementById('usedCount' + couponId);
                    if (usedCountElement) {
                        usedCountElement.innerHTML = `<i class="fas fa-users me-1"></i> ${data.clicks}`;
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function copyToClipboard() {
            const code = document.getElementById('couponCode').textContent;
            navigator.clipboard.writeText(code).then(() => {
                const copyMessage = document.getElementById('copyMessage');
                copyMessage.style.display = 'block';
                setTimeout(() => {
                    copyMessage.style.display = 'none';
                }, 3000);
            });
        }
    </script>
    @endpush


@endsection
