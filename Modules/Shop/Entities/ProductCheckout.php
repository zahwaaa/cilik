<?php

namespace Modules\Shop\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCheckout extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_buys()
    {
        return $this->hasMany(ProductBuy::class, 'kode', 'kode');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
