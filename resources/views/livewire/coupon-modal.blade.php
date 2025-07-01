<div>
    <!-- Coupon Modal -->
    <div wire:ignore.self class="modal fade" id="couponModal" tabindex="-1" aria-hidden="true" wire:model="showModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header position-relative bg-light border-0">
                    <span class="badge bg-danger position-absolute top-0 start-50 translate-middle mt-2 px-4 py-1">
                        Limited Time Offer
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="$set('showModal', false)"></button>
                </div>
                <div class="modal-body text-center py-5">
                    <img src="{{ $storeImage }}" alt="Brand Logo" class="mb-4 rounded-circle shadow-sm" style="width:100px;height:100px;object-fit:fill;">
                    <h5 class="fw-bold text-purple">{{ $couponName }}</h5>
                    <div class="d-flex flex-column align-items-center mt-4 mb-4">
                        <div class="alert alert-purple d-inline-block px-4 py-3 text-center shadow-sm">
                            <strong>Coupon Code:</strong>
                            <strong class="fs-4 text-dark">{{ $couponCode }}</strong>
                            <button class="btn btn-success mt-3 px-4 py-2 fw-semibold shadow-sm"
                                    onclick="navigator.clipboard.writeText('{{ $couponCode }}'); document.getElementById('copyMessage').style.display='block'; setTimeout(() => document.getElementById('copyMessage').style.display='none', 3000);">
                                Copy Code
                            </button>
                        </div>
                        <p id="copyMessage" class="text-success fw-bold mt-2" style="display: none;">Coupon code copied successfully! 🎉</p>
                    </div>
                    <p class="text-muted mb-2">
                        Copy and paste this code at <a href="{{ $storeUrl }}" class="text-decoration-none fw-semibold text-purple" target="_blank">{{ $storeName }}</a>
                    </p>
                </div>
                <div class="bg-purple text-white text-center">
                    <p>CRAZIEST DEALS OF THE SEASON</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:init', function() {
            // Listen for modal show event
            Livewire.on('showModal', () => {
                const modal = new bootstrap.Modal(document.getElementById('couponModal'));
                modal.show();
            });

            // Update click count
            Livewire.on('couponUpdated', (data) => {
                const el = document.getElementById('usedCount' + data.id);
                if (el) el.textContent = `Used By: ${data.clicks}`;
            });
        });

        // Initialize modal when Livewire loads
        document.addEventListener('livewire:load', function() {
            window.livewire.on('showCouponModal', function() {
                const modal = new bootstrap.Modal(document.getElementById('couponModal'));
                modal.show();
            });
        });
    </script>
    @endpush
</div>