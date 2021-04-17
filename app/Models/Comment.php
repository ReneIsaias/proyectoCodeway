<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'commentable',
        'status',
        'user_id',
    ];

    //cambiar a polimorfica
    public function commentable()
    {
        return $this->morphTo();
    }

    //un commentario pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
