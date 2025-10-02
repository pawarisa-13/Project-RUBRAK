<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Storage;
class Pet_UserController extends Controller
{
    public function index(Request $request){
        $type = $request->input('type');
        if ($type) {
            $pets = Pet::where('type', $type)->get();
        } else {
            $pets = Pet::all();
        }
        return view('pet_user', compact('pets', 'type'));
    }
}
