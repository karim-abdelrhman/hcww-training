<?php

namespace App\Http\Controllers;

use App\Models\TrainingCenter;
use App\Models\TrainingHall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainingHallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TrainingCenter $trainingCenter)
    {
        return view('training-halls.index' , [
            'trainingHalls' => TrainingHall::select('id','hall_number' , 'capacity' , 'image')->get(),
            'trainingCenter' => $trainingCenter
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'training_center_id' => 'required|integer|exists:training_centers,id',
            'hall_number' => 'required|numeric',
            'capacity' => 'required|numeric',
            'image' => 'required|image|file'
        ]);
        $data['image'] = $data['image']->store('training_halls');
        $hall = TrainingHall::create($data);
        flash()->addSuccess('تم إضافة القاعة بنجاح', 'عملية ناجحة');
        return redirect()->route('centers.training-halls.index' , $hall->trainingCenter->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingHall $trainingHall)
    {
        $data = $request->validate([
            'hall_number' => 'required|numeric',
            'capacity' => 'required|numeric',
            'image' => 'required|image|file'
        ]);

        if(isset($data['image'])) {
            File::delete(asset('storage/' . $trainingHall->image));
            $data['image'] =  $data['image']->store('images');
        }
        $trainingHall->update($data);
        flash()->addSuccess('تم تعديل البيانات بنجاح' , 'عملية ناجحة');
        return redirect()->route('centers.training-halls.index' , $trainingHall->trainingCenter->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingHall $trainingHall)
    {
        if(isset($trainingHall->image)) {
            File::delete(asset('storage/' . $trainingHall->image));
        }
        $center_id = $trainingHall->trainingCenter->id;
        $trainingHall->delete();
        flash()->addSuccess('تم الحذف بنجاح' , 'عملية ناجحة');
        return redirect()->route('centers.training-halls.index' , $center_id);
    }
}
