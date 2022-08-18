<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermoController extends Controller
{
    public function index(){
        return \DB::table('tabla_termo1')->get();
    }
    
    public function humedad(){
        return \DB::Table('tabla_termo1')->select('humedad')->limit(100)->get();
    }

    public function fecha_hora(){
        return \DB::Table('tabla_termo1')->select(\DB::raw('concat(fecha, " ", hora) as fecha_hora'))->limit(100)->get();
    }

    public function presion(){
        return \DB::table('tabla_termo1')->select('STC')->limit(100)->get();
    }

    public function temperatura(){
        return \DB::table('tabla_termo1')->select('tempC')->limit(100)->get();
    }
}
