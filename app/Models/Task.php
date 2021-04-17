<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

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
        'file',
        'start',
        'end',
        'informer',
        'responsable',
        'statu_id',
        'priority_id',
        'type_id',
    ];

    /* Una tarea(task) pertence a un tipo(type) */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /* Una tarea(task) pertence a un status(statu) */
    public function statu()
    {
        return $this->belongsTo(Statu::class);
    }

    /* Una tarea(task) pertenece a una prioridad */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    /* Una tarea(task) pertence a uno o muchos proyectos */
    public function projects()
    {
        return $this->belongsToMany(Project::class)->withTimestamps();
    }

    /* Un tarea tiene muchos comentarios */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); //commentable_id y commentable_type
    }
}
