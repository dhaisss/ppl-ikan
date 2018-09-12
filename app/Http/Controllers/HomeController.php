<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
  return view('dashboardAgen');
}else if(Auth::User()->level=='2') {
  //$redirectTo = '/dashboardPengusaha';
  return view ('dashboardPengusaha');
  }
  else if(Auth::User()->level=='3') {
    //$redirectTo = '/dashboardPengusaha';
    return view ('dashboardAdmin');
    }

  }

}
