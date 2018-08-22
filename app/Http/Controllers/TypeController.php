<?php

namespace App\Http\Controllers;

use App\Type;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller{

    public function index(){
        $Types = Type::all();

        return view('admin.type.index')
            ->with(['Types' => $Types]);
    }

    public function create(){
        

        return view('admin.type.create');
    }

    public function add(Request $request){
        $input = $request->all();
        $rules = [
            'TypeName' => 'required',
            'HightSpeed' => 'required'
        ];
        $Validator = Validator::make($input, $rules);
        if($Validator -> passes()){
            $CheckName = Type::where('TypeName', $request->TypeName) -> count();
            if($CheckName == 0){
                $Type = new Type;
                $Type->TypeName = $request->TypeName;
                $Type->HightSpeed = $request->HightSpeed;
                $Type->save();

                Session::flash('success', '成功建立!');
                return Redirect::to('01_Module_Y/admin/type');    
            }else{  
                Session::flash('error', '已有相同的名稱!');
                return Redirect::to('01_Module_Y/admin/type/create');    
            }
        }else{
            Session::flash('error', '資料不完整!');
            return Redirect::to('01_Module_Y/admin/type/create');
        }
    }

    public function edit($id){
        $Type = Type::find($id);

        return view('admin.type.edit')
            ->with(['Type' => $Type]);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $rules = [
            'TypeName' => 'required',
            'HightSpeed' => 'required'
        ];
        $Validator = Validator::make($input, $rules);
        if($Validator -> passes()){
            $CheckName = Type::where('TypeName', $request->TypeName) -> where('id', '!=', $id) -> count();
            if($CheckName == 0){

                $Type = Type::find($id);
                $Type->TypeName = $request->TypeName;
                $Type->HightSpeed = $request->HightSpeed;
                $Type->save();

                Session::flash('success', '成功修改!');
                return Redirect::to('01_Module_Y/admin/type');    
            }else{  
                Session::flash('error', '已有相同的名稱!');
                return Redirect::to('01_Module_Y/admin/type/'.$id.'/edit');    
            }
        }else{
            Session::flash('error', '資料不完整!');
            return Redirect::to('01_Module_Y/admin/type/'.$id.'/edit');
        }
    }

    public function delete($id){
        $Type = Type::find($id);

        $Type->delete();

        Session::flash('success', '成功刪除!');
        return Redirect::to('01_Module_Y/admin/type'); 
    }
}