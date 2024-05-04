<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class VendorDetailsComponent extends Component
{
    use LivewireAlert;

    public $name,$email,  $mobile, $status, $address, $pin_code,
        $bank_name, $bank_ifsc_code, $account_number, $account_holder_name,
        $shop_name, $shop_address, $shop_city, $shop_district, $shop_thana, $shop_union, $shop_pincode, $shop_mobile, $shop_website, $shop_email, $shop_licence, $gst_number, $pan_number,
        $vendor, $vendorDetails, $bankDetails,
        $itemStatus;

    public function mount()
    {
        $vendor = Auth::guard('admin')->user()->vendor;
        $vendorDetails = $vendor->vendorDetail;
        $bankDetails = $vendor->bankDetail;

        $this->name = $vendor->name;
        $this->email = $vendor->email;
        $this->mobile = $vendor->mobile;
        $this->address = $vendor->address;
        $this->status = $vendor->status;
        $this->pin_code = $vendor->pin_code;
        $this->vendor = $vendor;


        $this->bank_name = $bankDetails->bank_name;
        $this->bank_ifsc_code = $bankDetails->bank_ifsc_code;
        $this->account_number = $bankDetails->account_number;
        $this->account_holder_name = $bankDetails->account_holder_name;
        $this->bankDetails = $bankDetails;

        $this->shop_name = $vendorDetails->shop_name;
        $this->shop_address = $vendorDetails->shop_address;
        $this->shop_city = $vendorDetails->shop_city;
        $this->shop_district = $vendorDetails->shop_district;
        $this->shop_thana = $vendorDetails->shop_thana;
        $this->shop_union = $vendorDetails->shop_union;
        $this->shop_pincode = $vendorDetails->shop_pincode;
        $this->shop_mobile = $vendorDetails->shop_mobile;
        $this->shop_website = $vendorDetails->shop_website;
        $this->shop_email = $vendorDetails->shop_email;
        $this->shop_licence = $vendorDetails->shop_licence;
        $this->gst_number = $vendorDetails->gst_number;
        $this->pan_number = $vendorDetails->pan_number;
        $this->vendorDetails = $vendorDetails;

    }
    public function updateBank()
    {
        $data = $this->validate([
            'bank_name' => ['required', 'min:2', 'max:33'],
            'bank_ifsc_code' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'account_number' => ['required', 'numeric'],
            'account_holder_name' => ['required'],
        ]);
            $this->bankDetails->update($data);
            $this->alert('success', __('Vendor updated successfully'));

    }
    public function updateVendor()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33'],
            'mobile' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'status' => ['required'],
            'pin_code' => ['required', 'numeric'],
            'address' => ['required'],
            'email' => ['required', 'min:2', 'max:44', Rule::unique('users', 'email')->ignore($this->email)]
        ]);
            $this->vendor->update($data);
            $this->alert('success', __('Vendor updated successfully'));

    }
    public function render()
    {
        return view('livewire.admin.vendor-details-component');
    }
}
