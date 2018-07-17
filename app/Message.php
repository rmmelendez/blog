<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['nombre','email','telefono','mensaje'];

	public function user()

	{
		//El mensaje pertenece a un usuario:
		return $this->belongsTo(User::class);
	}

}

