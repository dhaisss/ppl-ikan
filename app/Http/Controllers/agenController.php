<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ikan;
use App\jenis;
use Auth;
use App\transaksi;
use App\User;

use Carbon\Carbon;
/**
*
*/
class agenController extends Controller
{


	public function home()
	{
		return view('dashboardAgen');

	}

	public function profil($id)
	{
		return view('profilAgen', compact(Auth::user()->id));

	}

	public function pengusaha(Request $request)
{

	$tampil= User::where('level',2)->get();
	return view('daftarPengusaha',compact('tampil'));
}

public function viewNotif($id){
	$notif=transaksi::where('idAgen',$id)->where('statusTransaksi',1)->get();
	return view ('agenNotifikasi',compact('notif'));
}

	public function updateProfil(Request $request){

		$prof=Auth::user();
		$prof->name= $request->name;
		$prof->email= $request->email;
		$prof->kecamatan= $request->kecamatan;
		$prof->kabupaten= $request->kabupaten;
		$prof->provinsi= $request->provinsi;
		$prof->noRek= $request->noRek;

  		$prof->save();
  		return view('dashboardAgen', compact(Auth::user()->id));
	}

	public function terimaTransaksi($id)
{
	$edit= transaksi::find($id);

	return view('terima',compact('edit'));
}

public function updateTransaksi(Request $request, $id){

	$edit=transaksi::find($id);

	$edit->statusTransaksi='5';
	$edit->ongkir=$request->ongkir;

	$edit->save();

	$notif=transaksi::where('idAgen',$id)->where('statusTransaksi',1)->get();
	return view ('agenNotifikasi',compact('notif'));
}

public function updateTransaksi2(Request $request, $id){
	$edit2=ikan::find($id);
  $jumlahAwal=ikan::where('idIkan',$id)->value('jumlahAwal');
	$jumlahKedua=transaksi::where('idIkan',$id)->value('jumlahKedua');
	$jumlahSekarang=($jumlahAwal-$jumlahKedua);
	dd ($jumlahSekarang);
	$edit2->jumlahIkan=($jumlahSekarang);
	$edit2->save();
}

public function tolakTransaksi($id)
{
	$edit= transaksi::find($id);
	return view('tolak',compact('edit'));
}

public function updateTolakTransaksi(Request $request, $id){

	$edit=transaksi::find($id);
	$edit->statusTransaksi='2';
	$edit->save();

	$notif=transaksi::where('idAgen',$id)->where('statusTransaksi',1)->get();
	return view ('agenNotifikasi',compact('notif'));
}




}
