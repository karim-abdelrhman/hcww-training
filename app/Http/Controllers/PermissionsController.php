<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('id')->get();
        return view('roles.permission', compact('permissions'));
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
        Permission::create([
            'name' => $request->permission_name,
            'guard_name' => $request->guard_name,

        ]);
        toastr()->success('تم اضافة الصلاحية بنجاح');
        return redirect('/permission');
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
//        return $request;
        $id = $request->id;
//        $this->validate($request, [
//            'name' => 'required|max:255|unique:,name,'.$id,
//            'guard_name' => 'required',
//        ],[
////            'name.required' =>'يرجي ادخال اسم الصلاحية',
////            'name.unique' =>'اسم الصلاحية مسجل مسبقا',
////            'guard_name.required' =>'يرجي ادخال البيان',
//        ]);
        $sections = Permission::find($id);
        $sections->update([
            'NAME' => $request->name,
            'GUARD_NAME' => $request->guard_name,
        ]);
        toastr()->success('تم تعديل الصلاحية بنجاج');
        return redirect('/permission');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
