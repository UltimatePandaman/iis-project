<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class WelcomeController extends Controller
{
    public function show(){
        
        $data = Conference::orderBy('created_at', 'DESC')->get();
        return view('welcome', ['conferences' => $data]);
        

    }
    //
}
