<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('ShowPets');
    }

    public function home(){
        return view('home');
    }



     public function showpets()
     {
         $pets = Pet::all();
         return view('pets', compact('pets'));
     }

     public function req(){
        return view('Request');
     }

    
}
