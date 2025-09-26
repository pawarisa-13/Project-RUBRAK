<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class Pet_UserController extends Controller
{
    public function index(){
        $pets = Pet::all();
        return view("pet_user", compact("pets"));
    }
}
