<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrgunitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $govs = DB::table('HC_GOV')->whereIn('gov_id',Auth::user()->comp_id)->orderBy('ordr')->get();
        $OrgUnitAll = DB::table('HC_ORG_UNIT')->whereIn('gov_id',Auth::user()->comp_id)->orderBy('id')->get();
        $orgUnits =  collect(DB::select(' select  ou1.ID as "MainId", ou1.A_DSC as "MainName",ou2.ID as "SubId", ou2.A_DSC as "SubName",ou2.CODE as "CODE",ou2.gov_name as "COMP"
                                                  from  HC_ORG_UNIT ou1, HC_ORG_UNIT ou2
                                                  where ou1.ID(+) = ou2.PARENT_ID order by ou2.ID asc' ));
        return view('orgunits.orgunit', compact('orgUnits','govs','OrgUnitAll'));
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
//        return  $request;
        DB::table('HC_ORG_UNIT')->insert([
            'code' => $request->code,
            'a_dsc' => $request->a_name,
            'e_dsc' => $request->type,
            'note_notes_id' => $request->note,
            'active' => 'T',
            'deleted' => 'F',
            'parent_id' => $request->OrgU,
            'seq1' => '',
            'seq2' => '',
            'gov_id' => $request->Comp,
            'gov_name' => $request->compName,
            'created_by'=>Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->flash('Add', 'تمت الاضافه بنجاح');
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
    public function getOrgByGov($id)
    {
        $products = DB::table("HC_ORG_UNIT")->where("gov_id", $id)->pluck("a_dsc", "id");
        return json_encode($products);
    }
    public function getCompsGov($id)
    {
        $govsName = DB::table("HC_GOV")->where("gov_id", $id)->pluck("gov_name", "gov_id");
        return json_encode($govsName);
    }

}
