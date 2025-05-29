<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCommitteeMembersStoreRequest;
use App\Models\Company;
use App\Models\CompanyCommittee;
use App\Models\CompanyCommitteeMember;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $committees = DB::table('company_committees AS COMMITTEES')
            ->join('LUCOMPANIES AS COMPANIES', 'COMPANIES.ID', '=', 'COMMITTEES.COMPANY_ID')
            ->select('COMMITTEES.*', 'COMPANIES.NAME', 'COMPANIES.CODE', 'COMPANIES.CODE2')
            ->get();
        $companies = DB::table('LUCOMPANIES')->select('id', 'name')->get();
        $committee_members = DB::table('PR_EMPS')
            ->where('CONTRACT_TYPE', '=', 'CM')
            ->select('emp_id', 'name', 'contract_type')
            ->get();

        return view('companies_committees.index', [
            'committees' => $committees,
            'companies' => $companies,
            'committee_members' => $committee_members,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:LUCOMPANIES,ID',
        ]);

        DB::table('company_committees')->insert([
            'company_id' => $request->get('company_id'),
            'created_by' => Auth::user()->id,
        ]);
        flash()->addSuccess('تم إضافة اللجنة بنجاح');
        return redirect(route('companies-committees.index'));
    }

    public function addMember(CompanyCommittee $company_committee)
    {
        return view('companies_committees.add_member', [
            'company_committee' => DB::table('LUCOMPANIES')->where('ID', $company_committee->company_id)->first(),
            'members' => Employee::whereHas('company', function ($query) use ($company_committee) {
                $query->where('id', '=', $company_committee->company_id);
            })->get(),
            'committeeMembers' => CompanyCommitteeMember::where('company_id', $company_committee->company_id)
                ->with(['employee', 'company'])
                ->get()
        ]);
    }

    public function storeMembers(CompanyCommitteeMembersStoreRequest $request, CompanyCommittee $company_committee)
    {
        $data = $request->validated();

        // Get currently stored members for this company
        $existingMembers = CompanyCommitteeMember::where('company_id', $data['company_id'])
            ->pluck('employee_id')
            ->toArray();

        // Get the new selected members from the request
        $newMembers = $data['members']; // Array of selected employee IDs

        // Find members that need to be removed (existing but not in new selection)
        $membersToDelete = array_diff($existingMembers, $newMembers);

        // Find members that need to be added (new but not in existing)
        $membersToAdd = array_diff($newMembers, $existingMembers);

        // Delete members that are no longer selected
        CompanyCommitteeMember::where('company_id', $data['company_id'])
            ->whereIn('employee_id', $membersToDelete)
            ->delete();

        // Add new members
        foreach ($membersToAdd as $member) {
            CompanyCommitteeMember::firstOrCreate([
                'company_id' => $data['company_id'],
                'employee_id' => $member,
            ]);
        }
        flash()->addSuccess('تم الإضافة بنجاح', 'عملية ناجحة');
        return redirect(route('companies-committees.index'));
    }

    public function getMembers(CompanyCommittee $company_committee)
    {
        $members = CompanyCommitteeMember::where('company_id', $company_committee->company_id)
            ->with(['employee', 'company']) // Load employee & company details
            ->get();
        return view('companies_committees.members', compact('members' , 'company_committee'));
    }

    public function getExternalMembers(Request $request)
    {
        $members = Employee::where('company_id', $request->get('company_id'))
            ->select('id', 'name')
            ->get();
        return response()->json(['members' => $members]);
    }

    public function addExternalMembers(CompanyCommittee $company_committee)
    {
        return view('companies_committees.add-external-member', [
            'company_committee' => $company_committee,
            'companies' => Company::where('id' , '!=' , $company_committee->company_id)->get()
        ]);
    }

    public function storeExternalMembers(Request $request , CompanyCommittee $company_committee)
    {
        $data = $request->validate([
            'company_id' => 'required|exists:LUCOMPANIES,ID',
            'members' => 'required|array',
        ]);
        foreach ($data['members'] as $member) {
            CompanyCommitteeMember::create([
                'company_id' => $data['company_id'],
                'employee_id' => $member,
            ]);
        }
        flash()->addSuccess('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect(route('companies-committees.index'));
//        dd($request , $company_committee);
    }
    /**
     * Display the specified resource.
     */
    public function show(CompanyCommittee $companyCommittee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyCommittee $companyCommittee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyCommittee $companyCommittee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyCommittee $companyCommittee)
    {
        //
    }
}
