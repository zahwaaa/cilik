<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
