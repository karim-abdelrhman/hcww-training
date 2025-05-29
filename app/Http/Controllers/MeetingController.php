<?php

namespace App\Http\Controllers;

use App\Models\hcCommitteeDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $member= DB::table('PR_EMPS')->where('ACTIVE','T')
                                    ->where('CONTRACT_TYPE','CM')
                                    ->get();
            $masters = DB::select("SELECT CO.ID AS COMP_ID,CO.CODE AS COMP_CODE,CO.NAME AS COMP_NAME,
                                          MS.ID AS MS_ID,MS.CODE AS MS_CODE, MS.NAME AS MS_NAME,MS.COM_DATE AS MS_COM_DATE
                                     FROM HC_COMMITTEE_MSTERS MS, LUCOMPANIES CO
                                    WHERE MS.COMP_ID= CO.ID");
            $comps = DB::table('LUCOMPANIES')->whereIn('id',Auth::user()->comp_id)->get();

        return view('meeting.meet', ['masters' => $masters, 'member' => $member,'comps' => $comps]);

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
        $seq_mst = collect(DB::select("SELECT HC_COMMITTEE_MSTERS_ID_SEQ.NEXTVAL nxt FROM DUAL"))->first();
        $comm_mst = DB::table('HC_COMMITTEE_MSTERS')->insert([
            'id'        => intval($seq_mst->nxt),
            'code'      =>  $request->code,
            'name'      =>  $request->name,
            'comp_id'   =>   $request->Comps,
            'com_date'  =>   $request->com_date,
            'comm'      =>    $request->note,
            'created_by'=>Auth::user()->name,
            'created_at'=>$dateNow,
        ]);
        $members=[];
        for ($count = 0; $count < count($request->members); $count++) {
            $seq_member = collect(DB::select("SELECT HC_COMMITTEE_MEMBERS_ID_SEQ.NEXTVAL nxt FROM DUAL"))->first();
            $Comm_members = [
                'id'            => $seq_member->nxt,
                'comm_id'       =>$seq_mst->nxt,
                'mb_name'       => $request->members[$count],
                'created_by'    => Auth::user()->name,
                'created_at'    => $dateNow,
            ];
            array_push($members, $Comm_members);
        }
        $Programs_det = DB::table('HC_COMMITTEE_MEMBERS')->insert($members);


         if ($request->hasFile('file_name')) {
            $comm_id = intval($seq_mst->nxt);
            $Att_Date = date('Y-m-d');
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
            $doc_code = $request->Code;

            $attachments = new hcCommitteeDoc();
            $attachments->code = $doc_code;
            $attachments->name = $file_name;
            $attachments->created_by = Auth::user()->name;
            $attachments->comm_id = $comm_id;
            $attachments->com_date = $Att_Date;
            $attachments->save();

            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachments/committee/' . $comm_id  ), $imageName);
        }

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
            ->get();
        $Comps = DB::table('LUCOMPANIES')->get();
        $emps = DB::table('PR_EMPS')->join('HC_COMMITTEE_MEMBERS', 'emp_id','=','mb_name' )->where('comm_id',$id)->get();
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
        return view('meeting.details_meeting', ['masters' => $masters, 'member' => $member,'attachments' => $attachments,'emps'=>$emps,'Comps'=>$Comps]);
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
        return $request;
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
