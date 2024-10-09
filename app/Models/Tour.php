<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    public $timestamps = false;

    function category(){
        return $this->belongsTo(Category::class);
    }

  /*   protected function image(): Attribute{
        return Attribute::make(
            get: fn($value) => 'Hello'
        );
    }*/
    
    public function getImageAttribute($value)
    {
        return $value ? $value : '/images/no-image.png';
    }


    public function getShortDescriptionAttribute($value)
    {
        return Str::words($this->attributes['description'], 1, ' ...');
    }
    

}



/* 
get  після отримання даних з БД перед виводом (можна вигадувати нові властивості)
set  перед записом в БД 
*/
