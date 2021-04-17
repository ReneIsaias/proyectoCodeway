<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'start',
        'end',
        'color',
        'textColor',
        'status',
    ];

    /* Un evento pertence a uno o muchos usuarios */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
