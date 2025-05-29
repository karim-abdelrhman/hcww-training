@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
@endsection
@section('title')
    اضافة موظف
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4>
                <a href="{{ route('employee.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    العاملين</span></a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة موظف</span>
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
                    <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select name="company_id"
                                        class="form-control @error('company_id') is-invalid @enderror">
                                    @foreach ($companies as $comp)
                                        <option
                                            value="{{ $comp->id }}" {{ old('company_id') == $comp->id ? 'selected' : ''}}> {{ $comp->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">الاداره التابع لها / القطاع</label>
                                <select id="OrgUnit" name="organization_id"
                                        class="form-control @error('organization_id') is-invalid @enderror">
                                    @foreach($organizations as $organization)
                                        <option
                                            value="{{$organization->id}}" {{ old('organization_id') == $organization->id ? 'selected' : '' }}>{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                @error('organization_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Active" class="control-label">حالة الموظف</label>
                                <select id="Active" name="active"
                                        class="form-control @error('active') is-invalid @enderror">
                                    <option value="1" {{ old('active') == 1 ? 'selected' : ''}}>فعال</option>
                                    <option value="0" {{ old('active') == 0 ? 'selected' : ''}}>غير فعال</option>
                                </select>
                                @error('active')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        {{--2--}}
                        <div class="row">
                            <div class="col-3">
                                <label for="emp_name" class="control-label">اسم الموظف</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="Emp_name" name="name" value="{{old('name')}}"
                                       title="يرجي ادخال أسم الموظف " required>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="Emp_code" class="control-label @error('code') is-invalid @enderror">كود
                                    الموظف</label>
                                <input type="text" class="form-control" id="Emp_code" name="code"
                                       value="{{old('code')}}"
                                       title="يرجي ادخال كود الموظف" required>
                                @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label>تاريخ الميلاد</label>
                                <input id="birth_date" class="form-control @error('birth_date') is-invalid @enderror"
                                       name="birth_date" value="{{old('birth_date')}}" placeholder="YYYY-MM-DD"
                                       type="date" required>
                                @error('birth_date')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label>العمر</label>
                                <input id="age" class="form-control @error('age') is-invalid @enderror" name="age"
                                       value="{{old('age')}}" type="text" readonly>
                                @error('age')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        {{-- 3--}}
                        <div class="row mb-3">
                            <div class="col-4">
                                <label>تاريخ التعيين</label>
                                <input id="employment_date" class="form-control @error('employment_date') is-invalid @enderror"
                                       name="employment_date" value="{{old('employment_date')}}" placeholder="YYYY-MM-DD"
                                       type="date" required>
                                @error('employment_date')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="contract_type" class="control-label">نوع التعيين</label>
                                <input id="input-tags" class=" @error('contract_type') is-invalid @enderror" name="contract_type" value="دائم,مؤقت,مكافأة شاملة" autocomplete="off" placeholder="أخري">
                                @error('contract_type')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="employee_types" class="control-label">نوع الموظف</label>
                                <select id="employee_types" name="employee_types[]"
                                        class="form-control js-example-basic-multiple @error('employee_types') is-invalid @enderror" multiple>
                                    @foreach($empTypes as $type)
                                        <option
                                            value="{{$type->id}}" {{ old('employee_type_id') == $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_types')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="Relation" class="control-label">الديانة</label>
                                <select id="Relation" name="religion"
                                        class="form-control @error('religion') is-invalid @enderror">
                                    <option value="1" {{old('religion') == 1 ? 'selected' : ''}}> مسلم</option>
                                    <option value="2" {{old('religion') == 2 ? 'selected' : ''}}>مسيحى</option>
                                    <option value="3" {{old('religion') == 3 ? 'selected' : ''}}>اخرى</option>
                                </select>
                                @error('religion')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="Genders" class="control-label">النوع</label>
                                <select id="Genders" name="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                    <option value="1" {{old('gender') == 1 ? 'selected' : ''}}>ذكر</option>
                                    <option value="2" {{old('gender') == 2 ? 'selected' : ''}}>أنثى</option>
                                    <option value="3" {{old('gender') == 3 ? 'selected' : ''}}>أخرى</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="Nationality" class="control-label">الجنسية</label>
                                <select id="Nationality" name="country_code"
                                        class="form-control @error('country_code') is-invalid @enderror">
                                    <option value="">--اختر الجنسية--</option>
                                    @foreach ($countries as $country)
                                        <option
                                            value="{{ $country->country_code }}" {{ old('country_code') == $country->country_code ? 'selected' : '' }}> {{ $country->country_arnationality }}</option>
                                    @endforeach
                                </select>
                                @error('country_code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="Position" class="control-label">المسمى الوظيفى</label>
                                <select id="Position" name="position_id"
                                        class="form-control  @error('position_id') is-invalid @enderror">
                                    @foreach($positions as $position)
                                        <option
                                            value="{{$position->id}}" {{ old('position_id') == $position->id ? 'selected' : '' }}>{{$position->name}}</option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Job" class="control-label">الوظيفة</label>
                                <select id="Job" name="job_id"
                                        class="form-control @error('job_id') is-invalid @enderror">
                                    @foreach($jobs as $job)
                                        <option
                                            value="{{$job->id}}" {{ old('job_id') == $job->id ? 'selected' : '' }}>{{$job->name}}</option>
                                    @endforeach
                                </select>
                                @error('job_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Career" class="control-label">المجموعة النوعية</label>
                                <select id="Career" name="career_path_id"
                                        class="form-control @error('career_path_id') is-invalid @enderror">
                                    @foreach($careers as $career)
                                        <option
                                            value="{{$career->id}}" {{ old('career_path_id') == $career->id ? 'selected' : '' }}>{{$career->name}}</option>
                                    @endforeach
                                </select>
                                @error('career_path_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Grade" class="control-label">الدرجه المالية</label>
                                <select id="Grade" name="grade_id"
                                        class="form-control @error('grade_id') is-invalid @enderror">
                                    @foreach ($grades as $grade)
                                        <option
                                            value="{{ $grade->id }}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}> {{ $grade->name }}</option>
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
                                <input type="text"
                                       class="form-control form-control-lg @error('insurance_number') is-invalid @enderror"
                                       id="Insurance_No"
                                       name="insurance_number" value="{{old('insurance_number')}}"
                                       title="يرجي ادخال الرقم التأمينى"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('insurance_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="ID_No" class="control-label">الرقم القومى</label>
                                <input type="text"
                                       class="form-control form-control-lg @error('id_number') is-invalid @enderror"
                                       id="ID_No"
                                       name="id_number" value="{{old('id_number')}}" title="يرجي ادخال الرقم القومى "
                                       maxlength="14"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('id_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="Mobil1" class="control-label">رقم الهاتف المحمول 1</label>
                                <input type="text"
                                       class="form-control form-control-lg @error('phone1') is-invalid @enderror"
                                       id="Mobil1"
                                       name="phone1" value="{{old('phone1')}}" title="يرجي ادخال رقم الهاتف المحمول "
                                       maxlength="11"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('phone1')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="Mobil2" class="control-label">رقم الهاتف المحمول 2</label>
                                <input type="text"
                                       class="form-control form-control-lg @error('phone2') is-invalid @enderror"
                                       id="Mobil2"
                                       name="phone2" value="{{old('phone2')}}" title="يرجي ادخال رقم الهاتف المحمول "
                                       maxlength="11"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                @error('phone2')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="Degree" class="control-label">المؤهل</label>
                                <select id="Degree" name="degree_id"
                                        class="form-control @error('degree_id') is-invalid @enderror">
                                    <option value="">--اختر المؤهل--</option>
                                    @foreach ($degrees as $degree)
                                        <option
                                            value="{{ $degree->id }}" {{old('degree_id') == $degree->id ? 'selected' : ''}}> {{ $degree->name }}</option>
                                    @endforeach
                                </select>
                                @error('degree_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Faculty" class="control-label">الكلية</label>
                                <select id="Faculty" name="faculty_id"
                                        class="form-control @error('faculty_id') is-invalid @enderror">
                                    <option value="">--اختر الكلية--</option>
                                    @foreach ($faculties as $faculty)
                                        <option
                                            value="{{ $faculty->id }}" {{old('faculty_id') == $faculty->id ? 'selected' : ''}}> {{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                                @error('faculty_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Email">البريد الالكترونى</label>
                                <input type="email" name="email" value="{{old('email')}}" id="Email"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Email">العنوان بالتفصيل</label>
                                <input type="text" id="Address" name="address" value="{{old('address')}}"
                                       class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">صورة الموظف</label>
                                <div class="inline-inputs mb-3">
                                    <label class="image-input admin-avatar">
                                        <input hidden type="file" name="image" accept="image/*" class="img-input">
                                        <img src="{{asset('')}}assets/img/image-placeholder.png"
                                             class="img-input-preview h-auto" style="height: 250px; width: 250px;"
                                             alt="">
                                        <div class="overlay-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                <path d="M16 5l3 3"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="cv">السيرة الذاتية</label>
                                <input id="cv" type="file" name="cv" class="dropify @error('cv') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('cv')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="job_description_card">بطاقة الوصف الوظيفي</label>
                                <input type="file" id="job_description_card" name="job_description_card"
                                       class="dropify @error('job_description_card') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('job_description_card')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="job_description">بيان حالة وظيفية معتمد</label>
                                <input type="file" id="employment_status" name="employment_status"
                                       class="dropify @error('employment_status') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('employment_status')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

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

        new TomSelect("#input-tags",{
            persist: false,
            createOnBlur: true,
            create: true
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

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
        /*
        compute the age
         */
        document.getElementById('birth_date').addEventListener('change', function () {
            let birthDate = new Date(this.value);
            let today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDiff = today.getMonth() - birthDate.getMonth();
            let dayDiff = today.getDate() - birthDate.getDate();

            // Adjust age if the birthday hasn't occurred yet this year
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }

            document.getElementById('age').value = age;
        });
    </script>

    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

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
