<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quals = DB::table('HC_DEGREES')->where('DELETED','F')->orderBy('id')->get();
        return view('quals.qual',compact('quals'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->pro_id;
        $comps = DB::table('HC_DEGREES')
            ->where('id', $id)
            ->update(['a_dsc' => $request->gov_name,
                'e_dsc' => $request->gov_code,
                'active' => $request->tel,
            ]);
        session()->flash('Edit','تم تعديل البيانات بنجاج');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $comps = DB::table('HC_DEGREES')
            ->where('id', $id)
            ->update(['deleted' => 'T',
            ]);
        session()->flash('delete','تم الحذف بنجاج');
        return back();
    }
}
