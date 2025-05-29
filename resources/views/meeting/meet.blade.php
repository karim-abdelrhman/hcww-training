@extends('layouts.master')
@section('title')
    اجتماعات اللجنة
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
                    محضر اللجنة</span>
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
                    @can('bt-add-met')
{{--                        <a class="btn btn-outline-primary" href="{{route('train_program.create')}}">اضافة لجنة جديده</a>--}}
                        <a class="modal-effect btn btn-outline-primary" data-effect="effect-scale"
                           data-toggle="modal" href="#modaldemo8" ><i
                                class="fas fa-plus"></i>&nbsp; اضافة لجنة جديده</a>
                    @endcan

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
                            @foreach ($masters as $y)
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
                                        @can('bt-edit-met')
{{--                                            <a class="btn btn-primary btn-sm"--}}
{{--                                               href="{{ route('meeting.edit', $y->ms_id) }}">تعديل</a>--}}

                                        @endcan
                                            <a class="btn btn-success btn-sm"
                                               href="{{ route('meeting.show', $y->ms_id) }}">عرض</a>
                                        @can('bt-delete-met')
                                            <a class="btn btn-danger btn-sm "
                                                    data-pro_id="{{ $y->ms_id }}"
                                                    data-program_name="{{ $y-> ms_com_date }}"
                                                    data-toggle="modal"
                                                    data-target="#modaldemo9">حذف</a>
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
        <!--/div-->
    </div>

    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document" style="max-width: 100%;">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة لجنة</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('meeting.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="wizard1">
                            <h3>بيانات اللجنة الاساسية</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label">رقم اللجنه</label>
                                    <input type="text" name="code" class="form-control required" placeholder="رقم اللجنة">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">بيانات اللجنة</label>
                                    <input type="text" name="name" class="form-control required" placeholder="بيانات اللجنة">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">تاريخ اللجنة</label>
                                    <input type="date" name="com_date" class="form-control datepicker_calendar required" placeholder="تاريخ اللجنه">
                                </div>
                                <div class="control-group form-group">
                                    <label for="Comp" class="form-label">الشركة</label>
                                    <select name="Comps" id="Comps" class="form-control">
                                        <option value="">-- اختر الشركة--</option>
                                        @foreach($comps as $comp)
                                            <option value="{{$comp->id}}">{{$comp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group mb-0">
                                    <label class="form-label">الملاحظات</label>
                                    <input type="text" name="note" class="form-control required" placeholder="ملاحظات">
                                </div>
                            </section>
                            <h3>أعضاء اللجنة</h3>
                            <section>
                                <div class="table-responsive col-md-10">
                                    <table class="table mg-b-0 text-md-nowrap table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th width="1%">#</th>
                                            <th>اسم العضو</th>
                                            <th width="5%"><button class="btn btn-sm btn-info" type="button" onclick="addRow()">اضافه</button></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbl_det">
                                        <tr>
                                            <th scope="row" >1</th>
                                            <td>
                                                <select class="form-control" style="text-align: left" name="members[]"
                                                        required placeholder="اختر اسم العضو"
                                                        oninvalid="this.setCustomValidity('الرجاء ادخال اسم العضو')"
                                                        oninput="setCustomValidity('')">
                                                    <option value="" selected disabled> -- اختر اسم العضو --</option>
                                                    @foreach ($member as $x)
                                                        <option value="{{ $x->emp_id }}">{{ $x->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                        @if($errors->has('detail'))
                                            <span class="sch_err"
                                                  style="color:red;font-size:12px">{{ $errors->first('detail') }}</span>
                                        @endif

                                        </tbody>
                                    </table>

                                </div>
                            </section>
                            <h3>رفع ملفات اللجنه</h3>
                            <section>
                                <div class="row">
                                    <div class="col">
                                        <label for="Code">كود المرفق</label>
                                        <input name="Code" id="Code" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mg-b-20"> مرفق اللجنه</label>
                                        <input id="file_name" class="custom-file-input text-center dropify" name="file_name" type="file"
                                               style="opacity:1"
                                               oninvalid="this.setCustomValidity('الرجاء تحميل صور الخبر')"
                                               oninput="setCustomValidity('')"
                                               accept="*pdf" onChange="validateAllImg(this)"/>
                                        <span class="" style="color:red;font-size:12px;display: block"></span>
                                        @if($errors->has('file_name'))
                                            <span class="sch_err"
                                                  style="color:red;font-size:12px">{{ $errors->first('file_name') }}</span>
                                        @endif
                                        <div class="input-group col-md-6 " id="show_imgs"></div>
                                        <small id=""></small>

                                    </div>
                                </div>
                            </section>
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
    <!-- حذف الفاتورة -->
    <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف اللجنة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('train_program.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
                </form>
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
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!-- Internal Modal js-->
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

    </script>

    <script>
        function addRow(){
            var id="";
            id=$("#tbl_det tr:last th:first").text();
            id++;
            var newRow=`<tr>
                <th scope="row">`+id+`</th>
                <td>
                    <select class="form-control" style="text-align: left" name="members[]" cols="30" rows="3"
                                                      required placeholder="اختر اسم العضو "
                                                      oninvalid="this.setCustomValidity('الرجاء ادخال اسم العضو')"
                                                      oninput="setCustomValidity('')">
                        <option value="" selected disabled> -- اختر  اسم العضو--</option>
                         @foreach ($member as $x)
                            <option value="{{ $x->emp_id }}">{{ $x->name}}</option>
                         @endforeach
                    </select>
                </td>
                <td><button class="del_row btn btn-sm btn-danger" type="button" onclick="del_row(this)" >حذف</button></td>
            </tr>'`;
            $("#tbl_det:last-child").append(newRow);
        }
        function del_row(elm){
            $(elm).closest("tr").remove();
        }
        function validateAllImg(input){
            var URL = window.URL || window.webkitURL;
            var imgs = input.files;

            for(var i=0;i<imgs.length;i++) {
                $("#show_imgs").children().remove();
                var img = input.files[i];
                if (!img.type.match("image.pdf")) {
                    return;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    var newImg = `<img alt="Responsive image" width="80" height="60" class="img-fluid"
                                 src=` + e.target.result + `>
                            <p>|</p>`;
                    $("#show_imgs").append(newImg);
                }
                reader.readAsDataURL(img);
            }
        }
    </script>




@endsection
