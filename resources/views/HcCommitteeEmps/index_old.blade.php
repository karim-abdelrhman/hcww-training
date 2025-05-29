@extends('layouts.master')
@section('title')
    أسماء المتدربين طبقا للجنة
@stop
@section('css')
    /*<!-- Internal Data table css -->*/
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    /*<!---Internal Owl Carousel css-->*/
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    /*<!---Internal  Multislider css-->*/
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اللجان والبرامج المنفذه</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اللجنة
                     أسماء المتدربين وفقا للجنة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
{{--                    @can('bt-add-met')--}}
{{--                        <a class="modal-effect btn btn-outline-primary" data-effect="effect-scale"--}}
{{--                           data-toggle="modal" href="#modaldemo8" >--}}
{{--                            <i class="fas fa-plus"></i>&nbsp; اضافة متدربين جدد</a>--}}
{{--                    @endcan--}}

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الشركة</th>
                                <th class="border-bottom-0">كود اللجنة</th>
                                <th class="border-bottom-0">اسم تعريفى </th>
                                <th class="border-bottom-0">تاريخ اللجنة</th>
                                <th class="border-bottom-0">ملاحظات</th>
                                <th class="border-bottom-0">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                            @foreach ($Masters as $y)
                                    <?php $i++; ?>
                                <tr>
                                    <td>
                                        {{ $i }}
                                    </td>
                                    <td>
                                        {{ $y->comp_name}}
                                    </td>
                                    <td>
                                        {{ $y->ms_code }}
                                    </td>
                                    <td>
                                        {{ $y->ms_name }}
                                    </td>
                                    <td>
                                        {{ $y-> ms_com_date }}
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           data-target="#modaldemo6"
                                           data-toggle="modal"
                                           data-pro_id="{{$y->ms_id}}"
                                           data-comp_n="{{$y->comp_name}}"
                                           data-comp_i="{{$y->comp_id}}"
                                           data-mcode="{{$y->ms_code}}"
                                           data-mname="{{$y->ms_name}}"
                                           data-mdate="{{$y->ms_com_date}}"
                                           href="">إضافه</a>
                                        <a class="btn btn-sm btn-success " href="{{ route('meeting.show', $y->ms_id) }}">عرض</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    <!-- Grid modal -->
    <div class="modal" id="modaldemo6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">إضافه أسماء المتدربين</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Trainer.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="Pro_Id" name="Pro_Id" class="form-control" value="" type="hidden">
                                <label for="Comp_I" class="label-control">كود الشركة</label>
                                <input id="Comp_I" name="Comp_I" class="form-control" type="text" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="Comp_N" class="label-control">اسم الشركة</label>
                                <input id="Comp_N" name="Comp_N" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="Codeq" class="label-control">كود اللجنة</label>
                                <input id="Codeq" name="Codeq" class="form-control" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="Nameq" class="label-control">اسم اللجنة</label>
                                <input id="Nameq" name="Nameq" class="form-control" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="Com_Date" class="label-control">تاريخ اللجنة</label>
                                <input id="Com_Date" name="Com_Date" class="form-control" value="" >
                            </div>
                        </div>
                        <br>
                        <div class="row">

{{--                            <div class="table-responsive col-md-12">--}}
{{--                                <table class="table mg-b-0 text-md-nowrap table-bordered text-center">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th width="1%">#</th>--}}
{{--                                        <th>اسم المتدرب</th>--}}
{{--                                        <th>كود المتدرب</th>--}}
{{--                                        <th width="5%"><button class="btn btn-sm btn-info" type="button" onclick="addRow()">اضافه</button></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody id="tbl_det">--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row" >1</th>--}}
{{--                                        <td>--}}
{{--                                            <select class="form-control nameEmp SlectBox" style="text-align: center"  name="NameEmp[]"--}}
{{--                                                    required placeholder="اختر اسم المتدرب"--}}
{{--                                                    onclick="console.log($(this).val())">--}}
{{--                                                <option value="" selected disabled> -- اختر اسم المتدرب --</option>--}}
{{--                                                @foreach ($Employees as $x)--}}
{{--                                                    <option value="{{ $x->emp_id }}">{{ $x->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <select class="form-control codeEmp" style="text-align: center"  name="CodeEmp[]">--}}

{{--                                            </select>--}}
{{--                                        </td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                    @if($errors->has('detail'))--}}
{{--                                        <span class="sch_err"--}}
{{--                                              style="color:red;font-size:12px">{{ $errors->first('detail') }}</span>--}}
{{--                                    @endif--}}

{{--                                    </tbody>--}}
{{--                                </table>--}}

{{--                            </div>--}}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">تأكيد</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Grid modal -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
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
    <!-- Internal Prism js -->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js -->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!-- Internal Modal js -->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>

    <script>
        $('#delete_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })

        $('#modaldemo6').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Pro_id = button.data('pro_id')
            var CompID = button.data('comp_i')
            var CompNAME = button.data('comp_n')
            var CODE = button.data('mcode')
            var NAME = button.data('mname')
            var DATE = button.data('mdate')
            var modal = $(this)
            modal.find('.modal-body #Pro_Id').val(Pro_id);
            modal.find('.modal-body #Comp_I').val(CompID);
            modal.find('.modal-body #Comp_N').val(CompNAME);
            modal.find('.modal-body #Codeq').val(CODE);
            modal.find('.modal-body #Nameq').val(NAME);
            modal.find('.modal-body #Com_Date').val(DATE);
        })

    </script>


{{--    <script>--}}
{{--        function addRow(){--}}
{{--            var id="";--}}
{{--            id=$("#tbl_det tr:last th:first").text();--}}
{{--            id++;--}}
{{--            var newRow=`<tr>--}}
{{--                            <th scope="row">`+id+`</th>--}}
{{--                            <td>--}}
{{--                                <select class="form-control nameEmp SlectBox" style="text-align: center"  name="NameEmp[]"--}}
{{--                                                      required placeholder="اختر اسم المتدرب "--}}
{{--                                                      onclick="console.log($(this).val())">--}}
{{--                                    <option value="" selected disabled> -- اختر  اسم المتدرب--</option>--}}
{{--                                @foreach ($Employees as $x)--}}
{{--                                    <option value="{{ $x->emp_id }}">{{ $x->name}}</option>--}}
{{--                                 @endforeach--}}
{{--                                </select>--}}
{{--                            </td>--}}
{{--                            <td>--}}

{{--                            </td>--}}
{{--                            <td><button class="del_row btn btn-sm btn-danger" type="button" onclick="del_row(this)" >حذف</button></td>--}}
{{--                        </tr>'`;--}}
{{--                $("#tbl_det:last-child").append(newRow);--}}
{{--        }--}}
{{--        function del_row(elm){--}}
{{--            $(elm).closest("tr").remove();--}}
{{--        }--}}
{{--        $(document).ready(function() {--}}
{{--            $('.nameEmp').on('change', function() {--}}
{{--                var prnet=$(this).closest('td');--}}
{{--                var SectionId = $(this).val();--}}
{{--                if (SectionId) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ URL::to('getEmpCode') }}/" + SectionId,--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        success: function(data) {--}}
{{--                           // $(this).closest('tr').find(".codeEmp").empty();--}}
{{--                            $.each(data, function(key, value) {--}}
{{--                                console.log(prnet);--}}
{{--                                prnet.next('td').text( value );--}}
{{--                            });--}}
{{--                        },--}}
{{--                    });--}}

{{--                } else {--}}
{{--                    console.log('AJAX load did not work');--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}




@endsection
