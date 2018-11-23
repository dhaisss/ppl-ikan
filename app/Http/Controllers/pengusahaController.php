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
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('dashboardPengusaha',compact('count'));
	}

	public function view(Request $request)
	{
		$tampil= ikan::where('statusIkan',1)->get();
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('daftarPenawaranPengusaha',compact('tampil','count'));
	}
	public function beliPenawaran($id){
	$beli= ikan::find($id);
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
	return view('beliIkan',compact('beli','count'));
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
    $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
    return view('dashboardPengusaha', compact(Auth::user()->id,'count'));

}


	public function agen(Request $request)
	{
		$tampil= User::where('level',1)->get();
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('daftarAgenPengusaha',compact('tampil','count'));
	}

	public function profil($id)
	{
		$prof= User::where('id',$id);
		$provinces = provinces::all();
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('profilPengusaha',compact('provinces','count'));
	}
	public function updateProfilPengusaha(Request $request){


        $edit=Auth::user();
        $edit->name= $request->name;
        $edit->email= $request->email;
        $edit->noRek= $request->noRek;
        $edit->noTelepon= $request->noTelepon;
        $ft = $request->file('foto');
        $kel= $request->villages;





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
        $edit->save();
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
  		return view('dashboardPengusaha', compact(Auth::user()->id,'count'));
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

        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }

		return view('lanjut',compact('edit','total','count'));
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
        $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('/dashboardPengusaha',compact('count'));
		}

		public function transaksi($id){
			$tampils= transaksi::where('idPengusaha',$id)->whereBetween('statusTransaksi',[3,7])->get();
			$tampils2= transaksi::where('idPengusaha',$id)->where('statusTransaksi',[7])->get();
            $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
            $count = $notif->count();
            if ($count==0){
                $kosong = null;
                $count = $kosong;
            }
			return view('transaksiPengusaha',compact('tampils','tampils2','count'));
			}

			public function telahDiterima(Request $request, $id){

				$edit=transaksi::find($id);
				$edit->statusTransaksi='8';
				$edit->save();


				return redirect()->back();

			}

}
