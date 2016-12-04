<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'user_id', 'phone', 'street', 'city', 'province', 'country', 'postal_code', 'birthday'
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
