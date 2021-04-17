<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nameUser',
        'firstLastname',
        'secondLastname',
        'phone',
        'name',
        'email',
        'corporative',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Funcion que obtiene la imagen de perfil de un usuario */
    public function adminlte_image()
    {
        $profile = Profile::where('user_id', $this->id)->first();

        $photo = 'storage/users/' . $profile->avatar;

        return $photo;
    }

    /* Funcion que obtiene el rol de un usuario */
    public function adminlte_desc()
    {
        $user = User::find($this->id);
        if (isset($user->roles[0]->name)) {
            $role  = $user->roles[0]->name;
        } else {
            $role  = "No tiene rol";
        }

        if (isset($user->departaments[0]->name)) {
            $departament  = $user->departaments[0]->name;
        } else {
            $departament  = "No tiene departamento";
        }

        $info = strtoupper($departament) . '  -  ' . strtoupper($role);
        return $info;
        /* return $departament . '-' . $role; */
    }

    /* Función que obtiene la ruta del perfil de un usuario */
    public function adminlte_profile_url()
    {
        return 'profile';
    }

    /* Un usuario tiene un solo perfil */
    public function profile()
    {
        /* $profile = Profile::where('user_id', $this->id)->firts(); */

        return $this->hasOne(Profile::class);
    }

    /* Un usuario tiene una posisición a travez de Profile(perfil) */
    public function position()
    {
        return $this->hasOneThrough(Position::class, Profile::class);
    }

    /* Un usuario tiene muchos comentarios */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /* Un usuario pertence a uno o muchos proyectos */
    public function projects()
    {
        return $this->belongsToMany(Project::class)->withTimestamps();
    }

    /* Un usuario pertence a uno o muchos departamentos */
    public function departaments()
    {
        return $this->belongsToMany(Departament::class)->withTimestamps();
    }

    /* Un usuario le pertencen una o muchas vaciones*/
    public function holidays()
    {
        return $this->belongsToMany(Holiday::class)->withTimestamps();
    }

    /* Un usuario realiza uno o muchos eventos */
    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    /* Un usuario pertenece a uno o muchos grupos */
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    /* Un usuario pertenece a uno o muchos roles */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    //Funcion que verifica si el usuario tiene o no permiso que se le asigne
    public function havePermission($permiso)
    {
        foreach ($this->roles as $role) {
            if ($role['fullAccess'] == "yes") {
                return true;
            }
            foreach ($role->permissions as $perm) {
                if ($perm->slug == $permiso) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getRole()
    {
        $user = User::find($this->id);
        if (isset($user->roles[0]->name)) {
            $role  = $user->roles[0]->name;
        }
        return $role;
    }
}
