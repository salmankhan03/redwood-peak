<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
     public function ourMission()
    {
        return view('ourMission');
    }
    public function overView()
    {
        return view('overView');
    }
    public function seniorTeam()
    {
        return view('seniorTeam');
    }
    public function hedgeFund()
    {
        return view('hedgeFund');
    }
    public function managedAccount()
    {
        return view('managedAccount');
    }
    public function ourApproach()
    {
        return view('ourApproach');
    }
    public function register()
    {
        return view('register');
    }
    
    
}
