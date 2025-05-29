<?php

namespace App\Http\Controllers;

use App\Models\CareerPath;
use App\Models\position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LupositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = DB::table("lupositions")->orderBy('id')->get();
        return view('LuPositions.position', compact('positions'));
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
        $this->validate($request, [
            'Carer_name' => 'required',
            'Carer_code' => 'required',
        ],[
            'Carer_name.required' =>'يرجي ادخال المسمى الوظيفى',
            'Carer_code.required' => 'يرجى ادخال الكود',
        ]);

        $input = $request->all();
        $input['code'] =$request->input('Carer_code');
        $input['name']=$request->input('Carer_name');
        $input['comm'] = $request->input('Carer_comm');
        $input['created_by'] = Auth::user()->id;
        $comp = position::create($input);
        toastr()->success('تمت الاضافة بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(position $luposition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(position $luposition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, position $luposition)
    {
        $id = $request->pro_id;
        $this->validate($request, [
            'Carer_name' => 'required',
            'Carer_code' => 'required',

        ],[
            'Carer_name.required' =>'يرجي ادخال المسمى الوظيفى',
            'Carer_code.required' => 'يرجى ادخال الكود',
        ]);
        $comps = DB::table('lupositions')
            ->where('id', $id)
            ->update([
                'code' => $request->Carer_code,
                'name' => $request->Carer_name,
            ]);
        toastr()->success('تمت التعديل بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $comps = DB::table('lupositions')->where('id', $id)->delete();
        toastr()->warning('تمت الحذف  بنجاح');
        return back();
    }
}
