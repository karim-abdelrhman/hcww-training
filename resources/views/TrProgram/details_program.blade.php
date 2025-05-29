@extends('layouts.master')
@section('css')
    <!--Internal  Prism css -->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!--Internal Input tags css -->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!-- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل البرنامج التدريبي
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="{{route('dashboard')}}"> تعريفات</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/<a href="{{route('train_program.index')}}">البرنامج التدريبي</a>
                     </span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل البرنامج التدريبي</span>
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
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    البرنامج التدريبي</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">تفاصيل البرنامج</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">
                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row" style="color: blue;">كود البرنامج</th>
                                                        <td style="font-weight: bold;">{{ $programs->code }}</td>
                                                        <th scope="row" style="color: blue;">اسم البرنامج</th>
                                                        <td style="font-weight: bold;">{{ $programs->name }}</td>
                                                        <th scope="row" style="color: blue;">اسم البرنامج</th>
                                                        <td style="font-weight: bold;">{{ $programs->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" style="color: blue;">ملاحظات</th>
                                                        <td style="font-weight: bold;">{{ $programs->comm }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" style="color: blue;">العمليات</th>
                                                        <td style="font-weight: bold;">
                                                            @can('bt-edit-prog')
                                                                 <button class="modal-effect btn btn-success btn-sm"
                                                                         data-effect="effect-newspaper"
                                                                         data-toggle="modal"
                                                                         data-code="{{ $programs->code }}"
                                                                         data-name="{{ $programs->name }}"
                                                                         data-type="{{ $programs->type }}"
                                                                         data-id="{{ $programs->id }}"
                                                                         data-comm="{{ $programs->comm }}"
                                                                         data-target="#modaldemo8">تعديل</button>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                       style="text-align:center">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>كود البرنامج الفرعى</th>
                                                        <th>اسم البرنامج الفرعى</th>
                                                        <th>ملاحظات</th>
                                                        <th>تاريخ الاضافة </th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($programsDet as $x)
                                                            <?php $i++; ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $x->code }}</td>
                                                            <td>{{ $x->name }}</td>
                                                            <td>{{ $x->comm }}</td>
                                                            <td>{{ $x->created_at }}</td>
                                                            <td>
                                                                @can('bt-edit-prog')
                                                                    <button class="modal-effect btn btn-success btn-sm"
                                                                            data-effect="effect-newspaper"
                                                                            data-toggle="modal"
                                                                            data-code="{{ $x->code }}"
                                                                            data-name="{{ $x->name }}"
                                                                            data-prog_id="{{ $x->prog_id }}"
                                                                            data-id="{{ $x->id }}"
                                                                            data-comm="{{ $x->comm }}"
                                                                            data-target="#modaldemo6">تعديل</button>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">
                                                @can('add-att-prog')
                                                    <div class="card-body">
                                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">اضافة مرفقات</h5>
                                                        <form method="post" action="{{ route('mater.store') }}"
                                                              enctype="multipart/form-data" autocomplete="off">
                                                            {{ csrf_field() }}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="control-label" for="customFile">حدد المرفق</label>
                                                                    <input type="file" class="custom-file-input" id="customFile"
                                                                           name="file_name" required>
                                                                    <input type="hidden" id="prog_id" name="prog_id"
                                                                           value="{{ $programs->id }}">
                                                                    <label class="custom-file-label" for="customFile">حدد
                                                                        المرفق</label>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Det_id" class="control-label">الوحده التابع لها الماده العلمية</label>
                                                                    <select name="Det_id" id="Det_id" class="form-control" required>
                                                                        <option value="">-- اختر الوحده التابع لها الماده العلمية--</option>
                                                                    @foreach($programsDet as $t)
                                                                            <option value="{{$t->id}}">{{$t->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                    name="uploadedFile">تاكيد</button>
                                                        </form>
                                                    </div>
                                                @endcan
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                           style="text-align:center">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            <th scope="col">م</th>
                                                            <th scope="col">اسم الملف</th>
                                                            <th scope="col">اسم البرنامج الفرعى</th>
                                                            <th scope="col">اسم البرنامج</th>
                                                            <th scope="col">قام بالاضافة</th>
                                                            <th scope="col">العمليات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                        @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $attachment->mat_name }}</td>
                                                                <td>{{ $attachment->pdet_name }}</td>
                                                                <td>{{ $attachment->prog_name }}</td>
                                                                <td>{{ $attachment->created_by }}</td>
                                                                <td colspan="2">

                                                                    <a class="btn btn-outline-success btn-sm" target="_blank"
                                                                       href="{{ URL::asset('Attachments/Program/'. $attachment->prog_id.'/'.$attachment->pdet_id.'/'.$attachment->mat_name)}}"
                                                                       role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                        عرض</a>



                                                                    @can('bt-dele-prog-att')
                                                                        <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->mat_name }}"
                                                                                data-invoice_number="{{ $attachment->prog_id }}"
                                                                                data-id_file="{{ $attachment->mat_id }}"
                                                                                data-target="#delete_file">حذف</button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->
    <!-- edit Master -->
    <div class="modal" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات البرنامج التدريبي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('train_program.update', 'test') }}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Program_name">اسم البرنامج  :</label>
                            <input type="hidden" class="form-control" name="pro_id" id="pro_id"
                                   value="">
                            <input type="text" class="form-control" name="Program_name" id="Program_name" >
                        </div>
                        <div class="form-group">
                            <label for="Program_code" >كود البرنامج</label>
                            <input type="text" name="Program_code" id="Program_code" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="Program_type" >نوع البرنامج</label>
                            <input type="text" name="Program_type" id="Program_type" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="program_comm">الملاحظات :</label>
                            <textarea name="program_comm" cols="20" rows="5" id='program_comm' class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit Detail-->
    <div class="modal" id="modaldemo6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات تفاصيل البرنامج التدريبي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('programDet.update', 'test') }}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Program_name">اسم تفاصيل البرنامج  :</label>
                            <input type="text" class="form-control" name="id" id="id" value="">
                            <input type="text" name="ProgramDet_ID" id="ProgramDet_ID" class="form-control">
                            <input type="text" class="form-control" name="ProgramDet_name" id="ProgramDet_name" >
                        </div>
                        <div class="form-group">
                            <label for="Program_code" >كود تفاصيل البرنامج</label>
                            <input type="text" name="ProgramDet_code" id="ProgramDet_code" class="form-control" >
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="program_comm">الملاحظات :</label>
                            <textarea name="programDet_comm" cols="20" rows="5" id='programDet_comm' class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('train_program.destroy') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var prog_id = button.data('id')
            var prog_code = button.data('code')
            var prog_name = button.data('name')
            var prog_type = button.data('type')
            var prog_comm = button.data('comm')
            var modal = $(this)
            modal.find('.modal-body #pro_id').val(prog_id);
            modal.find('.modal-body #Program_name').val(prog_code);
            modal.find('.modal-body #Program_code').val(prog_name);
            modal.find('.modal-body #Program_type').val(prog_type);
            modal.find('.modal-body #program_comm').val(prog_comm);
        })
        $('#modaldemo6').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var prog_id = button.data('id')
            var progm_id = button.data('prog_id')
            var prog_code = button.data('code')
            var prog_name = button.data('name')
            var prog_comm = button.data('comm')
            var modal = $(this)
            modal.find('.modal-body #id').val(prog_id);
            modal.find('.modal-body #ProgramDet_name').val(prog_code);
            modal.find('.modal-body #ProgramDet_code').val(prog_name);
            modal.find('.modal-body #ProgramDet_ID').val(progm_id);
            modal.find('.modal-body #programDet_comm').val(prog_comm);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
