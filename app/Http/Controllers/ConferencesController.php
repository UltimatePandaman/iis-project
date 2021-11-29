<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Conference;


class ConferencesController extends Controller
{
    public function create(){
        return view('conferences/create-c');
    }

    public function edit(Conference $conference){
        
        return view('conferences/edit-c', compact('conference'));

    }

    public function update(Conference $conference){
        $data = request()->validate([
            'title' => 'required',
            'capacity' => 'required|numeric|gt:0',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'description' => '',
        ]);
        //$data['user_id'] = auth()->id();
        //Conference::create($data);
        $conference->update($data);
        return redirect("/conference/{$conference->id}");
        
    }

    public function delete($id){
        Conference::destroy($id);
        return redirect('profile/conferences');

    }


    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'capacity' => 'required|numeric|gt:0',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'description' => '',
            'price' => 'numeric',
        ]);
        $newconf = new Conference($data);
        //$data['user_id'] = auth()->id();
        //Conference::create($data);
        User::find(auth()->id())->conferences()->save($newconf);
        return redirect('/');
        
    }

    public function show(\App\Models\Conference $conference){
        return view('conferences/show-c', compact('conference'));

    }


}
