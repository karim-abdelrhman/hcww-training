@extends('layouts.master')
@section('css')
    /*<!--- Internal Select2 css-->*/
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    {{--    <!---Internal Fileupload css-->--}}
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    {{--    <!---Internal Fancy uploader css-->--}}
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    {{--    <!--Internal Sumoselect css-->--}}
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    {{--    <!--Internal  TelephoneInput css-->--}}
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    {{--select with search--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    /*end select with search*/
@endsection
@section('title')
    إضافة متدربين
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعريفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إضافة المتدرب</span>
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

                    <form action="{{ route('trainees.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputCode" class="control-label">كود المتدرب</label>
                                <input type="text" class="form-control" id="Code" name="Code" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">اسم المتدرب</label>
                                <input type="text" class="form-control" id="inputName" name="Name" required>
                            </div>

                            <div class="col">
                                <label for="inputJob" class="control-label">الوظيفة</label>
                                <select name="Job" class="form-control">
                                    <option value="" selected disabled>-- اختر الوظيفة--</option>
                                    @foreach ($all_jobs as $job)
                                        <option value="{{ $job->id }}"> {{ $job->a_dsc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputGrade" class="control-label">الدرجة</label>
                                <select name="Grade" class="form-control SlectBox">
                                    <option disabled selected value="">-- اختر الدرجة--</option>
                                    @foreach ($all_grades as $grade)
                                        <option value="{{ $grade->id }}"> {{ $grade->a_dsc}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label>تاريخ الدرجه</label>
                                <input class="form-control fc-datepicker" name="Grade_Date" placeholder="YYYY-MM-DD"
                                       type="text"  required>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">المؤهل</label>
                                <select name="Degrees" class="form-control SlectBox">
                                <option selected disabled value="">-- اختر المؤهل--</option>
                                @foreach ($all_degrs as $degree)
                                    <option value="{{ $degree->id }}"> {{ $degree->a_dsc}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="Faculty" class="control-label">الكلية</label>
                                <select name="Faculty" class="form-control SlectBox"
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    @foreach ($all_faucltys as $all_fauclty)
                                        <option value="{{ $all_fauclty->id }}"> {{ $all_fauclty->a_dsc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>تاريخ المؤهل</label>
                                <input class="form-control fc-datepicker" name="Degree_date" placeholder="YYYY-MM-DD"
                                       type="text"  required>
                            </div>
                            <div class="col">
                                <label>تاريخ الميلاد</label>
                                <input class="form-control fc-datepicker" name="Birth_date" placeholder="YYYY-MM-DD"
                                       type="text" required>
                            </div>
                            <div class="col">
                                <label>تاريخ التعيين</label>
                                <input class="form-control fc-datepicker" name="Hire_date" placeholder="YYYY-MM-DD"
                                       type="text" required>
                            </div>
                        </div>

                        {{-- 3 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputTel" class="control-label">رقم التليفون</label>
                                <input type="text" class="form-control" id="inputTel" name="Tel"
                                       title="الرجاء ادخال رقم الهاتف"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="col">
                                <label for="inputMob" class="control-label">رقم الموبيل</label>
                                <input type="text" class="form-control form-control-lg" id="inputMob"
                                       name="Mob" title="يرجي ادخال رقم المحمول "
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                            <div class="col">
                                <label for="inputId_No" class="control-label">الرقم القومى</label>
                                <input type="text" class="form-control form-control-lg" id="inputMob"
                                       name="Id_No" title="يرجي ادخال الرقم القومى "
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                            <div class="col">
                                <label for="inputEmail" class="control-label">البريد الالكترونى</label>
                                <input type="email" class="form-control form-control-lg" id="Email" name="Email"
                                        required>
                            </div>
                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputReligions" class="control-label">الديانة</label>
                                <select name="Religions" class="form-control SlectBox">
                                    <option value="" selected disabled> --اختر الديانة--</option>
                                    <option value=60> مسلم</option>
                                    <option value=61> مسيحى</option>
                                    <option value=62> أخرى</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="parent_id">الشركة</label>
                                <select name="gov_id" id="gov_id" class="form-control SlectBox"
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    <option value="" selected disabled> --اختر الشركة--</option>
                                    @foreach ($all_govs as $gov)
                                        <option value="{{ $gov->gov_id }}">{{ $gov->gov_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">القطاع / الاداره التابع لها</label>
                                <select id="OrgU" name="OrgU" class="form-control">
                                </select>
                            </div>


                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3">
                                </textarea>
                            </div>
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
    {{--    <!-- Internal Select2 js-->--}}
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    {{--    <!--Internal Fileuploads js-->--}}
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    {{--    <!--Internal Fancy uploader js-->--}}
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    {{--    <!--Internal  Form-elements js-->--}}
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    {{--    <!--Internal Sumoselect js-->--}}
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    {{--    <!--Internal  Datepicker js -->--}}
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    {{--    <!--Internal  jquery.maskedinput js -->--}}
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    {{--    <!--Internal  spectrum-colorpicker js -->--}}
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    {{--    <!-- Internal form-elements js -->--}}
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    {{--select with serch--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>--}}
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

    </script>
    {{--end select with search--}}

    <script>
        // org from comp
        $(document).ready(function() {
            $('select[name="gov_id"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('getOrgComp') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="OrgU"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="OrgU"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

    </script>



@endsection
