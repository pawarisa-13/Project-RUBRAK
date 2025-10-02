<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class Pet_UserController extends Controller
{
    public function index(Request $request){
        $type = $request->input('type'); 
        if ($type) {
            $pets = Pet::where('type', $type)
                         ->where('status', 1)
                         ->get();
        } else {
            $pets = Pet::where('status', 1)->get();
        }
        return view('pet_user', compact('pets', 'type'));
    }
}
