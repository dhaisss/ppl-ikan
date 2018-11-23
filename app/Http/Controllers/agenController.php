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
use App\provinces;

use Carbon\Carbon;
/**
*
*/
class agenController extends Controller
{


	public function home()
	{
        $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('dashboardAgen'.compact('count'));

	}

	public function profil($id)
	{
        $provinces = provinces::all();
        $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
		return view('profilAgen', compact(Auth::user()->id,'provinces','count'));

	}

	public function pengusaha(Request $request)
{

	$tampil= User::where('level',2)->get();
    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
	return view('daftarPengusaha',compact('tampil','count'));
}

public function viewNotif($id){
	$notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',$id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
	$tampils=transaksi::where('idAgen',$id)->where('statusTransaksi',7)->get();
	return view ('agenNotifikasi',compact('notif','tampils'));
}

public function transaksi($id){
	$tampils= transaksi::where('idAgen',$id)->where('statusTransaksi',6)->get();
    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
	return view('transaksiAgen',compact('tampils','count'));
	}

	public function telahDikirim(Request $request, $id){

		$edit=transaksi::find($id);
		$edit->statusTransaksi='7';
		$edit->save();


		return redirect()->back();

	}

	public function updateProfil(Request $request){

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
        $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
        $count = $notif->count();
        if ($count==0){
            $kosong = null;
            $count = $kosong;
        }
        return view('dashboardAgen', compact(Auth::user()->id,'count'));
	}

	public function terimaTransaksi($id)
{
	$transaksi= transaksi::find($id);
    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
    $tampils=transaksi::where('idAgen',$id)->where('statusTransaksi',7)->get();
	return view('terima',compact('transaksi','count','tampils'));
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

    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
	$tampils=transaksi::where('idAgen',$id)->where('statusTransaksi',7)->get();

    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
	return view ('agenNotifikasi',compact('notif','transaksi','tampils','count'));
}

public function tolakTransaksi($id)
{
	$edit= transaksi::find($id);
    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
	return view('tolak',compact('edit','count'));
}

public function updateTolakTransaksi(Request $request, $id){

	$edit=transaksi::find($id);
	$edit->statusTransaksi='2';
	$edit->save();

    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
    $tampils=transaksi::where('idAgen',$id)->where('statusTransaksi',7)->get();
	return view ('agenNotifikasi',compact('notif','count','tampils'));
}




}
