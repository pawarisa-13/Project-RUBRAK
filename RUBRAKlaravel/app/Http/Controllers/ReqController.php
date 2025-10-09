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
        return redirect()->route('pet.filter')->with('error','You have already submitted an adoption request for this animal. You cannot submit it again.');
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


        return redirect()->route('pet.filter')->with('success','Adoption request has been submitted.');
    }


    public function req($pet_id)
    {
    $pet = Pet::where('pet_id', $pet_id)->firstOrFail();
    return view('Request', compact('pet'));
    }

    public function ReqTable(Request $requests)
    {
        $filter = $requests->query('status', 'waiting');
        $rt= RequestAdopt::with(['user','pet']);
        switch ($filter) {
            case 'waiting':
                $rt->where('status_request', 'waiting')->orderByDesc('pet_id');

                break;

            case 'approved':
                $rt->where('status_request', 'approved')->orderByDesc('deleted_at');

                break;

            case 'rejected':
                $rt->where('status_request', 'rejected')->orderByDesc('deleted_at');

                break;

            case 'all':
                // $rt->withTrashed('status_request')->orderByDesc('status_request');
                $rt= RequestAdopt::with(['user','pet'])->orderByDesc('status_request');
                break;
        }
        $requests = $rt->get();
        return view('ReqTable',compact('requests','filter'));
    }



    public function approve($id)
{

    $req = RequestAdopt::where('number_req', $id)->firstOrFail();
    $req->update(['status_request' => 'approved']);
    RequestAdopt::where('pet_id', $req->pet_id)
        ->where('number_req', '!=', $req->number_req)
        ->update(['status_request' => 'rejected']);
    Pet::where('pet_id', $req->pet_id)->update(['status' => 0]);
    // RequestAdopt::where('pet_id', $req->pet_id)->delete();
    return redirect()->route('reqTable')->with('success','approved');
}

public function reject($id)
{
    RequestAdopt::where('number_req', $id)->update(['status_request' => 'rejected']);
    $req = RequestAdopt::findOrFail($id);
    // RequestAdopt::where('pet_id', $req->pet_id)->delete();
    // $req->delete();

    return redirect()->route('reqTable')->with('error', 'rejected');
}

}

