<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //start raletions
    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
