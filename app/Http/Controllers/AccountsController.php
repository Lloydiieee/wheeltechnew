<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountsController extends Controller
{

    public static function index()
    {   
        $accounts = User::get();
        return view('pages.users.index', compact('accounts'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // confirmed ensures password matches password_confirmation
        ]);

        // Create the new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'account_type' => $request->account_type,
            'password' => Hash::make($request->password), // Hash the password before saving
        ]);

        // Redirect with a success message
        return redirect()->back()->with(['success' => 'Registration successful!']);
    }

    public function apply(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // confirmed ensures password matches password_confirmation
        ]);

        // Create the new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'account_type' => $request->account_type,
            'password' => Hash::make($request->password), // Hash the password before saving
        ]);
        
        Application::create([
            'product_id' => $request->product_id,
            'downpayment' => $request->downpayment_e,
            'terms' => $request->terms_e,
            'email' => $request->email,
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to the intended page or another page after login
            return redirect()->intended('/dashboard'); // Replace '/home' with your desired route
        }
    }

}
