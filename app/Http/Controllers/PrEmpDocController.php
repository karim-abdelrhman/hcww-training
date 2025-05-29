<?php

namespace App\Http\Controllers;

use App\Models\prEmpDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrEmpDocController extends Controller
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

        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

//        $prEmpDoc = DB::table('PR_EMP_DOCS')->insert([
//
//        ])

        $attachments =  new prEmpDoc();
        $attachments->doc_name = $file_name;
        $attachments->doc_type = $request->docType;
        $attachments->emp_id = $request->emp_id;
        $attachments->Created_by = Auth::user()->id;
        $attachments->save();

        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/PrEmp/' . $request->emp_id .'/'.$request->docType ), $imageName);

        toastr()->success( 'تم اضافة المرفق بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(prEmpDoc $prEmpDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prEmpDoc $prEmpDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prEmpDoc $prEmpDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prEmpDoc $prEmpDoc)
    {
        //
    }
}
