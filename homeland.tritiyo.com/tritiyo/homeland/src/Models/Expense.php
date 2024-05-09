<?php

namespace Tritiyo\Homeland\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table ="expenses";
    protected $fillable = [
        'ledger_id', 'transaction_with', 'transaction_with_type', 'reference', 'note', 'date', 'payment_type', 'amount'
    ];
}