<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Conference;

class RoomController extends Controller
{
    public function create(\App\Models\Conference $conference){
        $key = $conference->id;
        return view('rooms/create-r', compact('key'));

    }

    public function edit(Room $room){

        return view('rooms/edit-r', compact('room'));

    }

    public function update(Room $room){
        $data = request()->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
        $room->update($data);
        return redirect("/room/{$room->id}");
    }

    public function delete($id){
        Room::destroy($id);
        return redirect('profile/rooms');

    }

    public function store($key){
        $data = request()->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
        $newroom = new Room($data);
        $capacity = (int)$data['capacity'] + (int)Conference::find($key)->capacity;
        Conference::find($key)->update(['capacity' => $capacity]);
        //$data['user_id'] = auth()->id();
        //Conference::create($data);
        Conference::find($key)->rooms()->save($newroom);
        return redirect('/');
        
    }

    public function show(Room $room){
        return view('rooms/show-r', compact('room'));

    }
}
