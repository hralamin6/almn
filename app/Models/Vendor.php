<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(Admin::class)->withDefault();
    }
    public function vendordetail()
    {
        return $this->hasOne(VendorBusinessDetail::class)->withDefault();
    }
    public function bankDetail()
    {
        return $this->hasOne(VendorBankDetail::class)->withDefault();
    }


}
