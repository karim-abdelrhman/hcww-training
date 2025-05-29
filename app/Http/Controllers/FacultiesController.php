<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = DB::table('LUFACULTIES')->orderBy('id')->get();
        return view('faculties.faculty', compact('faculties') );
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

        $request->validate([
            'code' => 'required',
            'name'=>'required',
        ],[
            'code.required' =>'يرجي ادخال الكلية',
            'name.required' => 'يرجى ادخال الكود',
        ]);

        DB::table('LUFACULTIES')->insert([
            'code'=>$request->code,
            'name'=>$request->name,
            'comm'=>$request->note,
            'created_by'=>Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        toastr()->success('تمت الاضافة بنجاح');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->pro_id;
        $upfaculty = DB::table('LUFACULTIES')
            ->where('id', $id)
            ->update([
                'code' => $request->code,
                'name' => $request->name,
                'comm' => $request->note,
                'updated_by'=>Auth::user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        toastr()->info('تم التعديل بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = $request->pro_id;
        $defaculty = DB::table('LUFACULTIES')->where('id', $id)->delete();
        toastr()->warning('تمت الحذف  بنجاح');
        return back();
    }
}

