<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentation;
use App\Models\User;


class PresentationController extends Controller
{
    public function create(\App\Models\Conference $conference){
        $key = $conference->id;
        return view('presentations/create', compact('key'));

    }

    public function store($key){
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $data['conference_id'] = (int)$key;
        $newpres = new Presentation($data);
        User::find(auth()->id())->presentations()->save($newpres);
        return redirect('/dashboard');
        
    }
}
