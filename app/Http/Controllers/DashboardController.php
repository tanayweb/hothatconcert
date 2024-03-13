<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_user = User::select('*')->get();
        return view('backend.dashboard', [
            'title' => 'Dashboard',
            'total_user' => count($total_user)
        ]);
    }
}