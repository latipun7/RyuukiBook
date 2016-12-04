<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'book_id', 'order_id', 'qty', 'total_price'
    ];

    public function book()
	{
		return $this->belongsTo('App\Book');
	}

	public function order()
	{
		return $this->belongsTo('App\Order');
	}
}
