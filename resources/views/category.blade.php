@extends('layouts.welcome')
@section('title','Cut2Coupon | Latest Discount Codes of ' . date('Y') . ' | Best Offers and Deals')
@section('description', 'Explore our amazing stores and offers. Find the best products and services in one place.')
@section('keywords', 'stores, offers, products, services')
@section('author', 'john doe')
@push('styles')
<style>
    .category-card {
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .category-img-container {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .category-img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .category-name {
        font-size: 12px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 4px;
    }

    .category-count {
        font-size: 13px;
        color: #718096;
    }

    .section-title {
        position: relative;
         margin-bottom: 30px;
        font-weight: 700;
        color: #2d3748;
        font-size: 25px;
        text-align: center;
    }

    .section-title:after {
        content: '';
        position: absolute;
        width: 40%;
        height: 4px;
        bottom: -10px;
        left: 30%;

        background: linear-gradient(to right, #667eea, #764ba2);
        border-radius: 2px;
    }

    .gradient-bg {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
</style>
@endpush
@section('main')
<div class="main_content gradient-bg py-2">
    <div class="container">
        <!-- Title -->
        <h1 class="section-title"> Best Discounts For Every Category</h1>

        <!-- Categories Grid -->
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            @foreach ($categories as $category)
                <div class="col">
                    <a href="{{ $category->slug ? route('category.detail', ['slug' => Str::slug($category->slug)]) : '#' }}"
                       class="category-card text-decoration-none d-block h-100">
                        <div class="card-body d-flex align-items-center p-3">
                            <!-- Category Image and Info in one line -->
                            <div class="d-flex align-items-center w-100">
                                <div class="category-img-container me-3 flex-shrink-0">
                                    @if ($category->image)
                                        <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                             class="category-img"
                                             alt="{{ $category->name }}"
                                             loading="lazy">
                                    @else
                                        <i class="fas fa-tag fa-lg text-primary"></i>
                                    @endif
                                </div>
                                <h2 class="category-name">{{ $category->name }}</h2>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

            {{ $categories->links() }}
    </div>
</div>
@endsection
