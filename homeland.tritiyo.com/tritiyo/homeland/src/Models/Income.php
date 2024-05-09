<?php

namespace Tritiyo\Homeland\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $table ="incomes";
    protected $fillable = [
        'date', 'ledger_id', 'transaction_with_type', 'transaction_with', 'per_unit_amount', 'qty', 'actual_amount', 'discount', 'amount', 'payment_type', 'truck_number', 'token_number', 'note'
    ];
}
