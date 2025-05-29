<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TraineesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_emp = DB::table('HC_EMPLOYEES')->whereIn('gov_id',Auth::user()->comp_id)->get();
        return view('Trainees.index', compact('all_emp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_degrs = DB::table('HC_DEGREES')->orderBy('id')->get(); // المؤهل
        $all_faucltys = DB::table('HC_FACULTIES')->orderBy('id')->get(); // الكلية
        $all_govs = DB::table('HC_GOV')->whereIn('gov_id',Auth::user()->comp_id)->orderBy('ordr')->get(); //الشركه
        $all_grades = DB::table('HC_GRADES')->orderBy('id')->get(); //الدرجة المالية
        $all_jobs = DB::table('HC_JOBS')->orderBy('id')->get(); // الوظيفة
        $all_organists = DB::table('HC_ORG_UNIT')->orderBy('id')->get(); // الوظيفة
        return view('Trainees.add_emp', compact('all_degrs', 'all_govs','all_grades','all_jobs','all_organists','all_faucltys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request;
        DB::table('HC_EMPLOYEES')->insert([
            'gov_id' => $request->gov_id,
            'code' => $request->Code,
            'a_name' => $request->Name,
            'job_id' => $request->Job,
            'grade_id' => $request->Grade,
            'degree_id' => $request->Degrees,
            'birth_date' => $request->Birth_date,
            'hire_date' => $request->Hire_date,
            'grade_date' => $request->Grade_Date,
            'faculty_id'=>$request->Faculty,
            'tel' => $request->Tel,
            'mob' => $request->Mob,
            'id_no' => $request->Id_No,
            'email' => $request->Email,
            'religions_id' => $request->Religions,
            'org_unit_id' => $request->parent_id,
            'degree_date' => $request->Degree_date,
            'comm' => $request->compName,
            'ins_user'=>Auth::user()->id,
            'ins_date' => now(),
        ]);
        session()->flash('Add', 'تمت الاضافه بنجاح');
        return redirect('/trainees');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $emps = db::table('hc_employees')
            ->select('hc_employees.emp_id AS emp_id','hc_employees.a_name as emp_name','hc_jobs.a_dsc AS job_name', 'hc_grades.a_dsc AS grade_name'
                            ,'hc_employees.grade_date AS grade_date','hc_employees.degree_date as degree_date'
                            ,'hc_degrees.a_dsc AS degree_name','hc_faculties.a_dsc AS faculty_name'
                            ,'hc_employees.birth_date AS birth_date','hc_employees.hire_date AS hire_date','hc_employees.tel AS tel'
                            ,'hc_employees.mob AS mob','hc_employees.id_no AS id_no','hc_employees.email AS email','hc_gov.gov_name as gov_name'
                            ,'hc_org_unit.a_dsc AS org_name','hc_employees.comm'
            )
            ->join('hc_faculties', 'hc_employees.faculty_id', '=', 'hc_faculties.id')
            ->join('hc_grades', 'hc_employees.grade_id', '=', 'hc_grades.id')
            ->join('hc_jobs', 'hc_employees.job_id', '=', 'hc_jobs.id')
            ->join('hc_org_unit', 'hc_employees.org_unit_id', '=', 'hc_org_unit.id')
            ->join('hc_gov', 'hc_employees.gov_id', '=', 'hc_gov.gov_id')
            ->join('hc_degrees', 'hc_employees.degree_id', '=', 'hc_degrees.id')
            ->where('hc_employees.emp_id','=', $id)
            ->whereIn('hc_employees.gov_id',Auth::user()->comp_id)
            ->first();

        return view('Trainees.Details_emp', compact( 'emps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $emps = DB::table('HC_EMPLOYEES')->where('emp_id', $id)->whereIn('gov_id',Auth::user()->comp_id)->first();
        $degrees = DB::table('HC_DEGREES')->orderBy('id')->get(); // المؤهل
        $all_faucltys = DB::table('HC_FACULTIES')->orderBy('id')->get(); // الكلية
        $govs = DB::table('HC_GOV')->whereIn('gov_id',Auth::user()->comp_id)->orderBy('ordr')->get(); //الشركه
        $grades = DB::table('HC_GRADES')->orderBy('id')->get(); //الدرجة المالية
        $jobs = DB::table('HC_JOBS')->orderBy('id')->get(); // الوظيفة
        $organists = DB::table('HC_ORG_UNIT')->orderBy('id')->get(); // الوظيفة
        return view('Trainees.edit_emp', compact('degrees', 'emps','govs','grades','jobs','organists','all_faucltys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->emp_id;
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
    public function getdegrees($id)
    {
        $degrees = DB::table("HC_DEGREES")->where("id", $id)->pluck("a_dsc", "id");
        return json_encode($degrees);
    }
    public function getOrgComp($id)
    {
        $degrees = DB::table("HC_ORG_UNIT")->where("gov_id", $id)->pluck("a_dsc", "id");
        return json_encode($degrees);
    }
}
