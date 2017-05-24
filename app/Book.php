<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
	use Searchable;
	
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
