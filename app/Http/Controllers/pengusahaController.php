<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ikan;

use Auth;
use App\User;
use App\transaksi;

use Carbon\Carbon;
/**
*
*/
class pengusahaController extends Controller
{


	public function home()
	{
		return view('dashboardPengusaha');
	}

	public function view(Request $request)
	{
		$tampil= ikan::where('statusIkan',1)->get();
		return view('daftarPenawaranPengusaha',compact('tampil'));
	}
	public function beliPenawaran($id){
	$beli= ikan::find($id);
	return view('beliIkan',compact('beli'));
}

public function lanjutBeli(Request $request)
{

	$insert = ([
		$today = Carbon::now(),
		'tanggalBeli' => $today,
		'idIkan' => $request->id,
		'jumlahIkan' => $request->jumlahIkan,
		'hargaIkan' => $request->hargaIkan,
		'idPengusaha'=>$request->user1,
		'idAgen'=>$request->agen1,


	]);
	transaksi::create($insert);
	return redirect('/dashboardPengusaha');
}

	// public function lihatTransaksi($id)
	// {
	// 	$tampils= transaksi::where('pengusaha',$id)->where('status',4)->get();
	// 	return view('transaksiPengusaha',compact('tampils'));
  //
	// }

	public function agen(Request $request)
	{
		$tampil= User::where('level',1)->get();
		return view('daftarAgenPengusaha',compact('tampil'));
	}

	public function profil($id)
	{
		$prof= User::where('id',$id);
		$provinces = provinces::all();
		return view('profilPengusaha',compact('provinces'));
	}
	public function updateProfilPengusaha(Request $request){


        $edit=Auth::user();
        $edit->name= $request->name;
        $edit->email= $request->email;
        $edit->noRek= $request->noRek;
        $edit->noTelepon= $request->noTelepon;
        $ft = $request->file('foto');
        $kel= $request->villages;
        $kec= $request->districts;
        $kab= $request->regencies;
        $prov= $request->provinces;



        if ($ft != null){
            // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
            $file       = $request->file('foto');
            $fileName   = $file->getClientOriginalName();
            $file->move(('profil/'),$file->getClientOriginalName());

            $edit->foto= $fileName;
        }
        else if ($kel!=Auth::user()->desa->name){
            $edit->villages= $request->villages;

        }
        else if ($kec!=Auth::user()->kecamatan->name){
            $edit->districts= $request->districts;

        }
        else if ($kab!=Auth::user()->kota->name){
            $edit->regencies= $request->regencies;

        }
        else if ($prov!=null){
            $edit->provinces= $request->provinces;
        }
        $edit->save();
  		return view('dashboardPengusaha', compact(Auth::user()->id));
	}


	public function notif($id)
	{
		$tampils= transaksi::where('idPengusaha',$id)->where('statusTransaksi',5)->get();
		$tampils2= transaksi::where('idPengusaha',$id)->where('statusTransaksi',2)->get();
		return view('notifikasiPengusaha',compact('tampils','tampils2'));

	}
	public function lanjutkanTransaksi($id){
		$edit= transaksi::where('idTransaksi',$id)->where('statusTransaksi',5)->first();
		$jumlah=transaksi::where('idTransaksi',$id)->value('jumlahIkan');
		$harga=transaksi::where('idTransaksi',$id)->value('hargaIkan');
		$ongkir=transaksi::where('idTransaksi',$id)->value('ongkir');
		$total=($jumlah*$harga)+$ongkir;

		return view('lanjut',compact('edit','total'));
	}

	public function konfirmTransaksi(Request $request, $id){
		$edit= transaksi::find($id);
		$edit->statusTransaksi= '4';

		// Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $file->move(('image/'),$file->getClientOriginalName());

        $edit->buktiTransfer = $fileName;
		$edit->save();

		return redirect('/transaksiPengusaha/Auth::user()->id');
		}

		public function transaksi($id){
			$tampils= transaksi::where('idPengusaha',$id)->whereBetween('statusTransaksi',[3,7])->get();
			$tampils2= transaksi::where('idPengusaha',$id)->where('statusTransaksi',[7])->get();
			return view('transaksiPengusaha',compact('tampils','tampils2'));
			}

