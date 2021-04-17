<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'description',
        'birthday',
        'facebook',
        'instagram',
        'github',
        'website',
        'other',
        'status',
        'position_id',
        'user_id',
    ];

    /* Un profile pertence a un usuario */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
