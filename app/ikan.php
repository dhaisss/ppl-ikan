<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ikan extends Model
{

    protected $table = 'ikan';
    protected $primaryKey = 'idIkan';
    protected $fillable = ['idIkan','tanggalPenawaran','idAgen','jenisIkan','namaIkan','jumlahIkan','hargaIkan','statusIkan','kategoriIkan'];

    public function pemiliks() {

    return  $this->belongsTo('App\User','idAgen');

    }

    public function jenisIkan() {

    return  $this->belongsTo('App\jenisIkan','jenisIkan');

    }

    public function kategoriIkan() {

    return  $this->belongsTo('App\kategoriIkan','kategoriIkan');

    }

    public function statusPenawaran(){
      return $this->belongsTo('App/statusPenawaran','statusIkan');
    }


    public $timestamps = false;
}
