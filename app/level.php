<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class level extends Model
{

    protected $table = 'level';
    protected $primaryKey = 'idLevel';
    protected $fillable = ['idLevel','level'];

    public function levels() {

    return  $this->hasMany('App\User');
    }
    public $timestamps = false;
}