			public function telahDiterima(Request $request, $id){

				$edit=transaksi::find($id);
				$edit->statusTransaksi='8';
				$edit->save();


				return redirect()->back();

			}
	// public function beliPenawaran($id){
	// 	$beli= ikan::find($id);
	// 	return view('beliIkan',compact('beli'));
	// }

	// public function updateBeli(Request $request, $id){
  //
	// 	$beli=ikan::find($id);
	// 	$beli->statusTransaksi='1';
	// 	$beli->status='2';
	// 	$beli->pengusaha=$request->user1;
	// 	$beli->tanggalBeli=$request->tanggalBeli;
	// 	$beli->save();
	// 	return redirect()->back();
  //
	// }

	// public function lanjutkanTransaksi($id){
	// 	$edit= ikan::where('idPenawaran',$id)->where('statusTransaksi',3)->first();
	// 	$jumlah=ikan::where('idPenawaran',$id)->value('jumlahIkan');
	// 	$harga=ikan::where('idPenawaran',$id)->value('hargaIkan');
	// 	$ongkir=ikan::where('idPenawaran',$id)->value('ongkir');
	// 	$total=($jumlah*$harga)+$ongkir;
	// 	return view('lanjut',compact('edit','total'));
	// }

	// public function konfirmTransaksi(Request $request, $id){
	// 	$edit= ikan::find($id);
	// 	$edit->statusTransaksi= '4';

		// Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
    //     $file       = $request->file('bukti');
    //     $fileName   = $file->getClientOriginalName();
    //     $request->file('bukti')->move("image/", $fileName);
    //
    //     $edit->bukti = $fileName;
		// $edit->save();
    //
		// return redirect('/transaksiPengusaha/Auth::user()->id');
		// }



	// public function transaksi($id){
	// 	$tampils= ikan::where('pengusaha',$id)->where('statusTransaksi',4)->get();
  //
	// 	return view('transaksiPengusaha',compact('tampils'));
	// 	}


	// public function hitung() {
	// 	$hargas=ikan::all();
 	// 	$hargamin=ikan::orderBy('hargaIkan','ASC')->limit(1)->value('hargaIkan');
	// 	$prices=array();
	// 	$result=array();
	// 	$a=0;
	// 	foreach ($hargas as $harga) {
	// 		$prices[$a]=$harga->hargaIkan;
	// 		$result[$a]=$prices[$a]/$hargamin;
	// 		$a++;
	// 	}
  //
	// 	$jumlahs=ikan::all();
	// 	$jumlahmax=ikan::orderBy('jumlahIkan','DESC')->limit(1)->value('jumlahIkan');
	// 	$totals=array();
	// 	$result2=array();
	// 	$b=0;
	// 	foreach ($jumlahs as $jumlah) {
	// 		$totals[$b]=$jumlah->jumlahIkan;
	// 		$result2[$b]=$totals[$b]/$jumlahmax;
	// 		$b++;
	// 	}
  //
	// 	$jeniss=ikan::all();
	// 	$jenismin=ikan::orderBy('jenisIkan','ASC')->limit(1)->value('jenisIkan');
	// 	$types=array();
	// 	$result3=array();
	// 	$c=0;
	// 	foreach ($jeniss as $jenis) {
	// 		$types[$c]=$jenis->jenisIkan;
	// 		$result3[$c]=$types[$c]/$jenismin;
	// 		$c++;
	// 	}
  //
	// 	$semua=ikan::all();
	// 	$results=array();
	// 	$d=0;
	// 	foreach ($semua as $sem) {
	// 		$results[$d]=($result[$d]*0.4) +($result2[$d]*0.4 )+($result3[$d]*0.2);
	// 		$d++;
  //
	// 	}
  //
	// 	 $e=0;
	// 	foreach ($results as $tes) {
	// 		$test=ikan:: findOrFail($e+1);
	// 		$test->totalSAW=$results[$e];
	// 		$e++;
	// 		$test->save();
	// 	}
  //
	// 	$tampil=ikan::orderBy('totalSAW','DESC')->where('status',1)->get();
  //
 	// 	return view('daftarPenawaranPengusaha',compact('tampil'));
  //
  //
	// }
}
