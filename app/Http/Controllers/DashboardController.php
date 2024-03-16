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
        $total_male = User::select('*')->where('gender','Male')->get();
        $total_students = User::select('*')->where('profession','Student')->get();
        $total_engineers = User::select('*')->where('profession','Engineer')->get();
        $total_doctors = User::select('*')->where('profession','Doctor')->get();
        $total_lawyears = User::select('*')->where('profession','Lawyear')->get();
        $total_teachers = User::select('*')->where('profession','Teacher')->get();
        $total_job_holders = User::select('*')->where('profession','Job_Holder')->get();
        $total_businessman = User::select('*')->where('profession','Businessman')->get();
        $total_others = User::select('*')->where('profession','Other')->get();
        
        if(!$total_user){
            $total_user = [];
        }
        if(!$total_male){
            $total_male = [];
        }
        if(!$total_students){
            $total_students = [];
        }
        if(!$total_engineers){
            $total_engineers = [];
        }
        if(!$total_doctors){
            $total_doctors = [];
        }
        if(!$total_lawyears){
            $total_lawyears = [];
        }
        if(!$total_teachers){
            $total_teachers = [];
        }
        if(!$total_job_holders){
            $total_job_holders = [];
        }
        if(!$total_businessman){
            $total_businessman = [];
        }
        if(!$total_others){
            $total_others = [];
        }
        return view('backend.dashboard', [
            'title' => 'Dashboard',
            'total_user' => count($total_user),
            'total_male' => count($total_male),
            'total_female' => count($total_user) - count($total_male),
            'total_students' => count($total_students),
            'total_engineers' => count($total_engineers),
            'total_doctors' => count($total_doctors),
            'total_lawyears' => count($total_lawyears),
            'total_teachers' => count($total_teachers),
            'total_job_holders' => count($total_job_holders),
            'total_businessman' => count($total_businessman),
            'total_others' => count($total_others),
            'active' => 1
        ]);
    }
}