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


	public function agend()
	{ $notif=transaksi::where('idAgen',Auth::user()->id)->where('statusTransaksi',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('dashboardAgen',compact('count'));
	}

  public function view($id)
  {
		$tampil= ikan::where('idAgen',$id)->orderBy('tanggalPenawaran','desc')->get() ;
      $notif=transaksi::where('idAgen',Auth::user()->id)->where('statusTransaksi',1)->get();
      $count = $notif->count();
      if ($count==0){
          $kosong = null;
          $count = $kosong;
      }
    return view ('daftarPenawaran',compact('tampil','count'));
  }

	public function view2()
	{
		$tampil= ikan::Where('statusIkan',1)->get();
        $notif=transaksi::where('statusTransaksi',4)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view ('daftarPenawaranAdmin',compact('tampil','count'));
	}

	// public function notif($id)
	// {
	// 	$tampils= ikan::where('idAgen',$id)->where('statusTransaksi',1)->get();
	// 	$tampils2= ikan::where('idAgen',$id)->where('statusTransaksi',3)->get();
  //
	// 	return view ('notifikasiAgen',compact('tampils','tampils2'));
	// }


	public function penawaran()
	{  $notif=transaksi::where('idAgen',Auth::user()->id)->where('statusTransaksi',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('buatPenawaran',compact('count'));
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
        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $file->move(('ikan/'),$file->getClientOriginalName());

		$insert = ([
      $today = Carbon::now(),
			'tanggalPenawaran' => $today,
			'idAgen' => $request->agen,
			'jenisIkan' => $request->jenisIkan,
			'namaIkan' => $request->namaIkan,
			'jumlahIkan' => $request->jumlahIkan,
			'hargaIkan' => $request->hargaIkan,
            'kategoriIkan' => $request->kategoriIkan,
            $fileFt       = $request->file('foto'),
            $ft   = $fileFt->getClientOriginalName(),
            'fotoIkan'=> $ft,

			]);
		ikan::create($insert);
		$tampil= ikan::where('idAgen',$request->agen)->orderBy('tanggalPenawaran','desc')->get() ;
        $notif=transaksi::where('idAgen',Auth::user()->id)->where('statusTransaksi',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }

		return view ('daftarPenawaran',compact('tampil','count'));
	}




	public function editPenawaran($id){
		$edit= ikan::find($id);
        $notif=transaksi::where('idAgen',Auth::user()->id)->where('statusTransaksi',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('daftarPenawaranUbah',compact('edit','count'));
	}

	public function updatePenawaran(Request $request, $id){

		$edit=ikan::find($id);
		$edit->statusIkan= $request->status;
		$edit->jumlahIkan= $request->jumlah;
		$edit->hargaIkan= $request->harga;
        $ft = $request->file('foto');
        $statusIkan = $request->status;
        if ($ft != null){
            // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
            $file       = $request->file('foto');
            $fileName   = $file->getClientOriginalName();
            $file->move(('ikan/'),$file->getClientOriginalName());

            $edit->fotoIkan= $fileName;
        }
        if ($statusIkan==2){
            $edit->jumlahIkan= 0;
        }

		$edit->save();

        $notif=transaksi::where('idAgen',Auth::user()->id)->where('statusTransaksi',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return redirect('/dashboardAgen',compact('count'));
	}










}
