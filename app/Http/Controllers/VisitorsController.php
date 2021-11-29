<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\User;
use Illuminate\Database\QueryException;

class VisitorsController extends Controller
{
    /**
     * Odečte uživateli z peněženky a přidá záznam do tabulky.
     * Databáze kontroluje kapacitu i dostatek peněz přes triggery.
     */
    public function store(Conference $conference){
        if((Auth::user()->balance - $conference->price) < 0){
            return redirect()->back()->with('alert', 'Insufficient funds!'); 
        }
        try{
            Auth::user()->update(['balance' => (Auth::user()->balance - $conference->price),]);
        }
        catch(QueryException $ex){
            return redirect()->back()->with('alert', $ex->errorInfo['2']);
        }

        if($conference->visitors->count() == $conference->capacity){
            return redirect()->back()->with('alert', 'Capacity limit reached!'); 
        }
        try{
            Auth::user()->visiting()->toggle($conference); 
        }
        catch(QueryException $ex){
            return redirect()->back()->with('alert', $ex->errorInfo['2']);
        }
        return redirect()->back();
    }
}
