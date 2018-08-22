<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller{

    public function index(){
        return view('login.index');
    }

    public function login(Request $request){
        $input = $request->all();
        $rules = [
            'acc' => 'required',
            'pass' => 'required'
        ];
        $Validator = Validator::make($input, $rules);
        if($Validator -> passes()){
            if($request->acc == "admin" && $request->pass == "1234"){

                return Redirect::to('01_Module_Y/admin/train');    
            }else{
                Session::flash('error', '帳號或密碼錯誤!');
                return Redirect::to('01_Module_Y/login');    
            }
        }else{
            Session::flash('error', '資料不完整!');
            return Redirect::to('01_Module_Y/login');
        }
    }

    public function logout(){
        return view('client.index');
    }
}