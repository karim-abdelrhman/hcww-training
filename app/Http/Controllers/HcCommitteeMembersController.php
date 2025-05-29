<?php

namespace App\Http\Controllers;

use App\Models\hcCommitteeMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HcCommitteeMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comps = DB::table('lucompanies')->orderBy('id')->get();
        return view('Member.index', compact('comps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comps = DB::table('LUCOMPANIES')->whereIn('id',Auth::user()->comp_id)->orderBy('id')->get();
        $nationalitys = DB::table('COUNTRIES')->orderBy('COUNTRY_ARNATIONALITY')->get();
        $careers = DB::table('LUCAREERPATHS')->orderBy('id')->get();
        $degrees = DB::table('LUDEGREES')->orderBy('id')->get();
        $faculties = DB::table('LUFACULTIES')->orderBy('id')->get();
        $jobs = DB::table('LUGOBS')->orderBy('id')->get();
        $grades = DB::table('LUGRADES')->orderBy('id')->get();
        $org_Units = DB::table('LUORGUNITS')->whereIn('comp_id',Auth::user()->comp_id)->orderBy('comp_id')->orderBy('ID')->get();
        $positions = DB::table('lupositions')->orderBy('id')->get();
        return view('Member.add_member',['comps' => $comps,'nationalitys' => $nationalitys,'careers' => $careers,'degrees' => $degrees,'faculties' => $faculties,'jobs' => $jobs,'grades' => $grades,'org_Units' => $org_Units,'positions' => $positions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//       return $request;
        $dateNow = Carbon::now();
        $Add_Member = DB::table('HC_COMMITTEE_MEMBERS')->insert([
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
     * Display the specified resource.
     */
    public function show($id)
    {
        $attachments = DB::table('HC_COMMITTEE_DOCS')->where('comm_id',$id)->get();
        $member= DB::table('PR_EMPS')->where('ACTIVE','T')
            ->where('CONTRACT_TYPE','CM')
            ->where('comp_id',$id)
            ->get();
        $Comps = DB::table('LUCOMPANIES')->where('id',$id)->get();
        $emps = DB::table('PR_EMPS')->join('HC_COMMITTEE_MEMBERS', 'emp_id','=','mb_name' )->where('comp_id',$id)->get();
        $masters = collect(DB::select('SELECT CO.ID AS COMP_ID,
                                              CO.CODE AS COMP_CODE,
                                              CO.NAME AS COMP_NAME,
                                              MS.ID AS MS_ID,
                                              MS.CODE AS MS_CODE,
                                              MS.NAME AS MS_NAME,
                                              MS.COM_DATE AS MS_COM_DATE,
                                              MS.COMM as MS_COMM
                                         FROM HC_COMMITTEE_MSTERS MS, LUCOMPANIES CO
                                        WHERE MS.COMP_ID= CO.ID AND CO.ID ='.$id.' '))->first();
        return view('Member.detail', ['masters' => $masters, 'member' => $member,'attachments' => $attachments,'emps'=>$emps,'Comps'=>$Comps]);
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
        $dateNow = Carbon::now();
        $id = $request->Mem_id;
        $Comm_id = $request->Com_id;
        $Com_Mem_id = $request->Com_Mem_id;
//        return $id .'-'.$Comm_id.'-'.$Com_Mem_id;
        $Mem_Emp = DB::table('HC_COMMITTEE_MEMBERS')->where('mb_name',$id)->where('comm_id',$Comm_id)
            ->update([
                'mb_name'=>$request->Mem_name,
                'comm_id'=>$request->Com_id,
                'mb_comm'=>$request->Mem_Comm,
                'updated_by'=>Auth::user()->name,
                'updated_at'=>$dateNow,

            ]);
        toastr()->info('تمت تعديل عضو اللجنة بنجاح' ,'تعديلات');
        return back();
//        return redirect('/meeting.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hcCommitteeMembers $hcCommitteeMembers)
    {
        //
    }
}
