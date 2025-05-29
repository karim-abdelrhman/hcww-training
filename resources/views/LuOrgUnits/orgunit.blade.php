@extends('layouts.master')
@section('css')
    /*<!-- Internal Data table css -->*/
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    /*<!--select with search -->*/
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    /*<!-- end select with search -->*/
    @section('title')
        الاقطاعات والادارات
    @stop

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="{{route('dashboard')}}">تعريفات</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                القطاعات والادارات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can('bt-add-org')
                        <a class="modal-effect btn btn-outline-primary" data-effect="effect-scale"
                           data-toggle="modal" href="#modaldemo8">اضافة الادارات</a>
                        @endcan
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='25'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الكود</th>
                                <th class="border-bottom-0">القطاع / الادارة</th>
                                <th class="border-bottom-0">تابعه الى قطاع / إدارة عامة</th>
                                <th class="border-bottom-0">تابعه الى شركة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($OrgUnitAll as $x)
                                    <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->code }}</td>
                                    <td>{{ $x->subname }}</td>
                                    <td>{{ $x->mainname }}</td>
                                    <td>{{$x->comp}}</td>
                                    <td>
                                        @can('bt-edit-org')
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-id="{{ $x->subid }}" data-code="{{ $x->code }}"
                                           data-a_name="{{ $x->subname }}" data-e_name="{{ $x->mainname }}"
                                           data-toggle="modal"
                                           href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                                        @endcan
                                        @can('bt-delete-org')
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $x->subid }}" data-a_name="{{ $x->subname }}"
                                           data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                class="las la-trash"></i></a>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

{{--add--}}
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة قطاع / إدارة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                        type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('orgunits.store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">الكود</label>
                                <input type="text" class="form-control" id="code" name="code">
                                @error('compName')
                                    <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم بالعربية</label>
                                <input type="text" class="form-control" id="a_name" name="a_name">
                                @error('compName')
                                    <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="comp1">
                                <label class="my-1 mr-2" for="dependable">الشركة</label>
                                <select name="Comp" id="Comp" class="form-control" required
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    <option value="" selected disabled>--اختر الشركة--</option>
                                    @foreach ($govs as $gov)
                                        <option value="{{ $gov->id }}">{{ $gov->name }}</option>
                                    @endforeach
                                </select>
                                @error('compName')
                                <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="compName1">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select id="compName" name="compName" class="form-control">
                                </select>
                                @error('compName')
                                    <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="compName1">
                                <label for="inputName" class="control-label">القطاع / الاداره التابع لها</label>
                                <select id="OrgU" name="OrgU" class="form-control">
                                </select>
                                @error('compName')
                                    <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Basic modal -->


        </div>
        <!-- edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل الوظيفة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="orgunits/update" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="code" class="col-form-label">الكود :</label>
                                <input class="form-control" name="code" id="code" type="text">
                                @error('code')
                                <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم بالعربية</label>
                                <input type="text" class="form-control" id="a_name" name="a_name">
                                @error('compName')
                                <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="comp1">
                                <label class="my-1 mr-2" for="dependable">الشركة</label>
                                <select name="Comp" id="Comp" class="form-control" required
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    <option value="" selected disabled>--اختر الشركة--</option>
                                    @foreach ($govs as $gov)
                                        <option value="{{ $gov->id }}">{{ $gov->name }}</option>
                                    @endforeach
                                </select>
                                @error('compName')
                                <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="compName1">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select id="compName" name="compName" class="form-control">
                                </select>
                                @error('compName')
                                <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="compName1">
                                <label for="inputName" class="control-label">القطاع / الاداره التابع لها</label>
                                <select id="OrgU" name="OrgU" class="form-control">
                                </select>
                                @error('compName')
                                <div class="alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الوظيفة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                        type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="orgunits/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="a_name" id="a_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>




        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/jquery/jQueryv3-4-1.js') }}"></script>
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/selectize.min.js') }}"></script>--}}
    <!---select with serch-->
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('select[name="Comp"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('getCompOrg') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="compName"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="compName"]').append('<option value="' +
                                    value + '">' + value + '</option>');
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
        $(document).ready(function() {
            $('select[name="Comp"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('getOrgByGov') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="OrgU"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="OrgU"]').append('<option value="' + key + '">' + value + '</option>');
                                //append($("<option></option>").attr("value", value).text(key));
                                //
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
