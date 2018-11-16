<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ikan;
use App\jenis;
use Auth;
use App\transaksi;
use App\User;
use App\regencies;
use App\districts;
use App\provinces;

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
	    $provinces = provinces::all();
		return view('profilAdmin', compact(Auth::user()->id,'provinces'));
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

	public function updateProfilAdmin(Request $request){


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
            $edit->districts= $kec;

        }
        else if ($kab!=Auth::user()->kota->name){
            $edit->regencies= $request->regencies;

        }
        else if ($prov!=null){
            $edit->provinces= $request->provinces;
        }
        $edit->save();
        return view('dashboardAdmin', compact(Auth::user()->id));
	}

	public function lihatNotif(){
		$tampils=transaksi::where('statusTransaksi',4)->get();
        $tampil=transaksi::where('statusTransaksi',8)->get();
		$jumlah=transaksi::value('jumlahIkan');
		$harga=transaksi::value('hargaIkan');
		$ongkir=transaksi::value('ongkir');
		$total=($jumlah*$harga)+$ongkir;

		return view('notifikasiAdmin',compact('tampils','total','jumlah','tampil'));
	}

	public function verifikasi(Request $request, $id){

		$edit=transaksi::find($id);
		$edit->statusTransaksi='6';
		$edit->save();

		$tampils=transaksi::where('statusTransaksi',4)->get();
		$jumlah=transaksi::value('jumlahIkan');
		$harga=transaksi::value('hargaIkan');
		$ongkir=transaksi::value('ongkir');
        $tampil=transaksi::where('statusTransaksi',8)->get();
		$total=($jumlah*$harga)+$ongkir;

		return view('notifikasiAdmin',compact('tampils','total','tampil','jumlah'));
	}

	public function transaksi(){
		$tampils= transaksi::whereBetween('statusTransaksi',[3,7])->get();
		return view('transaksiAdmin',compact('tampils'));
		}
    public function getRegencies($id) {
        $regencies = regencies::where("province_id",$id)->pluck("name","id");

        return json_encode($regencies);
    }

    public function getDistricts($id) {
        $districts = districts::where("regency_id",$id)->pluck("name","id");

        return json_encode($districts);
    }

    public function getVillages($id) {
        $villages = villages::where("district_id",$id)->pluck("name","id");

        return json_encode($villages);
    }

}
