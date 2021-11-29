<?php

namespace App\Http\Controllers;

use App\Models\Conference;
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
        $this->authorize('update', $presentation);
        return view('presentations/edit-p', compact('presentation'));

    }

    public function patch(Presentation $presentation){
        $this->authorize('update', $presentation);
        $data = request()->validate([
            'date' => 'required|date',
            'room_id' => 'required',
            'start' => 'required',
            'end' => 'required|after:start',
        ]);
        $presentation->accepted = 1;
        $presentation->update($data);
        return redirect("conference/{$presentation->conference()->first()->id}/presentations");
        
    }

    public function pending(){
        $user = auth()->user();
        return view('presentations/pending', compact('user'));

    }

    public function showall(Conference $conference){

        return view('presentations/showall-p', compact('conference'));

    }

    public function show(Presentation $presentation){

        return view('presentations/show-p', compact('presentation'));

    }

    public function accept(Presentation $presentation){
        $this->authorize('update', $presentation);
        
        $presentation->update();
        return redirect('presentation/pending');

    }

    public function delete(Presentation $presentation){
        $this->authorize('update', $presentation);
        Presentation::destroy($presentation->id);
        return redirect("conference/{$presentation->conference()->first()->id}/presentations");

    }
    public function reject(Presentation $presentation){
        $this->authorize('update', $presentation);
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
