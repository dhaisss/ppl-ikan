<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class transaksi extends Model
{

    protected $table = 'transaksi';
    protected $primaryKey = 'idTransaksi';
    protected $fillable = ['idTransaksi','idIkan','idAgen','idPengusaha','tanggalBeli','statusTransaksi','ongkir','buktiTransfer','jumlahIkan','hargaIkan'];

    public function transaksi() {

    return  $this->belongsTo('App\ikan','idIkan');

    }

    public function status() {

    return  $this->belongsTo('App\statusTransaksi','statusTransaksi');

    }

    public function pembeli_ikan() {

    return  $this->belongsTo('App\User','idPengusaha');

    }
    
    public function pemilik() {

    return  $this->belongsTo('App\User','idAgen');

    }


    public $timestamps = false;
}
