@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet">
    <!-- Internal Fileupload css -->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Internal Fancy uploader css -->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>
    <!-- Internal Sumoselect css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!-- Internal  TelephoneInput css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <style>
        #dependable1, #dependable_date1, #tr_side1, #comp1, #compName1 {
            display: none;
        }
    </style>
@endsection
@section('title')
    تعديل بيانات الموظف
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4>
                <a href="{{ route('employee.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    العاملين</span></a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل موظف</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.update' , $employee->id) }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="emp_name" class="control-label">اسم الموظف</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="Emp_name" name="name" value="{{$employee->name}}"
                                       title="يرجي ادخال أسم الموظف " required>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Emp_code" class="control-label @error('code') is-invalid @enderror">كود الموظف</label>
                                <input type="text" class="form-control" id="Emp_code" name="code" value="{{ $employee->code }}"
                                       title="يرجي ادخال كود الموظف" required>
                                @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>تاريخ الميلاد</label>
                                <input class="form-control fc-datepicker @error('birth_date') is-invalid @enderror" name="birth_date" value="{{$employee->birth_date}}" placeholder="YYYY-MM-DD"
                                       type="text" required>
                                @error('birth_date')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div><br>
                        {{--2--}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select name="company_id" class="form-control SlectBox @error('company_id') is-invalid @enderror">
                                    <!--placeholder-->
                                    <option value="" selected disabled>--اختر الشركة--</option>
                                    @foreach ($companies as $comp)
                                        <option value="{{ $comp->id }}" {{ $employee->company_id == $comp->id ? 'selected' : ''}}> {{ $comp->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">الاداره التابع لها / القطاع</label>
                                <select id="OrgUnit" name="organization_id" class="form-control @error('organization_id') is-invalid @enderror">
                                    @foreach($organizations as $organization)
                                        <option  value="{{$organization->id}}" {{ $employee->organization_id == $organization->id ? 'selected' : '' }}>{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                @error('organization_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Active" class="control-label">حالة الموظف</label>
                                <select id="Active" name="active" class="form-control @error('active') is-invalid @enderror">
                                    <option value="">--اختر الحالة--</option>
                                    <option value="1" {{ $employee->active == 1 ? 'selected' : ''}}>فعال</option>
                                    <option value="0" {{ $employee->active == 0 ? 'selected' : ''}}>غير فعال</option>
                                </select>
                                @error('active')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        {{-- 3--}}
                        <div class="row">
                            <div class="col">
                                <label for="Cont_type" class="control-label">نوع التعيين</label>
                                <select id="Cont_type" name="employee_type_id" class="form-control @error('employee_type_id') is-invalid @enderror">
                                    <option value="">--اختر نوع الموظف--</option>
                                    @foreach($empTypes as $type)
                                        <option value="{{$type->id}}" {{ $employee->employee_type_id == $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_type_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Relation" class="control-label">الديانة</label>
                                <select id="Relation" name="religion" class="form-control @error('religion') is-invalid @enderror">
                                    <option value="" disabled>--اختر الديانة--</option>
                                    <option value="1" {{ $employee->religion == 1 ? 'selected' : ''}}> مسلم</option>
                                    <option value="2" {{ $employee->religion == 2 ? 'selected' : ''}}>مسيحى</option>
                                    <option value="3" {{ $employee->religion == 3 ? 'selected' : ''}}>اخرى</option>
                                </select>
                                @error('religion')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Genders" class="control-label">النوع</label>
                                <select id="Genders" name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">--اختر النوع--</option>
                                    <option value="1" {{$employee->gender == 1 ? 'selected' : ''}}>ذكر</option>
                                    <option value="2" {{$employee->gender == 2 ? 'selected' : ''}}>أنثى</option>
                                    <option value="3" {{$employee->gender == 3 ? 'selected' : ''}}>أخرى</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Nationality" class="control-label">الجنسية</label>
                                <select id="Nationality" name="country_code" class="form-control @error('country_code') is-invalid @enderror">
                                    <option value="">--اختر الجنسية--</option>
                                    @foreach ($countries as $country)
                                        <option  value="{{ $country->country_code }}" {{ $employee->country_code == $country->country_code ? 'selected' : '' }}> {{ $country->country_arnationality }}</option>
                                    @endforeach
                                </select>
                                @error('country_code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        {{--          we will return to it again              --}}
                        <div class="row">
                            <div class="form-group col" id="dependable1" style="display: none;">
                                <label class="my-1 mr-2" for="dependable">نوع الاعتماد</label>
                                <select name="dependable" id="dependable" class="form-control">
                                    <option value="" selected disabled>--اختر نوع الاعتماد--</option>
                                    <option value="T" >معتمد</option>
                                    <option value="F" >غير معتمد</option>
                                </select>
                            </div>
                            <div class="form-group col" id="dependable_date1" style="display: none;">
                                <label for="dependable_date">تاريخ الاعتماد</label>
                                <input class="form-control fc-datepicker" id="dependable_date" name="dependable_date" placeholder="YYYY-MM-DD" type="text">
                            </div>
                            <div class="form-group col" id="tr_side1" style="display: none;">
                                <label class="my-1 mr-2" for="tr_side">نوع المدرب</label>
                                <select name="tr_side" id="tr_side"  class="form-control"  onchange="showComp(this)" >
                                    <option value="" selected disabled>--اختر نوع المدرب--</option>
                                    <option value="IN" >داخلى</option>
                                    <option value="OT" >خارجى</option>
                                </select>
                            </div>
                            <div class="form-group col" id="comp1">
                                <label class="my-1 mr-2" for="CompTR">الشركة</label>
                                <select name="CompTR" id="CompTR" class="form-control">
                                    <option value="" selected disabled>--اختر الشركة التابع لها المدرب--</option>
                                    @foreach ($companies as $comp)
                                        <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="Position" class="control-label">المسمى الوظيفى</label>
                                <select id="Position" name="position_id" class="form-control  @error('position_id') is-invalid @enderror" >
                                    <option value=" ">--اختر المسمى الوظيفى--</option>
                                    @foreach($positions as $position)
                                        <option value="{{$position->id}}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>{{$position->name}}</option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Job" class="control-label">الوظيفة</label>
                                <select id="Job" name="job_id" class="form-control @error('job_id') is-invalid @enderror" >
                                    <option value=" ">--اختر الوظيفة--</option>
                                    @foreach($jobs as $job)
                                        <option value="{{$job->id}}" {{ $employee->job_id == $job->id ? 'selected' : '' }}>{{$job->name}}</option>
                                    @endforeach
                                </select>
                                @error('job_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Career" class="control-label">المسار الوظيفى</label>
                                <select id="Career" name="career_path_id" class="form-control @error('career_path_id') is-invalid @enderror">
                                    <option value="">--اختر المسار الوظيفى--</option>
                                    @foreach($careers as $career)
                                        <option value="{{$career->id}}" {{ $employee->career_path_id  == $career->id ? 'selected' : '' }}>{{$career->name}}</option>
                                    @endforeach
                                </select>
                                @error('career_path_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Grade" class="control-label">الدرجه المالية</label>
                                <select id="Grade" name="grade_id" class="form-control @error('grade_id') is-invalid @enderror">
                                    <option value="">--اختر الدرجة المالية--</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}" {{ $employee->grade_id == $grade->id ? 'selected' : '' }}> {{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="Insurance_No" class="control-label">الرقم التأمينى</label>
                                <input type="text" class="form-control form-control-lg @error('insurance_number') is-invalid @enderror" id="Insurance_No"
                                       name="insurance_number" value="{{ $employee->insurance_number }}" title="يرجي ادخال الرقم التأمينى"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('insurance_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="ID_No" class="control-label">الرقم القومى</label>
                                <input type="text" class="form-control form-control-lg @error('id_number') is-invalid @enderror" id="ID_No"
                                       name="id_number" value="{{ $employee->id_number }}" title="يرجي ادخال الرقم القومى " maxlength="14"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('id_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="Mobil1" class="control-label">رقم الهاتف المحمول 1</label>
                                <input type="text" class="form-control form-control-lg @error('phone1') is-invalid @enderror" id="Mobil1"
                                       name="phone1" value="{{$employee->phone1}}" title="يرجي ادخال رقم الهاتف المحمول " maxlength="11"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('phone1')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="Mobil2" class="control-label">رقم الهاتف المحمول 2</label>
                                <input type="text" class="form-control form-control-lg @error('phone2') is-invalid @enderror" id="Mobil2"
                                       name="phone2" value="{{$employee->phone2}}" title="يرجي ادخال رقم الهاتف المحمول " maxlength="11"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('phone2')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="Degree" class="control-label">المؤهل</label>
                                <select id="Degree" name="degree_id" class="form-control @error('degree_id') is-invalid @enderror">
                                    <option value="">--اختر المؤهل--</option>
                                    @foreach ($degrees as $degree)
                                        <option value="{{ $degree->id }}" {{$employee->degree_id == $degree->id ? 'selected' : ''}}> {{ $degree->name }}</option>
                                    @endforeach
                                </select>
                                @error('degree_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Faculty" class="control-label">الكلية</label>
                                <select id="Faculty" name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror">
                                    <option value="">--اختر الكلية--</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{$employee->faculty_id == $faculty->id ? 'selected' : ''}}> {{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                                @error('faculty_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Email">البريد الالكترونى</label>
                                <input type="email" name="email" value="{{$employee->email}}" id="Email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Email">العنوان بالتفصيل</label>
                                <input type="text" id="Address" name="address" value="{{$employee->address}}" class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div><br>
                        {{-- 6 --}}
                        <br>
                        <p class="text-danger">* صيغة المرفق  jpeg ,.jpg , png </p>
                        <h5 class="card-title">صوره الموظف</h5>
                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="image" class="dropify @error('image') is-invalid @enderror" accept=".jpg, .png, image/jpeg, image/png"
                                   data-height="70"/>
                            @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function () {
            $('select[name="Comp"]').on('change', function () {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('Comp') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="OrgUnit"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="OrgUnit"]').append(
                                    '<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>

    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

    </script>
    <script>
        $('input[name="Mobil1"],input[name="Mobil2"]').blur(function () {
            if ($(this).val().length !== 11 || $(this).val() === '') {
                $(this).css('border', '1px solid #F00');
                $(this).closest('div').find('span').first().text("يرجى ادخال رقم الهاتف 11 رقم").fadeIn(200);
            } else {
                $(this).css('border', '1px solid #080');
                $(this).closest('div').find('span').first().text("يرجى ادخال رقم الهاتف 11 رقم").fadeOut(200);
            }
        })
        $('input[name="ID_No"]').blur(function () {
            if ($(this).val().length !== 14 || $(this).val() === '') {
                $(this).css('border', '1px solid #F00');
                $(this).closest('div').find('span').first().text("يرجى ادخال الرقم القومى 14 رقم كاملا").fadeIn(200);
            } else {
                $(this).css('border', '1px solid #080');
                $(this).closest('div').find('span').first().text("يرجى ادخال الرقم القومى 14 رقم كاملا").fadeOut(200);
            }
        })
    </script>
    <script type="text/javascript">
        function showTyp(select) {
            if (select.value === 'TR') {
                document.getElementById('dependable1').style.display = "block";
                document.getElementById('dependable_date1').style.display = "block";
                document.getElementById('tr_side1').style.display = "block";
            } else {
                document.getElementById('dependable1').style.display = "none";
                document.getElementById('dependable_date1').style.display = "none";
                document.getElementById('tr_side1').style.display = "none";
            }
        }

        function showComp(select) {
            if (select.value === 'IN') {
                document.getElementById('comp1').style.display = "block";
                document.getElementById('compName1').style.display = "block";
            } else {
                document.getElementById('comp1').style.display = "none";
                document.getElementById('compName1').style.display = "none";
            }
        }
    </script>

@endsection
