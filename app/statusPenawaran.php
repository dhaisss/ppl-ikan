<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class statusPenawaran extends Model
{
    protected $table = 'statusIkan';
    protected $primaryKey = 'idStatusIkan';
    protected $fillable = ['idStatusIkan','statusIkan'];

    public function status(){
       return $this-> hasMany('App\ikan');
    }

    public $timestamps = false;
}
