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
    public function media()
    {
        return view('media');
    }
    public function pageCreate()
    {
        return view('create-page');
    }
    // public function pageCreate()
    // {
    //     $pages = Page::all(); // Fetch all created pages
    //     return view('create-page', compact('pages'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);

    //     // Create a new page and save it
    //     Page::create([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //     ]);

    //     return redirect()->route('pageCreate')->with('success', 'Page created successfully!');
    // }
    
    
    
}
