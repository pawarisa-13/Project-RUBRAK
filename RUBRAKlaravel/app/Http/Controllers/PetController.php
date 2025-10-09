<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\RequestAdopt;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('index-admin', compact('pets'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_pet' => 'required',
            'age_pet' => 'required|integer',
            'gender' => 'required',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png',
            'breed' => 'nullable|string|max:255',
            'vaccine'    => 'required|boolean',
            'status'     => 'required|boolean',
            'foundation' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'info' => 'nullable|string',
            'type' => 'required',

        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('pets', 'public');
        }

        Pet::create($data);

        return redirect('/pet')->with('success', 'Pet Added Successfully!');
    }
    public function edit($id)
    {
        $p = Pet::findOrFail($id);
        return view('edit-index-admin', compact('p'));
    }
    public function update(Request $request, $id)
    {
        $p = Pet::findOrFail($id);

        $data = $request->validate([
            'name_pet' => 'required',
            'age_pet' => 'required|integer',
            'gender' => 'required',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png',
            'breed' => 'nullable|string|max:255',
            'vaccine' => 'required|boolean',
            'status' => 'required|boolean',
            'foundation' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'info' => 'nullable|string',
            'type' => 'required',
        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('pets', 'public');
        }

        $p->update($data);

        return redirect('/pet')->with('success', 'Pet updated successfully!');
    }
    public function destroy($id)
    {
        $p = Pet::findOrFail($id);

        // ลบไฟล์รูปเก่า (ถ้ามี)
        if ($p->picture && Storage::disk('public')->exists($p->picture)) {
            Storage::disk('public')->delete($p->picture);
        }

        // ลบข้อมูลออกจาก database
        $p->requests()->delete();
        $p->delete();

        return redirect()->route('admin.pets.index')->with('ok', 'Deleted!');
    }

    // public function req(){
    //     return view('Request');
    //  }

    public function pets_user(Request $request)
    {
        $type = $request->input('type');
        if ($type) {
            $pets = Pet::where('type', $type)->get();
        } else {
            $pets = Pet::where('status', 1)->get();
        }
        return view('pet_user', compact('pets', 'type'));
    }

    public function req($pet_id){
    $pet = Pet::where('pet_id', $pet_id)->firstOrFail();
    return view('Request', compact('pet'));
    }

     public function request(Request $req)
    {
        $req->validate([
            'pet_id' => ['required','integer','exists:pets,pet_id',
            Rule::unique('requests')->where(fn($q) =>$q
            ->where('user_id', auth()->id())
            )],
            'pet_experience' => 'required|string',
            'other_pet'      => 'required|string',
            'adopt_reason'   => 'required|string',
            'address_user'   => 'required|string',
        ]);

        RequestAdopt::create([
            'user_id'        => auth()->id(),
            'pet_id'         => $req->pet_id,
            'pet_experience' => $req->pet_experience,
            'other_pet'      => $req->other_pet,
            'adopt_reason'   => $req->adopt_reason,
            'address_user'   => $req->address_user,
            'status_request' => 'submitted',
        ]);

        return redirect()->route('pets.index')->with('success', 'Adoption request submitted successfully!');
    }

    // Filter-infrom
    public function information(Request $request)
    {
        $filter = $request->input('filter-inform', 'all');

        if ($filter === 'available') {
            $pets = Pet::where('status', 1)->get(); // Available
        } elseif ($filter === 'adopted') {
            $pets = Pet::where('status', 0)->get(); // Adopted
        } else {
            $pets = Pet::all(); // ทั้งหมด
        }

        return view('information', compact('pets', 'filter'));
    }
}
