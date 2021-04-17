<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups';

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
    ];

    /* Un grupo pertenece a uno o muchos departamentos */
    public function departaments()
    {
        return $this->belongsToMany(Departament::class)->withTimestamps();
    }

    /* Un usuario pertenece a uno o muchos usuario */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /* Un grupo tiene muchos comentarios */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); //commentable_id y commentable_type
    }
}
