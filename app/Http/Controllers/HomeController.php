<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\transaksi;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


  public function dashboard(){
if (Auth::User()->level=='1') {
//  $redirectTo = '/dashboardAgen';  // code...
    $notif=transaksi::join('ikan','transaksi.idIkan','=','ikan.idIkan')->where('transaksi.idAgen',Auth::user()->id)->where('statusTransaksi',1)->where('ikan.statusIkan',1)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
  return view('dashboardAgen',compact('count'));
}else if(Auth::User()->level=='2') {
  //$redirectTo = '/dashboardPengusaha';
    $notif= transaksi::where('idPengusaha',Auth::user()->id)->where('statusTransaksi',5)->get();
    $count = $notif->count();
    if ($count==0){
        $kosong = null;
        $count = $kosong;
    }
  return view ('dashboardPengusaha',compact('count'));
  }
  else if(Auth::User()->level=='3') {
    //$redirectTo = '/dashboardPengusaha';
      $notif=transaksi::where('statusTransaksi',4)->get();
      $count = $notif->count();
      if ($count==0){
          $kosong = null;
          $count = $kosong;
      }
    return view ('dashboardAdmin',compact('count'));
    }

  }

}
