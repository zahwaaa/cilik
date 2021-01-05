<?php

namespace Modules\Shop\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductBuy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_checkout()
    {
        return $this->belongsTo(ProductCheckout::class, 'kode', 'kode');
    }
}
