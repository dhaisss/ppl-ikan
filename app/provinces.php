<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class provinces extends Model
{

    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name'];

    public function regency() {

        return  $this->hasMany('App\regencies');

    }


    public $timestamps = false;
}
