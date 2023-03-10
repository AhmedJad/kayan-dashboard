<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualStock extends Model
{
    use HasFactory;

    protected $guarded = [];

    //start raletions
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
