<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingCentersStoreRequest;
use App\Http\Requests\TrainingCenterUpdateRequest;
use App\Models\Company;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainingCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('training-centers.index', [
            'trainingCenters' => TrainingCenter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('training-centers.create', ['companies' => Company::select('id', 'name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingCentersStoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('training-centers');
        }
        TrainingCenter::create($data);
        flash()->addSuccess('تم إضافة المركز بنجاح', 'عملية ناجحة');
        return redirect()->route('training-centers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingCenter $trainingCenter)
    {
        return view('training-centers.show', [
            'trainingCenter' => $trainingCenter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingCenter $trainingCenter)
    {
        return view('training-centers.edit', [
            'trainingCenter' => $trainingCenter->load('company'),
            'companies' => Company::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingCenterUpdateRequest $request, TrainingCenter $trainingCenter)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            File::delete(storage_path('app/public/' . $trainingCenter->image));
            $data['image'] = $data['image']->store('training-centers');
        }
        $trainingCenter->update($data);
        flash()->addSuccess('تمت تعديل البيانات بنجاح', 'عملية ناجحة');
        return redirect()->route('training-centers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingCenter $trainingCenter)
    {
        if(isset($trainingCenter->image)){
            File::delete(storage_path('app/public/' . $trainingCenter->image));
        }
        $trainingCenter->delete();
        flash()->addSuccess('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('training-centers.index');
    }
}
