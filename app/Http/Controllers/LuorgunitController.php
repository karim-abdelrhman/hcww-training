<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LuorgunitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $govs = DB::table('lucompanies')->whereIn('id',Auth::user()->comp_id)->get();
//        $OrgUnitAll = DB::table('luorgunits')->join('luorgunits','luorgunits.id','=','luorgunits.parent_id')>whereIn('luorgunits.comp_id',Auth::user()->comp_id)->where('luorgunits.parent_id','>',null)->orderBy('luorgunits.id')->get();
        $OrgUnitAll = collect(DB::select(' select  ou1.ID as "MainId", ou1.NAME as "MainName",ou2.ID as "SubId", ou2.NAME as "SubName",ou2.CODE as "CODE" , co.NAME as "comp"
                                                  from  luorgunits ou1, luorgunits ou2,LUCOMPANIES co
                                                  where ou1.ID(+) = ou2.PARENT_ID
                                                  and ou2.comp_id = co.id order by ou2.ID asc' ));
        return view('LuOrgUnits.orgunit', compact('govs','OrgUnitAll'));
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
        $request->validate([
            'code' => 'required',
            'a_name'=>'required|min:3|max:999',
            'Comp'=>'required',
            'compName'=>'required',
        ]);

        DB::table('luorgunits')->insert([
            'code'=>$request->code,
            'name'=>$request->a_name,
            'comp_id'=>$request->Comp,
            'parent_id'=>$request->OrgU,
            'created_by'=>Auth::user()->id,
        ]);
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
        $id = $request->id;
        $this->validate($request, [
            'code' => 'required',
            'a_name' => 'required',
            'a_name' => 'required',

        ],[
            'Carer_name.required' =>'يرجي ادخال الوظيفة',
            'Carer_code.required' => 'يرجى ادخال الكود',
        ]);
        $orgunit = DB::table('luorgunits')
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
    public function destroy(string $id)
    {
        //
    }
    public function getOrgByGov($id)
    {
        $products = DB::table("luorgunits")->where("comp_id", $id)->pluck("name", "id");
        return json_encode($products);
    }
    public function getCompsGov($id)
    {
        $govsName = DB::table("lucompanies")->where("id", $id)->pluck("name", "id");
        return json_encode($govsName);
    }

}
