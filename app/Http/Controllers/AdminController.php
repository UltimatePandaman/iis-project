<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function view(){
        $user = auth()->user();
        $this->authorize('isadmin',$user);
        $users = User::all();
        return view('admin/users', compact('users'));
    }

    public function create(User $user){
        $this->authorize('isadmin', $user);
        return view('admin/create-u', compact('user'));
    }

    public function update(User $user){
        $this->authorize('isadmin', $user);
        $data = request()->validate([
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $data['password'] = Hash::make($data['password']);
        
        $user->update($data);

        return redirect('admin/users');
    }

    public function store(Request $request){
        $user = auth()->user();
        $this->authorize('isadmin',$user);
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        return redirect('isadmin');
    }

    public function edit(User $user){
        $this->authorize('isadmin', $user);
        return view('admin/edit-u', compact('user'));
    }

    public function delete(User $user){
        $this->authorize('isadmin', $user);
        User::destroy($user->id);

        return redirect('/admin/users');
    }
}
