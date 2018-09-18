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
		$tampil= ikan::where('idAgen',$id)->orderBy('tanggalPenawaran','desc')->get() ;
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


	protected function validator(array $data)
	{
			return Validator::make($data, [
						'namaIkan'=> 'required',
						'jumlahIkan'=> 'required|is_integer|max:10',
						'hargaIkan'=> 'required|is_integer|max:20',
			]);
	}
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
		$tampil= ikan::where('idAgen',$request->agen)->orderBy('tanggalPenawaran','desc')->get() ;

    return view ('daftarPenawaran',compact('tampil'));
	}




	public function editPenawaran($id){
		$edit= ikan::find($id);
		return view('daftarPenawaranUbah',compact('edit'));
	}

	public function updatePenawaran(Request $request, $id){

		$edit=ikan::find($id);
		$edit->statusIkan= $request->status;
		$edit->jumlahIkan= $request->jumlah;
		$edit->hargaIkan= $request->harga;
		$edit->save();

		return redirect('/dashboardAgen');
	}



	public function profil($id)
	{
		return view('profilAgen', compact(Auth::user()->id));

	}








}
