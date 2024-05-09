<?php

namespace Tritiyo\Homeland\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table ="customers";
    protected $fillable = [
        'name', 'phone', 'company', 'address', 'mobile_bank_account', 'bank_account'
    ];
}
