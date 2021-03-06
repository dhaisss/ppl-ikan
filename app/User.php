<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','alamat','villages','level','noRek','noTelepon','foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lev() {
    return $this-> belongsTo('App\level','level');
    }

    public function Desa() {
        return $this-> belongsTo('App\villages','villages');
    }


    public function ikan() {
      return $this-> hasMany('App\ikan');
    }

    public function pengusaha() {
      return $this-> hasMany('App\transaksi');
    }
  }
