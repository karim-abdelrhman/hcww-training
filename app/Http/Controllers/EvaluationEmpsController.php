<?php

namespace App\Http\Controllers;

use App\Models\EvaluationEmps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluationEmpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Masters = DB::select("SELECT CO.ID AS COMP_ID,CO.CODE AS COMP_CODE,CO.NAME AS COMP_NAME,
                                          MS.ID AS MS_ID,MS.CODE AS MS_CODE, MS.NAME AS MS_NAME,MS.COM_DATE AS MS_COM_DATE
                                     FROM HC_COMMITTEE_MSTERS MS, LUCOMPANIES CO
                                    WHERE MS.COMP_ID= CO.ID");
        $Comps = DB::table('LUCOMPANIES')->get();
        $Employees= DB::table('PR_EMPS')->whereIn('comp_id',Auth::user()->comp_id)->where('ACTIVE','T')->where('CONTRACT_TYPE','TE')->get();
        return view('Assessment.index', ['Masters' => $Masters, 'Comps'=>$Comps,'Employees'=>$Employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
    }
    public function store2(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prEmps = collect(DB::select('SELECT  pr.EMP_ID as "emp_id",pr.CODE as "emp_code" ,pr.NAME as "emp_name",cem.COMM_ID as "comm_id"
                                              FROM  HC_COMMITTEE_EMPS cem, PR_EMPS pr
                                             WHERE  cem.EMP_NAME = pr.EMP_ID
                                               AND  cem.COMM_ID ='.$id.' '));
        return view('Assessment.showEmp', ['prEmps'=>$prEmps]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EvaluationEmps $evaluationEmps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EvaluationEmps $evaluationEmps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EvaluationEmps $evaluationEmps)
    {
        //
    }
}
