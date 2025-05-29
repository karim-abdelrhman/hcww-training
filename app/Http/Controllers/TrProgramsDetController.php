<?php

namespace App\Http\Controllers;

use App\Models\trProgramsDet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrProgramsDetController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(trProgramsDet $trProgramsDet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trProgramsDet $trProgramsDet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dateNow = Carbon::now();
        $id = $request->id;
        $ProgramMaster = DB::table('TR_PROGRAMS_DETS')->where('id',$id)
            ->update([
                'code'=>$request->ProgramDet_code,
                'name'=>$request->ProgramDet_name,
                'prog_id'=>$request->ProgramDet_ID,
                'comm'=>$request->programDet_comm,
                'updated_by'=>Auth::user()->id,
                'updated_at'=> $dateNow,
            ]);
        toastr()->info('تمت التعديل بنجاح');
        return redirect()->route('train_program.edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trProgramsDet $trProgramsDet)
    {
        //
    }
}
