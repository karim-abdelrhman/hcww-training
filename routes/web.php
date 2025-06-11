<?php

use App\Http\Controllers\CompanyCommitteeController;
use App\Http\Controllers\CompController;
use App\Http\Controllers\EmpsDetailsController;
use App\Http\Controllers\EvaluationEmpsController;
use App\Http\Controllers\FacultiesController;
use App\Http\Controllers\HcCommitteeDocController;
use App\Http\Controllers\HcCommitteeEmpsController;
use App\Http\Controllers\HcCommitteeMembersController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LucareerpathController;
use App\Http\Controllers\LudegreesController;
use App\Http\Controllers\LugobsController;
use App\Http\Controllers\LugradeController;
use App\Http\Controllers\LuorgunitController;
use App\Http\Controllers\LupositionController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\OrgunitController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PrEmpDocController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramUnitController;
use App\Http\Controllers\QualController;
use App\Http\Controllers\TraineesController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainerDetailsController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\TrainingHallController;
use App\Http\Controllers\TrainingplacesController;
use App\Http\Controllers\TrainingProgramController;
use App\Http\Controllers\TrainingProgramsController;
use App\Http\Controllers\TrProgramsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', function () {
        return view('auth.login');

    });
//event(new MyEvent('hi',"{{Auth::user()->name}}"));
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/register', function () {
        return view('auth.login');
    });
//    Auth::routes(['register' => false]);

Route::get('/dashboard', function () {
    return view('blades.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    // event(new MyEvent('hello world'));
    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permission', PermissionsController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('editprofile/{id}', [ProfileController::class,'show']);
    Route::post('/profileup/{id}',  [ProfileController::class,'update'])->name('profileup');

    /*************************  المدرب ***********************/
//    Route::resource('trainers', TrainerController::class);
//    Route::get('/TrainersDetails/{id}',  [TrainerDetailsController::class, 'edit']);
//    Route::get('/edit_tr/{id}',  [TrainerController::class, 'edit']);
//    Route::get('/getcomps/{id}', [TrainerController::class, 'getcomps']);
//
//
//    /*************************  المتدربين ***********************/
//    Route::resource('trainees',  TraineesController::class);
//    Route::get('/empDetails/{id}', [TraineesController::class,'show']);
//    Route::get('/edit_emp/{id}', [TraineesController::class,'edit']);
//    Route::get('/degrees/{id}', [TraineesController::class,'getdegrees']);
//    Route::get('/getOrgComp/{id}', [TraineesController::class,'getOrgComp']);

});

Route::middleware(['auth', 'verified'])->group(function () {
    /******************  الشركات *************************/
    Route::resource('comps', CompController::class); // done
    /******************  المسار الوظيفى *************************/
    Route::resource('careers', LucareerpathController::class); // done
    /******************  المسمى الوظيفى *************************/
    Route::resource('positions', LupositionController::class); // done
    /*************************  الدرجة ***********************/
    Route::resource('grades', LugradeController::class);
    /*************************  المؤهل ***********************/
    Route::resource('degrees', LudegreesController::class);
    /*************************  الوظيفة ***********************/
    Route::resource('jobs', LugobsController::class);
    /****************************** الكلية ************************************/
    Route::resource('faculty',  FacultiesController::class);
    /*************************  الادارات ***********************/
    Route::resource('orgunits', LuorgunitController::class);
    Route::get('/getOrgByGov/{id}', [LuorgunitController::class, 'getOrgByGov']);
    Route::get('/getCompOrg/{id}', [LuorgunitController::class, 'getCompsGov']);
    /*************************  مكان التدريب ***********************/
    Route::resource('training_place',  TrainingplacesController::class);
    /************************* الموظفين ***********************/
    Route::resource('employee',  EmployeeController::class);
    Route::get('/Comp/{id}', [EmployeeController::class,'getOrgUnit']);
    Route::resource('empDocs',PrEmpDocController::class);


    /*****************************  Training_programs   البرامج التدريبية  *****************************/
    Route::resource('training-programs' , TrainingProgramController::class);
    Route::get('training-programs/{trainingProgram}/units' ,[ProgramUnitController::class,'index'])->name('program-units');
    Route::delete('training-programs/units/delete',[ProgramUnitController::class,'destroy'])->name('unit-delete');
    Route::post('training-programs/units/store',[ProgramUnitController::class,'store'])->name('unit-store');

    Route::resource('train_program',  TrProgramsController::class);
    Route::resource('programDet',  TrProgramsController::class);
    Route::resource('mater',  MaterialsController::class);
//    Route::get('/add_program',[  TrProgramsController::class,'create']);
//    Route::get('/edit_program/{id}',  [TrProgramsController::class,'edit']);
//    Route::get('/show_program/{id}',  [TrProgramsController::class,'show']);
    /************************* محضر الاجتماع للجنة Minutes of the Committee Meeting*******************/
    Route::resource('/meeting',MeetingController::class);
    /******************* file att in the Committee Meeting اسماء المتدربين فى اللجنة ***************************/
    Route::resource('/MeetAttachments',HcCommitteeDocController::class);
    /******************* Member in the Committee Meeting اسماء لجان الشركات فى اللجنة ***************************/
    Route::resource('/members',HcCommitteeMembersController::class);
    Route::resource('companies-committees',CompanyCommitteeController::class);
//    Route::get('/memDetails/{id}')
    /******************* Emp in the Committee Meeting اسماء المتدربين فى اللجنة ***************************/
    Route::resource('/Trainer',HcCommitteeEmpsController::class);
    Route::get('/getEmpCode/{id}', [HcCommitteeEmpsController::class, 'getEmpCode']);
    /******************* Assessment in the Committee Meeting تقييم المتدربين فى اللجنة ***************************/
    Route::resource('/Assessment',EvaluationEmpsController::class);
//    Route::post('/store2',[EvaluationEmpsController::class,'store2']);

    Route::resource('/companies-committees' , CompanyCommitteeController::class);
    Route::get('/companies-committees/{company_committee:id}/add-member' , [CompanyCommitteeController::class , 'addMember'])->name('companies-committees.add-member');
    Route::post('/companies-committees/{company_committee:id}/store-members' , [CompanyCommitteeController::class , 'storeMembers'])->name('companies-committees.store-members');
    Route::get('/company-members/{company_committee:id}' , [CompanyCommitteeController::class , 'getMembers'])->name('companies-committees.get-members');
    Route::post('/getExternalMembers' , [CompanyCommitteeController::class , 'getExternalMembers']);
    Route::post('/storeExternalMembers/{company_committee:id}/store-external-members' , [CompanyCommitteeController::class , 'storeExternalMembers'])->name('companies-committees.store-external-members');
    Route::get('/add-external-members/{company_committee:id}' ,[CompanyCommitteeController::class , 'addExternalMembers'])->name('companies-committees.add-external-members');

    Route::resource('training-centers' , TrainingCenterController::class);
    Route::get('training-centers/{trainingCenter:id}/training-halls', [TrainingHallController::class, 'index'])->name('centers.training-halls.index');
    Route::resource('training-halls' , TrainingHallController::class);

    Route::resource('trainers', TrainerController::class);
});
Route::get('/{page}', [AdminController::class,'index'])->middleware(['auth', 'verified']);
require __DIR__.'/auth.php';
