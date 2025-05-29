<?php

namespace App\Http\Controllers;

use App\Models\trPrograms;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs =DB::table('TR_PROGRAMS')->orderBy('id')->get();
        return view('TrProgram.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = DB::table('LU_LEVELS')->get();
        $programs = DB::table('TR_PROGRAMS')->orderBy('id')->get();
        $programsDet = DB::table('TR_PROGRAMS_DETS')->orderBy('id')->get();
        return view('TrProgram.add_program',compact('programs','levels','programsDet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dateNow = Carbon::now();
        $seq = collect(DB::select("SELECT TR_PROGRAMS_ID_SEQ.NEXTVAL nxt FROM DUAL"))->first();
        $Programs = DB::table('TR_PROGRAMS')->insert([
            'id'=>intval($seq->nxt),
            'code'=>$request->Program_code,
            'name'=>$request->Program_name,
            'type'=>$request->Program_type,
            'comm'=>$request->commt,
            'created_by'=>Auth::user()->id,
            'created_at' =>$dateNow,
        ]);
        $details = [];
        $attachments =[];
        for ($count = 0; $count < count($request->Det_code); $count++) {
            $seq_det = collect(DB::select("SELECT TR_PROGRAMS_DETS_ID_SEQ.NEXTVAL nxt FROM DUAL"))->first();
            $ProgramsDet = [
                'id' => $seq_det->nxt,
                'code' => $request->Det_code[$count],
                'name' => $request->Det_name[$count],
                'prog_id' => $seq->nxt,

                'created_by' => Auth::user()->id,
                'created_at' => $dateNow,
            ];
            array_push($details, $ProgramsDet);
        }
        $Programs_det = DB::table('TR_PROGRAMS_DETS')->insert($details);

        toastr()->success('تمت الاضافة بنجاح','الاضافة');
        return redirect('/train_program');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $programs = DB::table('TR_PROGRAMS')->where('id',$id)->first();
        $programsDet = DB::table('TR_PROGRAMS_DETS')->where('PROG_ID',$id)->get();
        $attachments = collect(DB::select('SELECT   TR_PROGRAMS.ID AS "prog_id", TR_PROGRAMS.NAME AS "prog_name", TR_PROGRAMS_DETS.ID AS "pdet_id", TR_PROGRAMS_DETS.NAME AS "pdet_name", MATERIALS.ID AS "mat_id", MATERIALS.NAME AS "mat_name", MATERIALS.CREATED_AT AS "created_at", MATERIALS.CREATED_BY AS "created_by", MATERIALS.UPDATED_BY AS "updated_by", MATERIALS.UPDATED_AT AS "updated_at"
                                      FROM  TR_PROGRAMS, TR_PROGRAMS_DETS, MATERIALS
                                     WHERE  TR_PROGRAMS.ID = TR_PROGRAMS_DETS.PROG_ID
                                       AND  TR_PROGRAMS_DETS.ID = MATERIALS.DET_ID
                                       and TR_PROGRAMS.ID = '.$id.''));
        return view('TrProgram.details_program',compact('programs','programsDet','attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programs = DB::table('TR_PROGRAMS')->where('id',$id)->first();
        $programsDet = DB::table('TR_PROGRAMS_DETS')->where('PROG_ID',$id)->orderBy('id')->get();
        return view('TrProgram.edit_program',compact('programs','programsDet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dateNow = Carbon::now();
        $id = $request->pro_id;
        $ProgramMaster = DB::table('TR_PROGRAMS')->where('id',$id)
            ->update([
                'code'=>$request->Program_code,
                'name'=>$request->Program_name,
                'type'=>$request->Program_type,
                'comm'=>$request->program_comm,
                'updated_by'=>Auth::user()->id,
                'updated_at'=> $dateNow,
            ]);
        toastr()->info('تمت التعديل بنجاح','تعديل');
        return back();

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trPrograms $trPrograms)
    {
        //
    }
}
