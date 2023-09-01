<?php

namespace App\Models\Users;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdPartyUsers extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'third_party_users';

    use Uuid, SoftDeletes;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];


    /**
     * Get the user record associated with the third party user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    protected $fillable = [
        'name',
        'organization',
        'email',
        'phone'
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
