<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class villages extends Model
{

    protected $table = 'villages';
    protected $primaryKey = 'id';
    protected $fillable = ['id','district_id','name'];

    public function districts() {

        return  $this->belongsTo('App\districts','district_id');

    }


    public $timestamps = false;
}
