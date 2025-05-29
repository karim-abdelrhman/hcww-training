<?php

namespace App\Http\Controllers;

use App\Models\CareerPath;
use App\Models\lucompanies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LucareerpathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers=DB::table('lucareerpaths')->orderBy('id')->get();
        return view('LuCareerPath.career',compact('careers'));
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
        $data = $this->validate($request, [
            'name' => 'required|string',
            'code' => 'required|string',
            'comm' => 'nullable|string',
        ],[
            'name.required' =>'يرجي ادخال المجموعة النوعية',
            'code.required' => 'يرجى ادخال الكود',
        ]);
        $data['created_by'] = Auth::user()->id;
        CareerPath::create($data);
        flash()->addSuccess('تمت الإضافة بنجاح' , 'نجح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerPath $lucareerpath)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerPath $lucareerpath)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->pro_id;
        $this->validate($request, [
            'Carer_name' => 'required',
            'Carer_code' => 'required',
        ],[
            'Carer_name.required' =>'يرجي ادخال المسار الوظيفى',
            'Carer_code.required' => 'يرجى ادخال الكود',
        ]);
        $comps = DB::table('lucareerpaths')
            ->where('id', $id)
            ->update(['code' => $request->Carer_code,
                'name' => $request->Carer_name,
            ]);
        flash()->addSuccess('تمت التعديل بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $comps = DB::table('lucareerpaths')->where('id', $id)->delete();
        flash()->addSuccess('تمت الحذف  بنجاح');
        return back();
    }
}
