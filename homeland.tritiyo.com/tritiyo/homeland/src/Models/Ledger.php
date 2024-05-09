<?php

namespace Tritiyo\Homeland\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $table ="ledgers";
    protected $fillable = [
        'name', 'description', 'type'
    ];
}
