<?php

namespace App\Models\Users;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class KoanUsers extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'koan_users';

    use Uuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];


    /**
     * Get the user record associated with the koan user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
