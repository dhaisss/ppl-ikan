<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ikan;
use App\jenisIkan;
use Auth;
use App\transaksi;
use App\User;

use Carbon\Carbon;
/**
*
*/
class ikanController extends Controller
{


	public function home()
	{
		return view('dashboardAgen');
	}

  public function view($id)
  {
    $tampil= ikan::where('idAgen',$id)->get() ;

    return view ('daftarPenawaran',compact('tampil'));
  }

	public function view2()
	{
		$tampil= ikan::all() ;
		return view ('daftarPenawaranAdmin',compact('tampil'));
	}

	// public function notif($id)
	// {
	// 	$tampils= ikan::where('idAgen',$id)->where('statusTransaksi',1)->get();
	// 	$tampils2= ikan::where('idAgen',$id)->where('statusTransaksi',3)->get();
  //
	// 	return view ('notifikasiAgen',compact('tampils','tampils2'));
	// }


	public function penawaran()
	{
		return view('buatPenawaran');
	}

  public function agend()
	{
		return view('dashboardAgen');
	}
	// public function lihatTransaksi($id)
	// {
	// 	$tampils= ikan::where('idAgen',$id)->where('statusTransaksi',4)->get();
	// 	return view('transaksiAgen',compact('tampils'));
  //
	// }

	// public function profil($id)
	// {
	// 	return view('profilAgen', compact(Auth::user()->id));
  //
	// }

	public function insertPenawaran(Request $request)
	{

		$insert = ([
      $today = Carbon::now(),
			'tanggalPenawaran' => $today,
			'idAgen' => $request->agen,
			'jenisIkan' => $request->jenisIkan,
			'namaIkan' => $request->namaIkan,
			'jumlahIkan' => $request->jumlahIkan,
			'hargaIkan' => $request->hargaIkan,
      'kategoriIkan' => $request->kategoriIkan,

			]);
		ikan::create($insert);
		return redirect('/dashboardAgen');
	}



	public function editPenawaran($id){
		$edit= ikan::find($id);
		return view('daftarPenawaranUbah',compact('edit'));
	}

	public function updatePenawaran(Request $request, $id){

		$edit=ikan::find($id);
		$edit->statusIkan= $request->status;
		$edit->save();

		return redirect('/dashboardAgen');
	}

	// public function terimaTransaksi($id)
	// {
	// 	$edit= ikan::find($id);
	// 	return view('terima',compact('edit'));
	// }
  //
	// public function updateTransaksi(Request $request, $id){
  //
	// 	$edit=ikan::find($id);
	// 	$edit->statusTransaksi='3';
	// 	$edit->ongkir=$request->ongkir;
	// 	$edit->save();
  //
	// 	return redirect()->back();
	// }
  //
	// public function tolakTransaksi($id)
	// {
	// 	$edit= ikan::find($id);
	// 	return view('tolak',compact('edit'));
	// }
  //
	// public function updateTolakTransaksi(Request $request, $id){
  //
	// 	$edit=ikan::find($id);
	// 	$edit->statusTransaksi='2';
	// 	$edit->save();
  //
	// 	return redirect()->back();
	// }

}
