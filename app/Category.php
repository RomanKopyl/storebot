<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'products',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
