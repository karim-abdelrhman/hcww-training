<?php

namespace App\Http\Controllers;

use App\Models\lucompanies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comps = DB::table('lucompanies')->orderBy('id')->get();
        return view('comps.comp', compact('comps'));
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
        $this->validate($request, [
            'Comp_name' => 'required',
            'Comp_code' => 'required',

        ]);

        $input = $request->all();
        $input['code'] =$request->input('Comp_code');
        $input['name']=$request->input('Comp_name');
        $input['code2']=$request->input('Comp_code2');
        $input['comm'] = $request->input('Comp_comm');
        $input['created_by'] = Auth::user()->id;
        $comp = lucompanies::create($input);
        toastr()->success('تمت الاضافة بنجاح');
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
        $id = $request->pro_id;
        $this->validate($request, [
            'Comp_code2' => 'required',

        ],[
            'Comp_code2.required' =>'يرجي ادخال كود الشركة',
        ]);
        $comps = DB::table('lucompanies')
                ->where('id', $id)
               ->update(['code2' => $request->Comp_code2,
                   ]);
        toastr()->success('تمت التعديل بنجاح');
        return back();

//        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $comps = DB::table('lucompanies')->where('id', $id)->delete();
        toastr()->warning('تمت الحذف بنجاح بنجاح');
        return back();
    }
}
