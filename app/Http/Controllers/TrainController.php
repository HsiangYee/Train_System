<?php

namespace App\Http\Controllers;

use App\Station;
use App\Type;
use App\Train;
use App\Route;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TrainController extends Controller{

    public function index(){
        return view('admin.train.index');
    }

    public function create(){
        $Stations = Station::orderBy('sequence', 'asc') -> get();
        $Types = Type::all();
        $Dates = ['一','二','三','四','五','六','日'];

        return view('admin.train.create')
            ->with(['Stations' => $Stations, 'Types' => $Types, 'Dates' => $Dates]);
    }

    public function route(Request $request){
        $input = $request->all();
        $rules = [
            'TrainNumber' => 'required',
            'time' => 'required',
            'SingleCarNumber' => 'required',
            'CarNumber' => 'required'
        ];
        $Validator = Validator::make($input, $rules);
        if($Validator -> passes()){
            if($request->StartStation != $request->EndStation){
                $StartStation = Station::find($request->StartStation);
                $EndStation = Station::find($request->EndStation);
                $Stations_Route = Station::where('sequence', '>' ,$StartStation->sequence) -> where('sequence', '<=', $EndStation->sequence) -> orderBy('sequence', 'asc') -> get();
                $Dates = ['一','二','三','四','五','六','日'];

                Session::put('info', $input);
                return view('admin.train.route')
                    ->with(['StartStation' => $StartStation, 'EndStation' => $EndStation, 'Stations_Route' => $Stations_Route, 'Dates' => $Dates]);

            }else{
                Session::flash('error', '發車站與終點站不可相同!');
                return Redirect::to('01_Module_Y/admin/train/create');    
            }
            
        }else{
            Session::flash('error', '資料不完整!');
            return Redirect::to('01_Module_Y/admin/train/create');
        }
    }

    public function add(Request $request){
        for($i = 0 ; $i < count($request->Station_id) ; $i ++){
            $Route = new Route;
            $Route->TrainId = Session::get('info.TrainNumber');
            $Route->StayTime = $request->StayTime[$i];
            $Route->ArrivalTime = $request->ArrivalTime[$i];
            $Route->Fare = $request->Fare[$i];
            $Route->save();
        }

        $Train = new Train;
        $Train->Trainid = Session::get('info.TrainNumber');;
        $Train->date = Session::get('info.date');
        $Train->time = Session::get('info.time');
        $Train->SingleCarNumber = Session::get('info.SingleCarNumber');
        $Train->CarNumber = Session::get('info.CarNumber');
        $Train->TotalNumber = Session::get('info.TotalNumber');

        //
    }
}