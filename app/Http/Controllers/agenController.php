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
	$tampils=transaksi::where('idAgen',$id)->where('statusTransaksi',7)->get();
	return view ('agenNotifikasi',compact('notif','tampils'));
}

public function transaksi($id){
	$tampils= transaksi::where('idAgen',$id)->where('statusTransaksi',6)->get();
	return view('transaksiAgen',compact('tampils'));
	}

	public function telahDikirim(Request $request, $id){

		$edit=transaksi::find($id);
		$edit->statusTransaksi='7';
		$edit->save();


		return redirect()->back();

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
	$transaksi= transaksi::find($id);
	return view('terima',compact('transaksi'));
}

public function updateTransaksi(Request $request, $id){
	$transaksi=transaksi::find($id);
	$transaksi->transaksi->jumlahIkan -= $transaksi->jumlahIkan;

	if ($transaksi->transaksi->jumlahIkan==0) {
		$transaksi->transaksi->statusIkan=2;
	}
	$transaksi->transaksi->update();

	$transaksi->statusTransaksi='5';
	$transaksi->ongkir=$request->ongkir;

	$transaksi->save();

	$notif=transaksi::where('idAgen',$id)->where('statusTransaksi',1)->get();
	return view ('agenNotifikasi',compact('notif','transaksi'));
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
