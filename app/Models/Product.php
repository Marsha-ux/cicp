<?php

namespace App\Models;

use App\Observers\ProductObserver;
use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{ 
    use HasImages, HasFactory;
    
    protected $fillable = ['name', 'price','description', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
