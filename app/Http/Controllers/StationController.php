<?php

namespace App\Http\Controllers;

use App\Station;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StationController extends Controller{

    public function index(){
        $Stations = Station::orderBy('sequence', 'asc') -> get();

        return view('admin.station.index')
            ->with(['Stations' => $Stations]);
    }

    public function create(){
        $Stations = Station::orderBy('sequence', 'asc') -> get();

        return view('admin.station.create')
            ->with(['Stations' => $Stations]);
    }

    public function add(Request $request){
        $input = $request->all();
        $rules = [
            'ChineseName' => 'required',
            'EnglishName' => 'required'
        ];
        $Validator = Validator::make($input, $rules);
        if($Validator -> passes()){
            $CheckChieseName = Station::where('ChineseName', $request->ChineseName) -> count();
            $CheckEnglishName = Station::where('EnglishName', $request->EnglishName) -> count();
            if($CheckChieseName == 0 && $CheckEnglishName == 0){
                $Edit_Stations = Station::where('sequence', '>', $request->sequence) -> get();
                foreach($Edit_Stations as $Edit_Station){
                    $Edit_Station->sequence = $Edit_Station->sequence + 1;
                    $Edit_Station->save();
                }

                $Station = new Station;
                $Station->ChineseName = $request->ChineseName;
                $Station->EnglishName = $request->EnglishName;
                $Station->sequence = $request->sequence + 1;
                $Station->save();

                Session::flash('success', '成功建立!');
                return Redirect('01_Module_Y/admin/station');    
            }else{
                if($CheckChieseName != 0 && $CheckEnglishName != 0){
                    Session::flash('error', '已有相同的中文與英文名稱!');
                }
                if($CheckChieseName == 0 && $CheckEnglishName != 0){
                    Session::flash('error', '已有相同的英文名稱!');
                }
                if($CheckChieseName != 0 && $CheckEnglishName == 0){    
                    Session::flash('error', '已有相同的中文名稱!');
                }
            }

            return Redirect('01_Module_Y/admin/station/create');
        }else{
            Session::flash('error', '資料不完整!');
            return Redirect('01_Module_Y/admin/station/create');
        }
    }

    public function edit($id){
        $Station = Station::find($id);
        $Stations = Station::orderBy('sequence', 'asc') -> get();

        return view('admin.station.edit')
            ->with(['Station' => $Station, 'Stations' => $Stations]);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $rules = [
            'ChineseName' => 'required',
            'EnglishName' => 'required'
        ];
        $Validator = Validator::make($input, $rules);
        if($Validator -> passes()){
            $CheckChieseName = Station::where('ChineseName', $request->ChineseName) -> where('id', '!=', $id) -> count();
            $CheckEnglishName = Station::where('EnglishName', $request->EnglishName) -> where('id', '!=', $id) -> count();
            if($CheckChieseName == 0 && $CheckEnglishName == 0){
                $Station = Station::find($id);

                if($Station->sequence > $request->sequence){
                    //原本位置大於更改位置 從下改上
                    $Edit_Stations = Station::where('sequence', '>', $request->sequence) -> where('sequence', '<', $Station->sequence) -> get();
                    foreach($Edit_Stations as $Edit_Station){
                        $Edit_Station->sequence = $Edit_Station->sequence + 1;
                        $Edit_Station->save();
                    }
                }else{
                    //原本位置小於更改位置 從上改下
                    $Edit_Stations = Station::where('sequence', '<=', $request->sequence) -> where('sequence', '>', $Station->sequence) -> get();
                    foreach($Edit_Stations as $Edit_Station){
                        $Edit_Station->sequence = $Edit_Station->sequence - 1;
                        $Edit_Station->save();
                    }
                }

                $Station->ChineseName = $request->ChineseName;
                $Station->EnglishName = $request->EnglishName;
                if($request->sequence == 0 || $Station->sequence > $request->sequence){
                    $Station->sequence = $request->sequence + 1;
                }else{
                    $Station->sequence = $request->sequence;
                }
                $Station->save();
                
                Session::flash('success', '修改成功!');
                return Redirect('01_Module_Y/admin/station');    
            }else{
                if($CheckChieseName != 0 && $CheckEnglishName != 0){
                    Session::flash('error', '已有相同的中文與英文名稱!');
                }
                if($CheckChieseName == 0 && $CheckEnglishName != 0){
                    Session::flash('error', '已有相同的英文名稱!');
                }
                if($CheckChieseName != 0 && $CheckEnglishName == 0){    
                    Session::flash('error', '已有相同的中文名稱!');
                }
            }

            return Redirect('01_Module_Y/admin/station/'.$id.'/edit');
        }else{
            Session::flash('error', '資料不完整!');
            return Redirect('01_Module_Y/admin/station/'.$id.'/edit');
        }
    }

    public function delete($id){
        $Station = Station::find($id);
        
        $Edit_Stations = Station::where('sequence', '>', $Station->sequence) -> get();
        foreach($Edit_Stations as $Edit_Station){
            $Edit_Station->sequence = $Edit_Station->sequence - 1;
            $Edit_Station->save();
        }

        $Station->delete();

        Session::flash('success', '刪除成功!');
        return Redirect::to('01_Module_Y/admin/station  ');
    }
}