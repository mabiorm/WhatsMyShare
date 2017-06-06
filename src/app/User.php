<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SyncableGraphNodeTrait;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected static $graph_node_field_aliases = [
      'id' => 'facebook_user_id'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','facebook_user_id', 'access_token', 'cash', 'invest_score'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'access_token'
    ];

    //retrieve stocks from portfolio for users
    public function stocks(){
      return $this->hasMany('App\Stock','user_id');
    }
}
