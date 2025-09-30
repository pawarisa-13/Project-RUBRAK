<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Middleware\CheckRole;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function profile(){
    if (auth()->user()->role==='admin') {
            return view('profileAdmin');
        }else{
            return view('profileUser');
        }
    }

    public function home(){
    if (auth()->user()->role==='admin') {
            return view('home');
        }else{
            return view('home');
        }
    }
    public function showpets()
     {
         $pets = Pet::all();
         return view('Showpets', compact('pets'));
     }
}
