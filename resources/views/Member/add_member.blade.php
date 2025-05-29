@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <style>
        #dependable1, #dependable_date1, #tr_side1, #comp1,#compName1{
            display: none;
        }
    </style>
@endsection
@section('title')
    اضافة عضو لجنه
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اللجان الدائمه</h4>
                <a href="{{ route('members.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    أعضاء اللجان</span></a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة عضو لجنة</span>
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
                    <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="Emp_code" class="control-label">كود العضو</label>
                                <input type="text" class="form-control" id="Emp_code" name="Emp_code"
                                       title="يرجي ادخال كود الموظف" required>
                            </div>
                            <div class="col">
                                <label for="emp_name" class="control-label">اسم العضو</label>
                                <input type="text" class="form-control" id="Emp_name" name="Emp_name"
                                title="يرجي ادخال أسم الموظف " required>
                            </div>
                            <div class="col">
                                <label>تاريخ الميلاد</label>
                                <input class="form-control fc-datepicker" name="Birth_date" placeholder="YYYY-MM-DD"
                                       type="text" required>
                            </div>
                        </div><br>
                        {{--2--}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select name="Comp" class="form-control SlectBox"
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>--اختر الشركة--</option>
                                    @foreach ($comps as $comp)
                                        <option value="{{ $comp->id }}"> {{ $comp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">الاداره التابع لها / القطاع</label>
                                <select id="OrgUnit" name="OrgUnit" class="form-control">
                                </select>
                            </div>
                            <div class="col">
                                <label for="Active" class="control-label">حالة الموظف</label>
                                <select id="Active" name="Active" class="form-control">
                                    <option value="T">فعال</option>
                                    <option value="F">غير فعال</option>
                                </select>
                            </div>
                        </div><br>
                        {{-- 3--}}
                        <div class="row">
                            <div class="col">
                                <label for="Cont_type" class="control-label">نوع التعيين</label>
                                <select id="Cont_type" name="Cont_type" class="form-control "
                                        onchange="showTyp(this)" >
                                    <option value="CM"> عضو لجنه</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="Relation" class="control-label">الديانة</label>
                                <select id="Relation" name="Relation" class="form-control" >
                                    <option value=" ">--اختر الديانة--</option>
                                    <option value="60"> مسلم</option>
                                    <option value="61">مسيحى</option>
                                    <option value="62">اخرى</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="Genders" class="control-label">النوع</label>
                                <select id="Genders" name="Genders" class="form-control">
                                    <option value="">--اختر النوع--</option>
                                    <option value="60">ذكر</option>
                                    <option value="61">أنثى</option>
                                    <option value="62">أخرى</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="Nationality" class="control-label">الجنسية</label>
                                <select id="Nationality" name="Nationality" class="form-control">
                                    <option value="">--اختر الجنسية--</option>
                                    @foreach ($nationalitys as $nationality)
                                        <option value="{{ $nationality->country_code }}"> {{ $nationality->country_arnationality }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="Insurance_No" class="control-label">الرقم التأمينى</label>
                                <input type="text" class="form-control form-control-lg" id="Insurance_No"
                                       name="Insurance_No" title="يرجي ادخال الرقم التأمينى "
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="ID_No" class="control-label">الرقم القومى</label>
                                <input type="text" class="form-control form-control-lg" id="ID_No"
                                       name="ID_No" title="يرجي ادخال الرقم القومى " maxlength="14"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="Mobil1" class="control-label">رقم الهاتف المحمول 1</label>
                                <input type="text" class="form-control form-control-lg" id="Mobil1"
                                       name="Mobil1" title="يرجي ادخال رقم الهاتف المحمول " maxlength="11"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="Mobil2" class="control-label">رقم الهاتف المحمول 2</label>
                                <input type="text" class="form-control form-control-lg" id="Mobil2"
                                       name="Mobil2" title="يرجي ادخال رقم الهاتف المحمول " maxlength="11"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                                <span class="text-danger"></span>
                            </div>
                        </div><br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="Position" class="control-label">المسمى الوظيفى</label>
                                <select id="Position" name="Position" class="form-control " >
                                    <option value=" ">--اختر المسمى الوظيفى--</option>
                                    @foreach($positions as $position)
                                        ,<option value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col">
                                <label for="Job" class="control-label">الوظيفة</label>
                                <select id="Job" name="Job" class="form-control" >
                                    <option value=" ">--اختر الوظيفة--</option>
                                    @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="Grade" class="control-label">الدرجه المالية</label>
                                <select id="Grade" name="Grade" class="form-control">
                                    <option value="">--اختر الدرجة المالية--</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}"> {{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>
                        <div class="row">

                            <div class="col">
                                <label for="Degree" class="control-label">المؤهل</label>
                                <select id="Degree" name="Degree" class="form-control">
                                    <option value="">--اختر المؤهل--</option>
                                    @foreach ($degrees as $degree)
                                        <option value="{{ $degree->id }}"> {{ $degree->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="Faculty" class="control-label">الكلية</label>
                                <select id="Faculty" name="Faculty" class="form-control">
                                    <option value="">--اختر الكلية--</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}"> {{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="Email">البريد الالكترونى</label>
                                <input type="email" name="Email" id="Email" class="form-control">
                            </div>
                        </div><br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="Address">العنوان بالتفصيل</label>
                                <textarea class="form-control" id="Address" name="Address" rows="3"></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">* صيغة المرفق  jpeg ,.jpg , png </p>
                        <h5 class="card-title">صوره الموظف</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                                   data-height="70" />
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
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
        $(document).ready(function() {
            $('select[name="Comp"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('Comp') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="OrgUnit"]').empty();
                            $.each(data, function(key, value) {
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
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }

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
            }else{
                $(this).css('border', '1px solid #080');
                $(this).closest('div').find('span').first().text("يرجى ادخال رقم الهاتف 11 رقم").fadeOut(200);
            }
        })
        $('input[name="ID_No"]').blur(function () {
            if ($(this).val().length !== 14|| $(this).val() === '') {
                $(this).css('border', '1px solid #F00');
                $(this).closest('div').find('span').first().text( "يرجى ادخال الرقم القومى 14 رقم كاملا").fadeIn(200);
            }else{
                $(this).css('border', '1px solid #080');
                $(this).closest('div').find('span').first().text( "يرجى ادخال الرقم القومى 14 رقم كاملا").fadeOut(200);
            }
        })
    </script>
    <script type="text/javascript">
        function showTyp(select){
            if(select.value === 'TR'){
                document.getElementById('dependable1').style.display = "block";
                document.getElementById('dependable_date1').style.display = "block";
                document.getElementById('tr_side1').style.display = "block";
            } else{
                document.getElementById('dependable1').style.display = "none";
                document.getElementById('dependable_date1').style.display = "none";
                document.getElementById('tr_side1').style.display = "none";
            }
        }
        function showComp(select){
            if(select.value === 'IN'){
                document.getElementById('comp1').style.display = "block";
                document.getElementById('compName1').style.display = "block";
            } else{
                document.getElementById('comp1').style.display = "none";
                document.getElementById('compName1').style.display = "none";
            }
        }
    </script>


@endsection
