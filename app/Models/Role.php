<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
        'fullAccess',
        'status',
        'responsable',
        'range',
        'asignament',
    ];

    /* Un rol pertence a uno o muchos usuarios */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /* Un rol pertenece a uno a muchos permisos */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
