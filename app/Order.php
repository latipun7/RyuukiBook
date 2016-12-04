<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id', 'subtotal', 'tax', 'total_price', 'invoice'
    ];

    public function items()
	{
		return $this->hasMany('App\Item');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
