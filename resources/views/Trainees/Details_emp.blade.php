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
    عرض تفاصيل المتدرب
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعريفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    عرض تفاصيل المتدرب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="#" method="post" autocomplete="off">
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">اسم المتدرب</label>
                                <input type="hidden" name="emp_id" value="{{ $emps->emp_id }}">
                                <input type="text" class="form-control" value="{{ $emps->emp_name }}" disabled>
                            </div>

                            <div class="col">
                                <label for="inputJob" class="control-label">الوظيفة</label>
                                <input type="text" class="form-control" value="{{ $emps->job_name }}" disabled>
                            </div>
                            <div class="col">
                                <label for="inputGrade" class="control-label">الدرجة</label>
                                <input type="text" class="form-control" value="{{ $emps->grade_name }}" disabled>
                            </div>

                            <div class="col">
                                <label>تاريخ الدرجه</label>
                                <input class="form-control fc-datepicker" name="grade_Date" placeholder="YYYY-MM-DD"
                                       type="text" value="{{ $emps->grade_date}}" disabled>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">المؤهل</label>
                                <input type="text" class="form-control" value="{{ $emps->degree_name }}" disabled>

                            </div>
                            <div class="col">
                                <label for="Faculty" class="control-label">الكلية</label>
                                <input type="text" class="form-control" value="{{ $emps->faculty_name }}" disabled>

                            </div>
                            <div class="col">
                                <label class="control-label">تاريخ المؤهل</label>
                                <input class="form-control  type="text" value="{{$emps ->degree_date}}" disabled>
                            </div>
                            <div class="col">
                                <label  class="control-label" >تاريخ الميلاد</label>
                                <input class="form-control" type="text" value="{{$emps ->birth_date}}" disabled>
                            </div>
                            <div class="col">
                                <label class="control-label">تاريخ التعيين</label>
                                <input class="form-control" type="text" value="{{$emps ->hire_date}}" disabled>
                            </div>
                        </div>

                        {{-- 3 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputTel" class="control-label">رقم التليفون</label>
                                <input type="text" class="form-control" value="{{$emps->tel}}" disabled>
                            </div>
                            <div class="col">
                                <label for="inputMob" class="control-label">رقم الموبيل</label>
                                <input type="text" class="form-control " value="{{ $emps->mob }}" disabled>
                            </div>
                            <div class="col">
                                <label for="inputEmail" class="control-label">البريد الالكترونى</label>
                                <input type="email" class="form-control " value="{{ $emps->email }}" disabled>
                            </div>
                            <div class="col">
                                <label for="inputEmail" class="control-label">الرقم القومى</label>
                                <input type="text" class="form-control " value="{{ $emps->id_no }}" disabled>
                            </div>
                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputReligions" class="control-label">الديانة</label>
                                <select name="Religions" class="form-control SlectBox">
                                    <option value=60> مسلم</option>
                                    <option value=61> مسيحى</option>
                                    <option value=62> أخرى</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="parent_id">الشركة</label>
                                <input type="text" class="form-control " value="{{ $emps->gov_name }}" disabled>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">القطاع / الاداره التابع لها</label>
                                <input type="text" class="form-control " value="{{ $emps->org_name }}" disabled>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3">
                                    {{$emps->comm}}
                                </textarea>
                            </div>
                        </div><br>




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
    {{--select with serch--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

    </script>
    {{--end select with search--}}
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
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
