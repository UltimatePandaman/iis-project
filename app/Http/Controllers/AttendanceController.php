<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function store(Presentation $presentation){
        Auth::user()->attending()->toggle($presentation);
        return redirect()->back();
    }
}
