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


}
