<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentation;
use App\Models\User;


class PresentationController extends Controller
{
    public function create(\App\Models\Conference $conference){
        $key = $conference->id;
        return view('presentations/create-p', compact('key'));

    }

    public function edit (Presentation $presentation){
        return view('presentations/edit-p', compact('presentation'));

    }

    public function patch(Presentation $presentation){
        $data = request()->validate([
            'date' => 'required|date',
            'start' => 'required',
            'end' => 'required|after:start',
        ]);
        $presentation->accepted = 1;
        $presentation->update($data);
        return redirect("/presentation/pending");
        
    }

    public function pending(){
        $user = auth()->user();
        return view('presentations/pending', compact('user'));

    }

    public function accept(Presentation $presentation){
        
        $presentation->update();
        return redirect('presentation/pending');

    }
    public function delete(Presentation $presentation){
        Presentation::destroy($presentation->id);
        return redirect('presentation/pending');

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
