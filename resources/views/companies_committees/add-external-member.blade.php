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
    اضافة عضو لجنة خارجي
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اللجان الدائمه</h4>
                <a href="{{ route('members.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    أعضاء اللجان</span></a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة عضو لجنة خارجي</span>
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
                    <form action="{{ route('companies-committees.store-external-members', $company_committee->id) }}"
                          method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="company_id" class="control-label">اسم الشركة</label>
                                <select id="company_id" name="company_id" class="form-control">
                                    <option value="">اختر الشركة</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="members" class="control-label">الأعضاء</label>
                                <select id="members" name="members[]" class="js-example-basic-multiple form-control"
                                        multiple="multiple">
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
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
            $('#company_id').off('change').on('change', function () {
                let company_id = $(this).val();
                let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token
                if (company_id) {
                    $.ajax({
                        url: '/getExternalMembers',
                        method: 'POST',
                        headers: {'X-CSRF-TOKEN': csrfToken},
                        data: {
                            company_id: company_id,
                            _token: csrfToken
                        },
                        success: function (response) {
                            if (response.members && response.members.length > 0) {
                                $.each(response.members, function (index, member) {
                                    // let employeeName = member.employee ? member.employee.name : 'Unknown';

                                    $('#members').append(`<option value="${member.id}">${member.name}</option>`);
                                });
                            } else {
                                console.warn("No members found in response.");
                            }
                        },
                        error: function (xhr) {
                            console.error('Error when getting members:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

@endsection
