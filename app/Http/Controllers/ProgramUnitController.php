<?php

namespace App\Http\Controllers;

use App\Models\ProgramUnit;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;

class ProgramUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $units = ProgramUnit::where('program_id', $id)->get();
        $program = TrainingProgram::findOrFail($id);
        return view('program-units.index', compact('units' , 'program'));
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
//        dd($request);
        $program = TrainingProgram::select('name')->where('id' , $request->program_id)->first();
//        dd($program);
        $data = $request->validate([
            'program_id' => 'required',
            'name' => 'required',
            'content' => 'required|file|mimes:pdf',
        ]);
//        dd($data);
        $data['content'] = $request['content']->store($program->name . '/units');
//        dd($data);
        ProgramUnit::create($data);
        flash()->addSuccess('تم إضافة الوحدة بنجاح');
        return redirect()->back();
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
    public function destroy(Request $request)
    {
        $unit = ProgramUnit::findOrFail($request->unit);
        $unit->delete();
        flash()->addSuccess('عملية حذف ناجحة' , 'عملية ناجحة');
        return redirect()->back();
    }
}
