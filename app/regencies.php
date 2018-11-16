<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class regencies extends Model
{

    protected $table = 'regencies';
    protected $primaryKey = 'id';
    protected $fillable = ['id','province_id','name'];

    public function provinces() {

        return  $this->belongsTo('App\provinces','province_id');

    }
    public function district() {

        return  $this->hasMany('App\districts');

    }


    public $timestamps = false;
}
