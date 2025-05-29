<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\CareerPath;
use App\Models\Company;
use App\Models\Country;
use App\Models\Degree;
use App\Models\EmployeeType;
use App\Models\Faculty;
use App\Models\grade;
use App\Models\Job;
use App\Models\Organization;
use App\Models\Position;
use App\Models\employee;
use App\Models\prEmpDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comps = DB::table('LUCOMPANIES')->whereIn('id', Auth::user()->comp_id)->orderBy('id')->get();
        $emps = DB::table('PR_EMPS')->whereIn('comp_id', Auth::user()->comp_id)->orderBy('emp_id')->get();
        $employees = Employee::with(['types', 'degree', 'position', 'careerPath', 'company', 'grade', 'job', 'organization', 'faculty', 'degree'])->get();
        return view('employees.index', compact('emps', 'comps', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create', [
            'companies' => Company::all(),
            'countries' => Country::all(),
            'organizations' => Organization::all(),
            'positions' => Position::all(),
            'empTypes' => EmployeeType::all(),
            'careers' => CareerPath::all(),
            'degrees' => Degree::all(),
            'jobs' => Job::all(),
            'grades' => Grade::all(),
            'faculties' => Faculty::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        $data = $request->validated();
        foreach ($request->files as $name => $file) {
            if ($name == 'employment_status') {
                $data[$name] = $data[$name]->store('employees/employment_statuses');
            } else {
                $data[$name] = $data[$name]->store('employees');
            }
        }
        $data['birth_date'] = date('Y-m-d', strtotime($data['birth_date']));
        $seq_employee = collect(DB::select("SELECT EMPLOYEES_ID_SEQ.NEXTVAL nxt FROM DUAL"))->first();
        $data['id'] = (int)$seq_employee->nxt;
        $data['created_by'] = auth()->user()->name;
        $data['updated_by'] = null;
        $employee = Employee::create(collect($data)->except('employment_status')->toArray());
        $employee->types()->sync($data['employment_status']);
        flash()->addSuccess('تمت الاضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['types', 'degree', 'position', 'careerPath', 'company', 'grade', 'job', 'organization', 'faculty', 'degree' , 'employmentStatus']);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('employees.edit', [
            'employee' => Employee::with(['employeeType', 'degree', 'position', 'careerPath', 'company', 'grade', 'job', 'organization', 'faculty', 'degree',])->find($id),
            'companies' => Company::all(),
            'countries' => Country::all(),
            'organizations' => Organization::all(),
            'positions' => Position::all(),
            'empTypes' => EmployeeType::all(),
            'careers' => CareerPath::all(),
            'degrees' => Degree::all(),
            'jobs' => Job::all(),
            'grades' => Grade::all(),
            'faculties' => Faculty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            if ($employee->image) {
                File::delete(storage_path('app/public/' . $employee->image));
            }
            $data['image'] = $data['image']->store('employees');
        }
        $employee->update($data);
        flash()->addSuccess('تم تحديث البيانات بنجاح', 'عملية ناجحة');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        flash()->addSuccess('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('employee.index');
    }

    public function getOrgUnit($id)
    {
        $products = DB::table("LUORGUNITS")->where("comp_id", $id)->pluck("name", "id");
        return json_encode($products);
    }
}
