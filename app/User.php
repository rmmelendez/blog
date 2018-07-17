<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'assigned_roles'); //Se agrega el nombre que le dimos a la tabla ya que no utilizamos la convención.
    }

    public function hasRoles(array $roles)
    {
        //dd($this->role); //Sirve para inspeccionar que valor esta devolviendo "role"
        foreach ($roles as $role) 
        
        {
            //dd( (bool) $this->roles->pluck('name')->intersect($role)->count() );

            //Esta forma sustituye al "foreach" de abajo:
            return $this->roles->pluck('name')->intersect($role)->count();

            
            /*foreach ($this->roles as $userRole) 
            {

                if ($userRole->name === $role)
                {
                    return true;
                }

            }

        return false;*/
                
        }

    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

        public function messages()
    {
        //Es decir que un usuario puede "tener varios" mensajes
        return $this->hasMany(Message::class);
    }

}
