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
    public function publications()
    {
        return view('publications');
    }
    public function hedgeFundReports()
    {
        return view('hedgeFundReports');
    }  
    public function managedAccountReports()
    {
        return view('managedAccountReports');
    } 
    public function news()
    {
        return view('news');
    }
    public function visits()
    {
        return view('visits');
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
    public function showUserOverview()
    {
        
        $userCounts = [
            'all' => 500,
            'pending' => 100,
            'approved' => 200,
            'awaiting_email_confirmation' => 50,
            'rejected' => 50,
            'inactive' => 10
        ];

        return view('userOverview', compact('userCounts'));
    }
    public function destroy($username)
    {
        // Logic to find and delete the user
        $user = PageController::where('username', $username)->firstOrFail(); // Find user by username
        $user->delete(); // Delete the user

        return redirect()->route('adminUserList')->with('success', 'User deleted successfully.'); // Redirect with success message
    }


    public function adminUserList(Request $request)
    {
        $status = $request->query('status', 'all'); // Default to 'all' if no status is passed
    
        // Define user data (or fetch from database in a real application)
        $userData = [
            'all' => [
                ['username' => 'u1', 'name' => 'User1', 'email' => 'test@gmail.com', 'role' => 'Administrator', 'posts' => 0, 'status' => 'approved'],
                ['username' => 'u2', 'name' => 'User2', 'email' => 'user2@example.com', 'role' => 'Editor', 'posts' => 2, 'status' => 'pending'],
                // Other users...
            ],
            'pending' => [
                ['username' => 'u2', 'name' => 'User2', 'email' => 'user2@example.com', 'role' => 'Editor', 'posts' => 2, 'status' => 'pending'],
                // Other pending users...
            ],
            // More status groups: approved, rejected, etc.
        ];
    
        // Filter users based on the selected status
        $users = $userData[$status] ?? $userData['all']; 
    
        return view('adminUserList', compact('users', 'status'));
    }
    public function updateUser(Request $request, $username)
    {
        // Find the user by username or handle it appropriately
        $user = User::where('username', $username)->first();

        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->status = $request->input('status');
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    
    public function media()
    {
        return view('media');
    }
    public function post()
    {
        return view('post');
    }
    public function postCreate()
    {
        return view('create-post');
    }
    public function pages(){
        return view('pages');
    }
    public function uploadDocument(){
        return view('uploadDocument');
    }

    
    
    
    
}
