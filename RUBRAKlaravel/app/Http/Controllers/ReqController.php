<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RequestAdopt ;
use App\Models\Pet;
class ReqController extends Controller
{
    public function request(Request $req)
    {
        $req->validate([
            'pet_id'         => [
                'required','integer','exists:pets,pet_id',
                Rule::unique('requests')->where(fn($q) =>
                    $q->where('user_id', auth()->id())
                )
            ],
            'phone' => 'required|string',
            'pet_experience' => 'required|string',
            'other_pet'      => 'required|string',
            'adopt_reason'   => 'required|string',
            'address_user'   => 'required|string',
        ]);

        RequestAdopt::create([
            'user_id'        => auth()->id(),
            'pet_id'         => $req->pet_id,
            'phone'          => $req->phone,
            'pet_experience' => $req->pet_experience,
            'other_pet'      => $req->other_pet,
            'adopt_reason'   => $req->adopt_reason,
            'address_user'   => $req->address_user,
            'status_request' => 'waiting',
        ]);

        return redirect()->route('pets.index')->with('success','อ่านทำไม');
    }

    public function req($pet_id)
    {
    $pet = Pet::where('pet_id', $pet_id)->firstOrFail();
    return view('Request', compact('pet'));
    }

    public function ReqTable()
    {
        $request = RequestAdopt::all();
        return view('ReqTable',compact('request'));
    }
}
