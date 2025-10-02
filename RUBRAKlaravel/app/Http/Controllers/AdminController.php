<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function index(){
        return view('ShowPets');
    }
    public function home(){
        return view('home');
    }

    // public function ReqTable()
    // {
    //     $request = Request::all();
    //     return view('ReqTable',compact('$request'));
    // }

    public function req(){
        return view('Request');
     }


    public function showpets()
     {
         $pets = Pet::all();
         return view('pets', compact('pets'));
     }

     public function infoTable(){

        return view('infomation');
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

        return redirect()->back()->with('success', 'Pet Added Successfully!');
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

        return redirect('/pets')->with('success', 'Pet updated successfully!');
    }
    public function destroy($id)
    {
        $p = Pet::findOrFail($id);

        // ลบไฟล์รูปเก่า (ถ้ามี)
        if ($p->picture && Storage::disk('public')->exists($p->picture)) {
            Storage::disk('public')->delete($p->picture);
        }

        // ลบข้อมูลออกจาก database
        $p->delete();

        return redirect()->route('admin.pets.index')->with('ok', 'Deleted!');
    }




}
