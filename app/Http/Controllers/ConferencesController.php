<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Conference;


class ConferencesController extends Controller
{
    public function create(){
        return view('conferences/create');

    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
            'description' => '',
        ]);
        $newconf = new Conference($data);
        //$data['user_id'] = auth()->id();
        //Conference::create($data);
        User::find(auth()->id())->conferences()->save($newconf);
        return redirect('/');
        
    }

    public function show(\App\Models\Conference $conference){
        return view('conferences/show', compact('conference'));

    }


}
