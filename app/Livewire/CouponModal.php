<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Coupon;

class CouponModal extends Component
{
    public $couponId;
    public $couponCode;
    public $couponName;
    public $storeImage;
    public $storeUrl;
    public $storeName;
    public $showModal = false;

    protected $listeners = ['showCouponModal' => 'prepareModal'];

    public function prepareModal($couponId, $couponCode, $couponName, $storeImage, $storeUrl, $storeName)
    {
        $this->couponId = $couponId;
        $this->couponCode = $couponCode;
        $this->couponName = $couponName;
        $this->storeImage = $storeImage;
        $this->storeUrl = $storeUrl;
        $this->storeName = $storeName;

        $this->updateClickCount();
        $this->showModal = true;
    }

    public function updateClickCount()
    {
        $coupon = Coupon::find($this->couponId);
        if ($coupon) {
            $coupon->increment('clicks');
            $this->dispatch('couponUpdated', id: $coupon->id, clicks: $coupon->clicks);
        }
    }

    public function render()
    {
        return view('livewire.coupon-modal');
    }
}