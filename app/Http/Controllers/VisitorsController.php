<?php

namespace App\Http\Controllers;

use App\ConferenceVisitorsPivot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\User;
use App\Models\Unregistered;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class VisitorsController extends Controller
{
    public function __construct(){
        $this->middleware('throttle:5,1');
    }

    public function destroy($pivot){

        DB::delete('delete from conference_visitors where id = ?', array($pivot));
        return redirect()->back();
    }

    public function update($pivot){
        DB::table('conference_visitors')->where('id', $pivot)->update(['status'=>1]);
        return redirect()->back();
    }

    public function pending(User $user){
        $user = auth()->user();
        return view('visit.pending')->with('user', $user);
    }

    public function edit(Conference $conference){
        return view('visit.edit')->with('conference', $conference);
    }
    
    /**
     * Odečte uživateli z peněženky a přidá záznam do tabulky.
     * Databáze kontroluje kapacitu i dostatek peněz přes triggery.
     */
    public function store(Conference $conference, Request $request){
        if(Auth::check()){
            if(($conference->visitors->count()+$conference->anons->count()) == $conference->capacity){
                return redirect()->back()->with('alert', 'Capacity limit reached!'); 
            }
            try{
                $conference->visitors()->attach(Auth::user(), ['status' => 0]);
            }
            catch(QueryException $ex){
                return redirect()->back()->with('alert', $ex->errorInfo['2']);
            }
            return redirect()->back();
        }
        else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:100', 'unique:unregistereds'],
            ]);
    
            $anon = Unregistered::create([
                'email' => $request->email,
            ]);

            if(($conference->visitors->count()+$conference->anons->count()) == $conference->capacity){
                return redirect()->back()->with('alert', 'Capacity limit reached!'); 
            }
            try{
                $conference->anons()->attach($anon, ['status' => 0]);
            }
            catch(QueryException $ex){
                return redirect()->back()->with('alert', $ex->errorInfo['2']);
            }
            return redirect('/')->with('conferences', Conference::orderBy('created_at', 'DESC')->get());
        }
    }
}
