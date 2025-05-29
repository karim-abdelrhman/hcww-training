<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = DB::table("HC_JOBS")->orderBy('id')->get();
        return view('jobs.job', compact('jobs'));
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
//        return $request;
        $seq = collect(DB::select("SELECT HC_JOBS_SEQ.nextval nxt FROM DUAL"))->first();
        DB::table('HC_JOBS')->insert([
            'id' => intval($seq->nxt),
            'code' => $request->code,
            'a_dsc' => $request->a_name,
            'e_dsc' => $request->e_name,
            'active' => 'T',
            'deleted' => 'F'
        ]);
        session()->flash('Add', 'تمت الاضافة بنجاح ');
        return back();

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
//        return $request;
        $id = $request->id;
        $updatejobs = DB::table('HC_JOBS')
            ->where('id', $id)
            ->update([
                'code' => $request->code,
                'a_dsc' => $request->a_name,
                'e_dsc' => $request->e_name,
                ]);
        session()->flash('edit','تم تعديل البيانات بنجاج');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
//        return $request;

    }
}
