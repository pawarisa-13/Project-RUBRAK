<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Storage;
class AdminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        return view('admin.dashboard');
    }

    public function index()
    {
        $pets = Pet::all();
        return view('index-admin', compact('pets'));
    }

    public function home()
    {
        $pets = Pet::all();
        return view('home', compact('pets'));
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

    public function ReqTable()
    {
        //$p = Pet::findOrFail();
        return view('ReqTable');
    }

    public function profile()
    {
        //$p = Pet::findOrFail();
        return view('profileAdmin');
    }


}
