<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'name', 'photo', 'description', 'category_id', 'price',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
