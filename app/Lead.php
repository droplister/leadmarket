<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name', 'amount', 'income', 'city', 'state', 'zipcode', 'sold',
        'sha256', 'tx_id',
    ];

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
}
