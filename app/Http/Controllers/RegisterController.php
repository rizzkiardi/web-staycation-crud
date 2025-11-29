<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
            'name' => 'required|max:60',
            'username' => 'required|unique:users|min:5|max:15',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5|max:255',
            ],
            [
            // Name
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal 60 karakter.',

            // Username
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'username.min' => 'Username minimal 5 karakter.',
            'username.max' => 'Username maksimal 15 karakter.',

            // Email
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'email.email' => 'Format email tidak valid.',

            // Password
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 5 karakter.',
            'password.max' => 'Password maksimal 255 karakter.',
            ]
        );

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        $request->session()->flash('success', 'Registration successfully, Please login!');

        return redirect('login');
    }
}
