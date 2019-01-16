<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_id', 'user_id', 'products', 'amount',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
