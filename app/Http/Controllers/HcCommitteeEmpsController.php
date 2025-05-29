<?php

namespace App\Http\Controllers;

use App\Models\hcCommitteeEmps;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HcCommitteeEmpsController extends Controller
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
        return view('HcCommitteeEmps.index', ['Masters' => $Masters, 'Comps'=>$Comps,'Employees'=>$Employees]);
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
        $dateNow = Carbon::now();
        $commEmps = DB::table('HC_COMMITTEE_EMPS')->insert([
            'emp_code'       =>$request->CodeEmp,
            'emp_name'       => $request->NameEmp,
            'comm_id'        => $request->Pro_Id,
            'created_by'     => Auth::user()->name,
            'created_at'     => $dateNow,
        ]);
        toastr()->success('تمت الاضافة بنجاح','إضافة');
        return back();
//        $TrEmps=[];
//        for ($count = 0; $count < count($request->NameEmp); $count++) {
//            $seq_Emp = collect(DB::select("SELECT HC_COMMITTEE_EMPS_ID_SEQ.NEXTVAL nxt FROM DUAL"))->first();
//            $Comm_Emps = [
//                'id'            => $seq_Emp->nxt,
//                'emp_code'       =>$request->CodeEmp[$count],
//                'emp_name'       => $request->NameEmp[$count],
//                'comm_id'       => $request->Pro_Id,
//                'created_by'    => Auth::user()->name,
//                'created_at'    => $dateNow,
//            ];
//            array_push($TrEmps, $Comm_Emps);
//        }
//        $Programs_det = DB::table('HC_COMMITTEE_EMPS')->insert($TrEmps);


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $attachments = DB::table('HC_COMMITTEE_DOCS')->where('comm_id',$id)->get();
        $member= DB::table('PR_EMPS')->where('ACTIVE','T')
            ->where('CONTRACT_TYPE','TE')
            ->get();
        $Comps = DB::table('LUCOMPANIES')->get();
        $emps = DB::table('PR_EMPS')->join('HC_COMMITTEE_EMPS', 'emp_id','=','emp_name' )->where('comm_id',$id)->get();
        $masters = collect(DB::select('SELECT CO.ID AS COMP_ID,
                                              CO.CODE AS COMP_CODE,
                                              CO.NAME AS COMP_NAME,
                                              MS.ID AS MS_ID,
                                              MS.CODE AS MS_CODE,
                                              MS.NAME AS MS_NAME,
                                              MS.COM_DATE AS MS_COM_DATE,
                                              MS.COMM as MS_COMM
                                         FROM HC_COMMITTEE_MSTERS MS, LUCOMPANIES CO
                                        WHERE MS.COMP_ID= CO.ID AND MS.ID ='.$id.' '))->first();
        return view('HcCommitteeEmps.details_emptraniner', ['masters' => $masters, 'member' => $member,'attachments' => $attachments,'emps'=>$emps,'Comps'=>$Comps]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hcCommitteeEmps $hcCommitteeEmps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dateNow = Carbon::now();
        $Add_Emps = DB::table('HC_COMMITTEE_EMPS')->insert([
            'mb_name'=> $request->Members,
            'comm_id'=>$request->prog_id,
//            'mb_comm'=>$request->,
            'updated_by' => Auth::user()->name,
            'updated_at' => $dateNow,
        ]);
        toastr()->success('تمت الاضافة بنجاح','إضافة');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hcCommitteeEmps $hcCommitteeEmps)
    {
        //
    }

    public function getEmpCode($id)
    {
        $EmpName = DB::table("PR_EMPS")->where("emp_id", $id)->pluck("code", "emp_id");
        return json_encode($EmpName);
    }
}
