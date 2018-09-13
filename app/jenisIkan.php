<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class jenisIkan extends Model
{

    protected $table = 'jenisIkan';
    protected $primaryKey = 'idJenisIkan';
    protected $fillable = ['idJenisIkan','jenisIkan'];

    public function ikan() {

    return  $this->hasMany('App\ikan');

    }


    public $timestamps = false;
}
