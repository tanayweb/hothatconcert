<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

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
        $email = $request->email;
        $dob = $request->dob;
        $gender = $request->gender;
        $profession = $request->profession;
        $institution = $request->institution;
        $social = $request->social;
        $about = $request->about;

        if($name && $mobile){
            $check_if_sms_sent = User::where('mobile',$mobile)->first();
            if($check_if_sms_sent){
                echo 2;
                exit;
            }else{
                $data = array(
                    "api_key" => "72o8tgMg1Q1vmMViasnFZ8m23mZLuhhNdMk0bXS9",
                    "msg" => "ধন্যবাদ 'হঠাৎ কন্সার্ট'-এ আসার জন্য।  Airtel-এর সাথে থাকো। দারুণ সব অফার পেতে ভিজিট কর: http://cutt.ly/AppInt",
                    "to" => $mobile
                );
                $response = HTTP::post('https://api.sms.net.bd/sendsms', $data);
                $json_data = $response->json();
                if($json_data){
                    if($json_data['error'] == 0){
                        $model = new User();
                        $model->name = $name;
                        $model->mobile = $mobile;
                        $model->email = $email;
                        $model->dob = $dob;
                        $model->gender = $gender;
                        $model->profession = $profession;
                        $model->institution = $institution;
                        $model->social = $social;
                        $model->about = $about;
                        $model->sms_sent = 1;
                        $model->save();
                    }else{
                        $model = new User();
                        $model->name = $name;
                        $model->mobile = $mobile;
                        $model->email = $email;
                        $model->dob = $dob;
                        $model->gender = $gender;
                        $model->profession = $profession;
                        $model->institution = $institution;
                        $model->social = $social;
                        $model->about = $about;
                        $model->sms_sent = 0;
                        $model->save();
                    }
                    echo 1;
                    exit;
                }
            }
        }else{
            echo 4;
            exit;
        }
    }
}
