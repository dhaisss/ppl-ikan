<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class statusTransaksi extends Model
{

    protected $table = 'statusTransaksi';
    protected $primaryKey = 'idStatusTransaksi';
    protected $fillable = ['idStatusTransaksi','statusTransaksi'];

    public function statusTransaksi() {

    return  $this->hasMany('App\transaksi');

    }

    public $timestamps = false;
}
