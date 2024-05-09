<?php

namespace Tritiyo\Homeland\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table ="purchases";
    protected $fillable = [
        'date', 'sand_type', 'bolgate_id', 'per_unit_amount', 'loading_cost', 'bolgate_cost', 'unloading_cost',  'actual_amount', 'qty', 'amount', 'target_sale_amount', 'note'
    ];
}