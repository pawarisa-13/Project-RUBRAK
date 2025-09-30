<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('ShowPets');
    }
    public function home(){
        return view('home');
    }

    public function ReqTable()
    {
        //$p = Pet::findOrFail();
        return view('ReqTable');
    }

    public function req(){
        return view('Request');
     }


    public function showpets()
     {
         $pets = Pet::all();
         return view('pets', compact('pets'));
     }

     public function infoTable(){
        return view('information');
     }




}
