<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name'
    ];

    protected $hidden = [
        'user_id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
