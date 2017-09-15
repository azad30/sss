<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            return view('profile.index');
        }
        return view('user.profile.index');
    }
    public function edit()
    {
        if(Auth::user()->role == 'admin')
        {
            return view('profile.edit');
        }
        return view('user.profile.edit');
    }
}
