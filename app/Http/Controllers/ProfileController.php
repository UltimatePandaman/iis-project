<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use App\Models\User;


class ProfileController extends Controller
{
    public function index(){
        return view('profile.index')->with('user', Auth::user());
    }

    public function show(User $user){
        return view('profile.show')->with('user', $user);
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);

        return view('profile.edit')->with('user', $user);
    }

    public function update(User $user){
        //$this->authorize('update', $user->profile)
        //Zkontroluji vstup
        $data = request()->validate([
            'nickname' => ['string', 'max:50'],
            'motto' => ['string', 'max:50'],
            'description' => ['string', 'max:50'],
            'profile_image' => 'image',
            'background_image' => 'image',
        ]);

        //Uložíme nový profilový obrázek
        if(request('profile_image')){
            $avatarPath = request('profile_image')->store('avatars', 'public');
            $avatarPath = "storage/".$avatarPath;

            //Clipping avatar
            Image::make(public_path($avatarPath))->fit(150, 150)->save();

            //Musíme smazat předchozí obrázek
            File::delete(Auth::user()->profile->profile_image);
        }
        else{//Žádný nový obrázek
            $avatarPath = Auth::user()->profile->profile_image;
        }

        //Uložíme nový background obrázek
        if(request('background_image')){
            $bgPath = request('background_image')->store('bgs', 'public');
            $bgPath = 'storage/'.$bgPath;

            //Musíme smazat předchozí obrázek
            File::delete(Auth::user()->profile->background_image);
        }
        else{//Žádný nový obrázek
            $bgPath = Auth::user()->profile->background_image;
        }

        //Update
        Auth::user()->profile->update(array_merge(
            $data,
            ['profile_image' => $avatarPath,
            'background_image' => $bgPath
            ]
        ));

        //Zpátky na "Dashboard" uživatele   
        return view('profile.index')->with('user', Auth::user());
    }
}
