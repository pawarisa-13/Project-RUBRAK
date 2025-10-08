<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use App\Http\Controllers\Auth;
use App\Models\RequestAdopt ;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;
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
    public function update(Request $request) {
    $user = User::findOrFail(auth()->id());
    $user->update($request->only('name','email'));
    return redirect()->route('profile')->with('success','อัปเดตข้อมูลเรียบร้อยแล้ว');
}
    // public function update(Request $request)
    // {
    //     $user = Auth::user();

    //     $name = $request->validate([
    //         'name'  => ['required','string','max:255'],
    //         'phone' => ['nullable','string','max:50'],
    //         'email' => ['required','email','max:255','unique:users,email,'.$user->id],
    //     ]);


    //     $user->update($request->only('name','email'));
    //     return redirect()->route('profile')->with('success','อัปเดตข้อมูลเรียบร้อยแล้ว');
    // }
    public function your_request()
{
    $userId = auth()->id(); // ดึง ID ของผู้ใช้ที่ล็อกอินอยู่
    $requests = RequestAdopt::where('user_id', auth()->id())
        ->withTrashed('pet') // ดึงข้อมูลสัตว์เลี้ยงที่เกี่ยวข้องด้วย
        ->get();
    // $rt->withTrashed()

    return view('yourreq', compact('requests'));
}
public function reEdit($id)
    {
        $rd = RequestAdopt::where('user_id', auth()->id())
            ->where('status_request','waiting') // แก้ไขได้เฉพาะ waiting
            ->findOrFail($id);
        return view('editReq', compact('rd'));
    }
public function reUpdate(Request $request, $id)
{
    $validated = $request->validate([
        'phone'           => ['required','string','max:50'],
        'pet_experience'  => ['required','string','max:255'],
        'other_pet'       => ['required','integer','min:0'],
        'adopt_reason'    => ['required','string','max:255'],
        'address_user'    => ['required','string','max:255'],
    ]);


    $updated = RequestAdopt::where('user_id', auth()->id())
        ->whereKey($id)
        ->update($validated);

        return redirect()->route('ur_req')->with('success','แก้ไขคำขอเรียบร้อย');
    }


    public function destroy($id)
{

    $deleted = RequestAdopt::where('user_id', auth()->id())
        ->where('number_req', $id)
        ->forceDelete();

    return back()->with('success', 'ลบคำขอเรียบร้อย (ถาวร)');
}



}
