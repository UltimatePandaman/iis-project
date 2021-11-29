<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Conference;

class RoomController extends Controller
{
    public function create(\App\Models\Conference $conference){
        $this->authorize('create', $conference);
        $key = $conference->id;
        return view('rooms/create-r', compact('key'));

    }

    public function edit(Room $room){
        $this->authorize('update', $room);

        return view('rooms/edit-r', compact('room'));

    }

    public function update(Room $room){
        $this->authorize('update', $room);
        $data = request()->validate([
            'name' => 'required',
            'capacity' => 'required|numeric|gt:0',
        ]);
        $room->update($data);
        return redirect("/room/{$room->id}");
    }

    public function delete($id){
        $this->authorize('delete', Room::find($id));
        Room::destroy($id);
        return redirect('profile/rooms');

    }

    public function store($key){
        $data = request()->validate([
            'name' => 'required',
            'capacity' => 'required|numeric|gt:0',
        ]);
        $newroom = new Room($data);
        //$data['user_id'] = auth()->id();
        //Conference::create($data);
        $conference = Conference::find($key);
        $conference->rooms()->save($newroom);
        return redirect("/conference/$conference->id");
        
    }

    public function show(Room $room){
        return view('rooms/show-r', compact('room'));

    }
}
