<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthandwelnessController extends Controller
{
    public function index(){
        return view('pages.health');
    }
}
