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
    public function login()
    {
        return view('login');
    }
    public function ContactUs()
    {
        return view('contactUs');
    }
    public function AdminLogin()
    {
        return view('adminLogin');
    }
    public function AdminDashboard()
    {
        return view('adminDashboard');
    } 
    public function user()
    {
        return view('user');
    }
    
    
}
