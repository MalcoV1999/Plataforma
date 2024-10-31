<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function dashboard() {
        return view('buyer.dashboard');
    }

    public function login() {
        return view('buyer.auth.login');
    }
}
