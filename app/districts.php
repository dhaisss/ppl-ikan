<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class districts extends Model
{

    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $fillable = ['id','regency_id','name'];

    public function regencies() {

        return  $this->belongsTo('App\regencies','regency_id');

    }

    public function village() {

        return  $this->hasMany('App\villages');

    }


    public $timestamps = false;
}
