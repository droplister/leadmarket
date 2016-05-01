<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name', 'email', 'income', 'city', 'state', 'zipcode', 'sold',
        'sha256', 'tx_id',
    ];

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }

    public function scopeForSale($query)
    {
        return $query->where('sold', 0);
    }

    public function scopeSellable($query)
    {
        return $query->where('sold', 0)->whereNotNull('sha256')->whereNotNull('tx_id');
    }
}
