<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBankDetail extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

}
