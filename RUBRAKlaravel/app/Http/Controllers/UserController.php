<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function index(){
        return view('home');
    }
<<<<<<< Updated upstream
=======



     public function showpets()
     {
         $pets = Pet::all();
         return view('pets', compact('pets'));
     }

    //  public function req($pet_id)
    // {
    // $pet = Pet::where('pet_id', $pet_id)->firstOrFail();
    // return view('Request', compact('pet'));
    // }

     public function contact(){
        return view('contact');
     }

     public function donate(){
        return view('donate');
     }



>>>>>>> Stashed changes
}
