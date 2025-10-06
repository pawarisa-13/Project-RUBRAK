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

        return redirect()->route('pet.filter')->with('success','อ่านทำไม');
    }

    public function req($pet_id)
    {
    $pet = Pet::where('pet_id', $pet_id)->firstOrFail();
    return view('Request', compact('pet'));
    }

    public function ReqTable()
    {
        $requests = RequestAdopt::all();
        return view('ReqTable',compact('requests'));
    }

    public function approve($id)
{
    $req = RequestAdopt::findOrFail($id);

    //อนุมัติคำขอปัจจุบัน
    $req->update(['status_request' => 'approved']);

    //เปลี่ยนสถานะสัตว์เป็น 0
    Pet::where('pet_id', $req->pet_id)->update(['status' => 0]);

    //ปฏิเสธคำขออื่น
    RequestAdopt::where('pet_id', $req->pet_id)
        ->where('number_req', '!=', $req->id)
        ->update(['status_request' => 'rejected']);
        RequestAdopt::where('pet_id', $req->pet_id)->delete();

    return back()->with('success', 'อนุมัติเรียบร้อย! สัตว์ถูกซ่อนและปัดคำขออื่นแล้ว');
}
public function reject($id)
{
    RequestAdopt::where('number_req', $id)->update(['status_request' => 'rejected']);
    $req = RequestAdopt::findOrFail($id);
    $req->delete();

    return back()->with('error', 'ปฏิเสธคำขอเรียบร้อย');
}
}
