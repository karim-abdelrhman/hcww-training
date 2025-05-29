<?php

namespace App\Http\Controllers;

use App\Models\trainigPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//use Carbon\Carbon;

class TrainingplacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trPlaces = DB::table('TRAINIGPLACE')->orderBy('id')->get();
        $comps = DB::table('lucompanies')->orderBy('id')->get();
        return view('training-centers.trPlace',compact('trPlaces','comps'));
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
//       $rules = [
//            'code'      => 'required',
//            'name'      => 'required',
//            'fax'       => 'numeric|between:9,11',
//            'phone'     => 'required|digits:11',
//            'mobile'    => 'required|digits:11',
//            'email'     => 'required|email|unique:trainigplace',
//            'address'   => 'max:255',
//            'mag_phone' => 'required|digits:11',
//            'gm_phone'  => 'required|digits:11',
//            'sh_phone'  => 'required|digits:11',
//            'comm'      => 'max:255',
//
//       ];
//       $messages = [
//            'name.required'         =>'يرجي ادخال المسمى الوظيفى',
//            'code.required'         => 'يرجى ادخال الكود',
//            'fax.numeric'           => 'يرجى ادخال ارقام فقط',
//            'fax.between'           => 'يرجى ادخال الارقام من 9 الى 11 رقم ',
//            'phone.required'        => 'يرجى ادخال رقم الموبيل ',
//            'phone.digits'          => 'يرجى ادخال 11 رقم  ',
//            'email.required'        => 'يرجى ادخال البريد الالكترونى  ',
//            'email.unique'          => 'تم ادخال البريد الالكترونى من قبل ',
//            'address.max'           => 'العنوان طويل جدا ',
//            'mag_phone.required'    => 'يرجى ادخال رقم الموبيل ',
//            'mag_phone.digits'      => 'يرجى ادخال 11 رقم',
//            'gm_phone.required'     => 'يرجى ادخال رقم الموبيل ',
//            'gm_phone.digits'       => 'يرجى ادخال 11 رقم',
//            'sh_phone.required'     => 'يرجى ادخال رقم الموبيل ',
//            'sh_phone.digits'       => 'يرجى ادخال 11 رقم',
//            'comm.max'              => 'العنوان طويل جدا ',
//       ];
//       $validator = Validator::make($request->all(), $rules, $messages);
//       if ($validator->fails()) {
//           toastr()->error('', ' عفوا, الرجاء ادخال جميع البيانات المطلوبة  ');
//            return redirect()->Back()->withInput()->withErrors($validator);
//       } else {
//           try {
               $Places = DB::table('TRAINIGPLACE')->insert([
                   'code' => $request->code,
                   'name' => $request->name,
                   'address' => $request->address,
                   'phone' => $request->phone,
                   'mobile' => $request->mobile,
                   'fax' => $request->fax,
                   'email' => $request->email,
                   'mag_name' => $request->mag_name,
                   'mag_phone' => $request->mag_phone,
                   'gm_name' => $request->gm_name,
                   'gm_phone' => $request->gm_phone,
                   'sh_name' => $request->sh_name,
                   'sh_phone' => $request->sh_phone,
                   'comp_id' => $request->comp,
                   'comm' => $request->comm,
                   'created_by' => Auth::user()->id,

               ]);
               toastr()->success('تمت الاضافة بنجاح');
               return back();
//           } catch (\Exception $e) {
//               echo "<pre> some_data_var_dump:=" . $e;
//               echo "</pre>";
//               //return view('website.404');
//           }
//       }
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
//        $this->validate($request, [
//            'fax' => 'required',
//            'tel' => 'required',
//            'email' => 'required',
//            'adress' => 'required',
//        ],[
//            'fax.required' =>'يرجي ادخال رقم الفاكس',
//            'tel.unique' =>'يرجى ادخال رقم الهاتف',
//            'email.required' =>'يرجي ادخال البريد الالكترونى',
//            'adress.required' =>'يرجي ادخال العنوان',
//        ]);
        $hc_pro_locations = DB::table('TRAINIGPLACE')
            ->where('id', $request->pro_id)
            ->update([
                'code' => $request->code,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'fax' => $request->fax,
                'email' => $request->email,
                'mag_name' => $request->mag_name,
                'mag_phone' => $request->mag_phone,
                'gm_name' => $request->gm_name,
                'gm_phone' => $request->gm_phone,
                'sh_name' => $request->sh_name,
                'sh_phone' => $request->sh_phone,
                'comp_id' => $request->comp,
                'comm' => $request->comm,
                'updated_by' => Auth::user()->id,


            ]);
        toastr()->info('تم تحديث البيان بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $comps = DB::table('TRAINIGPLACE')->where('id', $id)->delete();
        toastr()->warning('تمت الحذف  بنجاح');
        return back();
    }
}
