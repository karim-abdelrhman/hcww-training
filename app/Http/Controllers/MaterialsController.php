<?php

namespace App\Http\Controllers;

use App\Models\materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialsController extends Controller
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

        $attachments =  new materials();
        $attachments->name = $file_name;
        $attachments->code = '';
        $attachments->det_id = $request->Det_id;
        $attachments->prog_id = $request->prog_id;
        $attachments->created_by = Auth::user()->name;
        $attachments->save();
        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/Program/' .  $request->prog_id.'/'.$request->Det_id), $imageName);

        toastr()->success('تمت التعديل بنجاح','الاضافة');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(materials $materials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(materials $materials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, materials $materials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(materials $materials)
    {
        //
    }
}
