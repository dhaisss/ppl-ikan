<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ikan extends Model
{

    protected $table = 'ikan';
    protected $primaryKey = 'idIkan';
    protected $fillable = ['idIkan','tanggalPenawaran','idAgen','jenisIkan','namaIkan','jumlahIkan','hargaIkan','statusIkan','kategoriIkan','fotoIkan'];

    public function pemilik() {

    return  $this->belongsTo('App\User','idAgen');

    }

public function pembeli() {

    return  $this->belongsTo('App\User','pengusaha');

}

    public function jenis_ikan() {

    return  $this->belongsTo('App\jenisIkan','jenisIkan');

    }

    public function kategori() {

    return  $this->belongsTo('App\kategoriIkan','kategoriIkan');

    }

    public function status_penawaran(){
      return $this->belongsTo('App\statusPenawaran','statusIkan');
    }

    public function trans(){
      return $this->hasMany('App\transaksi');
    }


    public $timestamps = false;
}
