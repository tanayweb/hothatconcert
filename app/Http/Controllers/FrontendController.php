<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanySettings;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
}