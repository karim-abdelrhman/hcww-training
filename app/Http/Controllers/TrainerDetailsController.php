<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerDetailsController extends Controller
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trainers = DB::table("HC_TRAINER_NAME")->where('id','=',$id)->orderBy('id')->first();
        $details  =  collect(DB::select('SELECT hp.code as "code",hp.PROGRAM_NAME as "name" FROM HC_TRAINER_NAME_DEL htnd,HC_PROGRAM hp WHERE hp.ID = htnd.ID_COR'));
//        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('trainers.details_trainer',compact('trainers','details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
