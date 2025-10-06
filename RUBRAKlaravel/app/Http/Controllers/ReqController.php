<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RequestAdopt ;
use App\Models\Pet;
class ReqController extends Controller
{
    // public function request(Request $req)
    // {
    //     $req->validate([
    //         'pet_id'         => [
    //             'required','integer','exists:pets,pet_id',
    //             Rule::unique('requests')->where(fn($q) =>
    //                 $q->where('user_id', auth()->id())
    //             )
    //         ],
    //         'phone' => 'required|string',
    //         'pet_experience' => 'required|string',
    //         'other_pet'      => 'required|string',
    //         'adopt_reason'   => 'required|string',
    //         'address_user'   => 'required|string',
    //     ]);

    //     RequestAdopt::create([
    //         'user_id'        => auth()->id(),
    //         'pet_id'         => $req->pet_id,
    //         'phone'          => $req->phone,
    //         'pet_experience' => $req->pet_experience,
    //         'other_pet'      => $req->other_pet,
    //         'adopt_reason'   => $req->adopt_reason,
    //         'address_user'   => $req->address_user,
    //         'status_request' => 'waiting',
    //     ]);

    //     return redirect()->route('pet.filter')->with('success','อ่านทำไม');
    // }

    public function request(Request $req)
    {
        $req->validate([
            'pet_id'         => ['required','integer','exists:pets,pet_id'],
            'phone' => 'required|string',
            'pet_experience' => 'required|string',
            'other_pet'      => 'required|string',
            'adopt_reason'   => 'required|string',
            'address_user'   => 'required|string',
        ]);

        $already = RequestAdopt::where('user_id', auth()->id())
                ->where('pet_id', $req->pet_id)
                ->exists();



        if ($already) {
        // ส่งกลับพร้อม error สำหรับฟิลด์ pet_id (หรือจะใส่เป็น session()->flash ก็ได้)
        return back()
            ->withErrors(['pet_id' => 'คุณได้ส่งคำขอรับเลี้ยงสัตว์ตัวนี้แล้ว ไม่สามารถส่งซ้ำได้'])
            ->withInput();
    }

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
        

        return redirect()->route('pet.filter')->with('success','ส่งคำขอรับเลี้ยงเรียบร้อยแล้ว');
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
    // $req = RequestAdopt::findOrFail($id);
    $req = RequestAdopt::where('number_req', $id)->firstOrFail();
    //อนุมัติคำขอปัจจุบัน
    $req->update(['status_request' => 'approved']);


    //ปฏิเสธคำขออื่น
    RequestAdopt::where('pet_id', $req->pet_id)
        ->where('number_req', '!=', $req->number_req)
        ->update(['status_request' => 'rejected']);

        //เปลี่ยนสถานะสัตว์เป็น 0
    Pet::where('pet_id', $req->pet_id)->update(['status' => 0]);
    RequestAdopt::where('pet_id', $req->pet_id)->delete();

    return back()->with('success', 'อนุมัติเรียบร้อย!');
}
public function reject($id)
{
    RequestAdopt::where('number_req', $id)->update(['status_request' => 'rejected']);
    $req = RequestAdopt::findOrFail($id);
    $req->delete();

    return back()->with('error', 'ปฏิเสธคำขอเรียบร้อย');
}
}

