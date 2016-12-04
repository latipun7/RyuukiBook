<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    	'category_id', 'title', 'desc', 'author', 'publisher', 'price'
    ];

    public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function items()
	{
		return $this->hasMany('App\Item');
	}
}
