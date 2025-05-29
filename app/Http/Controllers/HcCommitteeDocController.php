<?php

namespace App\Http\Controllers;

use App\Models\hcCommitteeDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HcCommitteeDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);

        $Att_Date = date('Y-m-d');
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();
        $doc_code = $request->Codes;
        $comm_id =$request->prog_id;


        $attachments =  new hcCommitteeDoc();
        $attachments->code = $doc_code;
        $attachments->name = $file_name;
        $attachments->created_by = Auth::user()->name;
        $attachments->comm_id = $comm_id;
        $attachments->com_date = $Att_Date;
        $attachments->save();

        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/committee/' . $comm_id ), $imageName);

        toastr()->success('تمت الاضافة بنجاح','الاضافة');
        return back();
//        return redirect('/meeting');

    }

    /**
     * Display the specified resource.
     */
    public function show(hcCommitteeDoc $hcCommitteeDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hcCommitteeDoc $hcCommitteeDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hcCommitteeDoc $hcCommitteeDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hcCommitteeDoc $hcCommitteeDoc)
    {
        //
    }
}
