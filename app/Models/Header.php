<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model

{
	public $timestamps = false;
    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function details()
	{
		return $this->hasMany(Detail::class);
	}
}
