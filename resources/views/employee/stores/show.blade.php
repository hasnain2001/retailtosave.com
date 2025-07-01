@extends('employee.layouts.master')
@section('title', 'Store Details')
@section('content')
<main class="container-fluid px-0">

    <div class="content-wrapper">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="bg-light rounded-3 px-3 py-2 mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('employee.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee.store.index') }}">Stores</a></li>
                <li class="breadcrumb-item " ><a href="{{ route('employee.coupon.index') }}">Coupons</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">{{ $store->name }}</li>
            </ol>
        </nav>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row align-items-center mb-3">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center mb-2">
                            <span class="display-5 me-3 text-primary">
                                <i class="fas fa-tags"></i>
                            </span>
                            <div>
                                <h2 class="mb-0 fw-bold">Coupons</h2>
                                <div class="mt-1">
                                    <span class="badge bg-dark me-2">
                                        <i class="fas fa-store"></i> {{ $store->name }}
                                    </span>
                                    <span class="badge bg-info text-dark me-2">
                                        <i class="fas fa-network-wired"></i> {{ $store->network }}
                                    </span>
                                    <span class="badge bg-secondary me-2">
                                        <i class="fas fa-list"></i> {{ $store->category->name ?? 'N/A' }}
                                    </span>
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-language"></i> {{ $store->language->name ?? 'N/A' }}
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-md-end justify-content-start mt-3 mt-md-0">
                        <a href="{{ route('employee.coupon.create') }}" class="btn btn-primary btn-lg shadow-sm">
                            <i class="fas fa-plus-circle"></i> Add New Coupon
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <span class="badge bg-gradient bg-warning text-dark shadow-sm fs-6 px-3 py-2 d-inline-flex align-items-center">
                    <i class="fas fa-ticket-alt me-1"></i>
                    <span class="fw-bold">Coupons:</span>
                    <span class="ms-1">{{ $coupons->count() ?? 'N/A' }}</span>
                </span>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle fa-2x me-3"></i>
                    <div>
                     <p class="mb-0">Success! {{ session('success') }}</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card card-primary card-outline">


                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-hover table-striped w-100">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="30px">#</th>
                                        <th width="30px">Sort</th>
                                        <th>Coupon Name</th>
                                        <th>Store</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                    @foreach ($coupons as $coupon)
                                    <tr class="row1" data-id="{{ $coupon->id }}">
                                        <td>{{ $loop->iteration }}</td>

                                        <td class="handle"><i class="fas fa-arrows-alt"></i></td>
                                        <td>
                                            <strong>{{ $coupon->name ?: 'N/A' }}</strong>
                                            @if($coupon->code)
                                            <div class="text-muted small">Code: {{ $coupon->code }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-black">
                                                {{ $coupon->store->name }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($coupon->code)
                                                <span class="badge bg-primary">
                                                    <i class="fas fa-code"></i> Code
                                                </span>
                                            @else
                                                <span class="badge bg-success">
                                                    <i class="fas fa-percentage"></i> Deal
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($coupon->status == 1)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            @endif
                                        </td>
                                       <td>
                                            <div class="small text-muted">
                                                <i class="far fa-calendar-alt"></i> {{ $coupon->created_at->setTimezone('Asia/Karachi')->format('M d, Y') }}
                                                <div class="text-primary">
                                                    <i class="far fa-clock"></i> {{ $coupon->created_at->setTimezone('Asia/Karachi')->format('h:i A') }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="small text-muted">
                                                <i class="far fa-calendar-alt"></i> {{ $coupon->updated_at->setTimezone('Asia/Karachi')->format('M d, Y') }}
                                                <div class="text-warning">
                                                    <i class="far fa-clock"></i> {{ $coupon->updated_at->setTimezone('Asia/Karachi')->format('h:i A') }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('employee.coupon.edit', $coupon->id) }}"
                                                   class="btn btn-info"
                                                   data-bs-toggle="tooltip"
                                                   title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('employee.coupon.destroy', $coupon->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this coupon?')"
                                                            data-bs-toggle="tooltip"
                                                            title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
{{--
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            <div class="d-inline-block mr-2">
                                Showing <strong>{{ $coupons->firstItem() }}</strong> to <strong>{{ $coupons->lastItem() }}</strong> of <strong>{{ $coupons->total() }}</strong> entries
                            </div>
                            {{ $coupons->links() }}
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

