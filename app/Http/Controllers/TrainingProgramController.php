<?php

namespace App\Http\Controllers;

use App\Models\ProgramUnit;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('training-programs.index', [
            'programs' => TrainingProgram::with('units')->select('id', 'name', 'description')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('training-programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'unit_names' => 'required|array',
            'unit_names.*' => 'required|string',
            'contents' => 'required|array',
        ]);

        $program = TrainingProgram::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);



        if (isset($data['unit_names']) && is_array($data['unit_names'])) {

            if (isset($data['contents'])) {
                foreach ($data['contents'] as $key => $content) {
                    $data['contents'][$key] = $content->store($program->name . '/units');
                }
            }

            foreach ($data['unit_names'] as $key => $unit_name) {
                ProgramUnit::create([
                    'program_id' => $program->id,
                    'name' => $unit_name,
                    'content' => $data['contents'][$key],
                ]);
            }
        }
        flash()->addSuccess('تمت الاضافة بنجاح', 'عملية ناجحة');
        return redirect(route('training-programs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingProgram $trainingProgram)
    {
        dd($trainingProgram);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingProgram $trainingProgram)
    {
        return view('training-programs.edit', [
            'program' => $trainingProgram->load('units'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingProgram $trainingProgram)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'unit_names' => 'required|array',
            'unit_names.*' => 'required|string',
            'contents' => 'required|array',
        ]);

        dd($data);

        $trainingProgram->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

//        if($data['contents']) {}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingProgram $trainingProgram)
    {
        $trainingProgram->delete();
        flash()->addSuccess('تم الحذف بنجاح', 'عملية حذف ناجحة');
        return redirect(route('training-programs.index'));
    }
}
