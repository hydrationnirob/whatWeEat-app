<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'slug',
        'display_name',
        'unit_size',
        'unit_type',
        'Product_Category',
        'Product_Sub_Category',
        'Category_id',
        'bar_code',
        'description',
        'price',
        'image_url',
        'ingredients',
        'brand_id',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function category()
    {
        return $this->belongsTo(categorys::class, 'category_id');
    }

    public function nutrition()
    {
        return $this->hasOne(Nutrition::class, 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    
}