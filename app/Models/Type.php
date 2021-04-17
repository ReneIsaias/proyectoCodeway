<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'types';

    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'status',
    ];

    /* Un tipo(type) tiene muchas tareas(task) */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
