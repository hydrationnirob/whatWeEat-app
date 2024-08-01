<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorys extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'Description', 'icon_url'
    ];
     
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    

    

    
    



}
