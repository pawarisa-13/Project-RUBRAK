<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

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

     public function contact(){
        return view('contact');
     }

     public function donate(){
        return view('donate');
     }
    //  public function show()
    // {
    //     return view('profileUser');
    // }

    public function update(Request $request)
    {
        $user = Auth::user();

        $name = $request->validate([
            'name'  => ['required','string','max:255'],
            'phone' => ['nullable','string','max:50'],
            'email' => ['required','email','max:255','unique:users,email,'.$user->id],
        ]);


        $user->update($request->only('name','email'));
        return redirect()->route('profile')->with('success','อัปเดตข้อมูลเรียบร้อยแล้ว');
    }
    public function your_request(){
        return view('yourreq');
     }



}
