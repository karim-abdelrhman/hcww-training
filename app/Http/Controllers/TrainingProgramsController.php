<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingProgramsController extends Controller
{
    public function index()
    {
//        $programs = collect(DB::select(' SELECT hp.ID as "hpid", hp.code as "hpcode", hp.PROGRAM_NAME as "hpname", hpu.ID as "hpuid", hpu.CODE as "hpucode", hpu.UN_NAME as "hpuname"
//                                                 FROM HC_PROGRAM hp, HC_PROGRAM_UNIT hpu
//                                                WHERE hp.ID = hpu.PROGRAM_ID(+)' ));
        $programs =0; //DB::table('HC_PROGRAM')->orderBy('id')->get();
        return view('hc_program.index', compact('programs'));
    }


    public function create()
    {
        $levs = 0;//DB::table('HC_LVL')->get();
        $programs = 0;//DB::table('HC_PROGRAM')->orderBy('id')->get();
        return view('Program.add_program',compact('programs','levs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $rules = [
//            'title' => 'required',
//            'n_imgs' => 'required|mimes:pdf',
//            'detail' => 'required|array|min:1',
//            'code' => 'required|array|min:1',
//            'trprog' => 'required|array|min:1',
//
//        ];
//        $messages = [
//            'title.required' => 'الرجاء ادخال عنوان الخبر (بالعربى)',
//            'n_imgs.required' => 'الرجاء تحميل الصورة الرئيسية للخبر',
//            'n_imgs.mimes' => 'الرجاء التأكد من ان تكون الصورة الرئيسية باحد الامتدادات التاليه (pdf)',
//            'detail.required' => 'الرجاء ادخال تفاصيل الخبر (بالعربى)',
//            'detail.min' => 'الرجاء ادخال تفاصيل الخبر (بالعربى) ',
//            'code.required' => 'الرجاء ادخال تفاصيل الخبر (بالانجليزى)',
//            'code.min' => 'الرجاء ادخال تفاصيل الخبر (بالانجليزى) ',
//            'trprog.required' => 'الرجاء ادخال تفاصيل الخبر (بالانجليزى)',
//            'trprog.min' => 'الرجاء ادخال تفاصيل الخبر (بالانجليزى) ',
//        ];
//        $validator = Validator::make($request->all(), $rules, $messages);
//        if ($validator->fails()) {
//            notify()->error('', ' عفوا, الرجاء ادخال جميع البيانات المطلوبة  ');
//            return redirect()->Back()->withInput()->withErrors($validator);
//        } else {
//            try {
//                $seq = collect(DB::select("SELECT WEB_NEWS_SEQ.NEXTVAL nxt FROM DUAL"))->first();
//                $out = DB::table('WEB_NEWS')->insert(
//                    [
//                        'ID' => intval($seq->nxt),
//                        'CODE' => $request->title,
//                        'PROGRAM_NAME' => $request->title_en,
////                        'N_DATE' => $request->n_date,
////                        'S_IMG' => (string)$this->getS_ImgName($request,$seq->nxt),
////                        'IMGS' => (string)$this->getN_ImgName($request,$seq->nxt),
////                        'INS_USER' => Auth::user()->id
//
//                    ]);
////                echo "<pre> some_data_var_dump:=";var_dump($request->detail);echo "</pre>";
//                $details=[];
//                for($count = 0; $count < count($request->detail); $count++){
//                    $seq_det = collect(DB::select("SELECT WEB_NEWS_DETAILS_SEQ.NEXTVAL nxt FROM DUAL"))->first();
//                    $detail=[
//                        'DET_ID' => $seq_det->nxt,
//                        'NEWS_ID' => $seq->nxt,
//                        'DETAIL' => $request->detail[$count],
//                        'DETAIL_EN' => $request->detail_en[$count]
//                    ];
//                    array_push($details, $detail);
//                }
//                //echo "<pre> some_data_var_dump:=";var_dump($details);echo "</pre>";
//                $out_det = DB::table('WEB_NEWS_DETAILS')->insert($details);
//
//                if ($out == 1 and $out_det == 1)  {
//                    notify()->success('', 'تم  حفظ الخبر بنجاح ');
//
//                } else {
//                    notify()->error('', ' عفوا, حدث خطأ الرجاء المحاولة فى وقت اخر ');
//                }
//                return redirect()->action([NewsController::class, 'index']);
//            } catch (\Exception $e) {
//                // echo "<pre> some_data_var_dump:=".$e;echo "</pre>";
//                return view('website.404');
//            }
//        }
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $programs =0;// DB::table('HC_PROGRAM')->where('id',$id)->orderBy('id')->first();
        $details  = 0;// DB::table('HC_PROGRAM_UNIT')->where('PROGRAM_ID',$id)->get();
        $attachments  = 0;//DB::table('HC_PROGRAM_UNIT_MATERIALS')->where('PROG_ID',$id)->get();
        return view('Program.details_program',compact('programs','details','attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programs =0;// DB::table('HC_PROGRAM')->where('id',$id)->orderBy('id')->first();
        $details  =0; // DB::table('HC_PROGRAM_UNIT')->where('PROGRAM_ID',$id)->get();
        $attachments  =0;// DB::table('HC_PROGRAM_UNIT_MATERIALS')->where('PROG_ID',$id)->get();
        return view('Program.edit_program',compact('programs','details','attachments'));
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
