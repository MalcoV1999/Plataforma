<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function dashboard() {
        return view('assistant.dashboard');
    }

    public function login() {
        return view('assistant.auth.login');
    }
}
