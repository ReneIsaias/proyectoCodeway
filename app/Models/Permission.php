<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    /* Un permisos pertence a uno a muchos roles */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /*
        Con este metodo estamos mostrando el slug en vez de mostrar el id del permiso
        esto no permite trabajar con Url's amigables para los usuarios
    */
    /* public function getRouteKeyName()
    {
        return 'slug';
    } */
}
