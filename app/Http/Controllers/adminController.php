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
class adminController extends Controller
{


	public function home()
	{
		return view('dashboardAdmin');
	}

	public function profil($id)
	{
		return view('profilAdmin', compact(Auth::user()->id));
	}

	public function pengusaha(Request $request)
{

	$tampil= User::where('level',2)->get();
	return view('daftarPengusahaAdmin',compact('tampil'));
}

public function agen(Request $request)
{

$tampil= User::where('level',1)->get();
return view('daftarAgenAdmin',compact('tampil'));
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
  		return view('dashboardAdmin', compact(Auth::user()->id));
	}

	public function lihatNotif(){
		$tampils=transaksi::where('statusTransaksi',4)->get();
		$jumlah=transaksi::value('jumlahIkan');
		$harga=transaksi::value('hargaIkan');
		$ongkir=transaksi::value('ongkir');
		$total=($jumlah*$harga)+$ongkir;

		return view('notifikasiAdmin',compact('tampils','total','jumlah'));
	}

	public function verifikasi(Request $request, $id){

		$edit=transaksi::find($id);
		$edit->statusTransaksi='6';
		$edit->save();

		$tampils=transaksi::where('statusTransaksi',4)->get();
		$jumlah=transaksi::value('jumlahIkan');
		$harga=transaksi::value('hargaIkan');
		$ongkir=transaksi::value('ongkir');
		$total=($jumlah*$harga)+$ongkir;

		return view('notifikasiAdmin',compact('tampils','total','jumlah'));
	}

	public function transaksi(){
		$tampils= transaksi::whereBetween('statusTransaksi',[3,7])->get();
		return view('transaksiAdmin',compact('tampils'));
		}

}
