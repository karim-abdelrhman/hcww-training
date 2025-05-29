@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}

    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <style>
        #dependable1, #dependable_date1, #tr_side1, #comp1, #compName1 {
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
                    <form action="{{ route('companies-committees.store-members', $company_committee->id) }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select name="company_id" class="form-control">
                                    <!--placeholder-->
                                    <option value="{{$company_committee->id}}"
                                            selected>{{$company_committee->name}}</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="members" class="control-label">الأعضاء</label>
                                <select id="members" name="members[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}"
                                                @if($committeeMembers->contains('employee_id', $member->id)) selected @endif>
                                            {{ $member->name }}
                                        </option>
                                    @endforeach
                                </select>
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
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

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
