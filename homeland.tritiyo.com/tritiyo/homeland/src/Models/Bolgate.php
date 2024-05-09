<?php

namespace Tritiyo\Homeland\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolgate extends Model
{
    use HasFactory;
    protected $table ="bolgates";
    protected $fillable = [
        'name', 'size', 'owner', 'phone', 'address', 'description', 'fuel_capacity'
    ];
}
