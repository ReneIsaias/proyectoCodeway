<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departament extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departaments';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'responsable',
        'user_id',
    ];

    /* Un departamento pertence a uno o muchos usuarios */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /* Un departamento pertenece a uno o muchos grupos */
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    /* Un departamento tiene muchos comentarios */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); //commentable_id y commentable_type
    }
}
