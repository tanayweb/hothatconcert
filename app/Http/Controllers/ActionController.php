<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActionController extends Controller
{
    public function index(Request $request){
        return view('index', [
            'title' => 'Index',
            'menu' => 'Index'
        ]);
    }
    public function register(Request $request){
        $name = $request->name;
        $mobile = $request->mobile;
        $data = array(
            "api_key" => "C6y07b0BXx99tR1PQr3Qht68W2B4MMa8kGTj7wi5",
            "msg" => $name,
            "to" => $mobile
        );
        $response = HTTP::post('https://api.sms.net.bd/sendsms', $data);
        $json_data = $response->json();
            if($json_data){
                if($json_data['error'] == 0){
                    echo 1;
                    exit;
                }
            }
    }
}
