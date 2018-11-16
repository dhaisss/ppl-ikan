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
		return view('dashboardAgen');

	}

	public function profil($id)
	{
        $provinces = provinces::all();
		return view('profilAgen', compact(Auth::user()->id,'provinces'));

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
	$tampils=transaksi::where('idAgen',$id)->where('statusTransaksi',7)->get();
	return view ('agenNotifikasi',compact('notif','transaksi','tampils'));
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
