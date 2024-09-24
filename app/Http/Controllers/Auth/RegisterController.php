<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Return the view for the registration form
    }

    public function register(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'position' => 'required|string|max:255',
    ]);

    // Create a new user, including the name field (first and last name combined)
    $user = User::create([
        'name' => $request->first_name . ' ' . $request->last_name, // Combine first and last name
        'email' => $request->email,
        'password' => bcrypt($request->password), // Hash the password
        'country' => $request->country,
        'company_name' => $request->company_name,
        'contact' => $request->contact,
        'position' => $request->position,
    ]);

    // Log the user in
    // Auth::login($user);

    // return redirect()->route('adminDashboard')->with('success', 'Registration successful!');
    return response()->json(['message' => 'Registration successful!'], 200);

}

}
