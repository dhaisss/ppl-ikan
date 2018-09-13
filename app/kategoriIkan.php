<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class kategoriIkan extends Model
{

    protected $table = 'kategoriIkan';
    protected $primaryKey = 'idKategori';
    protected $fillable = ['idKategori','kategoriIkan'];

    public function ikan() {

    return  $this->hasMany('App\ikan');

    }


    public $timestamps = false;
}
