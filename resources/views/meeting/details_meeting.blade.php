@extends('layouts.master')
@section('css')
    <style>
        th.row{
            color: #0a7ffb;
        }
    </style>

    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل اللجنة التدريبي
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="{{route('dashboard')}}"> اللجان والبرامج المنفذه</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/<a href="{{route('meeting.index')}}">اللجنة التدريبي</a>
                     </span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل اللجنة التدريبي</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
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
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">المعلومات الاساسية للجنة</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">اعضاء اللجنه</a></li>
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
                                                        <th scope="row">الشركة</th>
                                                        <td>{{ $masters->comp_name }}</td>
                                                        <th scope="row">كود اللجنة</th>
                                                        <td>{{ $masters->ms_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">تعريف اللجنة</th>
                                                        <td>{{ $masters->ms_name }}</td>
                                                        <th scope="row">تاريخ اللجنة</th>
                                                        <td>{{ $masters->ms_com_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ملاحظات</th>
                                                        <td>{{ $masters->ms_comm }}</td>
{{--                                                        <th scope="row">id</th>--}}
{{--                                                        <td>{{ $masters->ms_id }}</td>--}}
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">العمليات</th>
                                                        <td>
                                                            <a class="btn btn-success btn-sm "
                                                               data-id="{{ $masters-> ms_id }}"
                                                               data-comp_id="{{ $masters-> comp_id }}"
                                                               data-name="{{ $masters-> ms_name }}"
                                                               data-comDate="{{ $masters-> ms_com_date }}"
                                                               data-code="{{ $masters-> ms_code }}"
                                                               data-comm="{{ $masters-> ms_comm }}"
                                                               data-toggle="modal"
                                                               data-target="#select3modal">تعديل</a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="card-body">
                                                <h5 class="card-title">اضافة عضو</h5>
                                                <form method="post" action="{{ route('members.store') }}"
                                                      enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Members" class="control-label">اسم العضو</label>
                                                            <select class="form-control" style="text-align: center" name="Members" id="Members">
                                                                <option value="" selected disabled> -- اختر اسم العضو --</option>
                                                                @foreach ($member as $x)
                                                                    <option value="{{ $x->emp_id }}">{{ $x->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="hidden" id="customFile" name="invoice_number"  value="{{ $masters->ms_code }}">
                                                        <input type="hidden" id="prog_id" name="prog_id" value="{{ $masters->ms_id }}">

                                                    </div><br><br>
                                                    <button type="submit" class="btn btn-primary btn-sm "
                                                            name="uploadedFile">تاكيد</button>
                                                </form>
                                            </div>
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                       style="text-align:center">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>كود العضو</th>
                                                        <th>اسم العضو</th>
                                                        <th>ملاحظات</th>
                                                        <th>تاريخ الاضافة </th>
                                                        <th>المستخدم</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($emps as $x)
                                                            <?php $i++; ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $x->code }}</td>
                                                            <td>{{ $x->name }}</td>
                                                            <td>{{ $x->comm }}</td>
                                                            <td>{{ $x->created_at }}</td>
                                                            <td>{{ $x->created_by }}</td>
                                                            <td>
                                                                <a class="btn btn-primary btn-sm "
                                                                   data-emp_id="{{ $x->emp_id }}"
                                                                   data-emp_name="{{ $x-> name }}"
                                                                   data-emp_comm="{{ $x-> comm }}"
                                                                   data-comm_id="{{ $x-> comm_id }}"
                                                                   data-com_mem_id="{{ $x-> id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#select2modal">تعديل</a>
{{--                                                                <a class="btn btn-primary btn-sm"--}}
{{--                                                                   href="{{ route('members.edit', $x->emp_id) }}">تعديل</a>--}}
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
                                                        <form method="post" action="{{ route('MeetAttachments.store') }}"
                                                              enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                       name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                       value="{{ $masters->ms_code }}">
                                                                <input type="hidden" id="prog_id" name="prog_id"
                                                                       value="{{ $masters->ms_id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div><br>
                                                            <div class="custom-form">
                                                                <label for="Codes" class="label-control">الكود</label>
                                                                <input name="Codes" id="Codes" class="form-control" type="text">
                                                            </div><br>
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
                                                                <th scope="col">قام بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                            @foreach ($attachments as $attachment)
                                                                    <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $attachment->name }}</td>
                                                                    <td>{{ $attachment->created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">
                                                                        <a class="btn btn-success btn-sm" target="_blank"
                                                                           href="{{ URL::asset('Attachments/committee/'. $attachment->comm_id.'/'.$attachment->name)}}"
                                                                           role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            عرض</a>
{{--                                                                        <a class="btn btn-info btn-sm"--}}
{{--                                                                           href=""--}}
{{--                                                                           role="button"><i class="fas fa-download"></i>&nbsp;--}}
{{--                                                                            تحميل</a>--}}
                                                                {{--                                                                    @can('dele-prog-att')--}}
                                                                        <button class="btn btn-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->name }}"
                                                                                data-invoice_number="{{ $attachment->comm_id }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">حذف</button>
{{--                                                                    @endcan--}}

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
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

{{--edit--}}
      <div class="modal fade" id="select2modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات اعضاء اللجنة</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="{{ route('members.update', 'test') }}" method="post">
                      {{ method_field('patch') }}
                      {{ csrf_field() }}
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="hidden" id="Mem_id" name="Mem_id" value="" class="form-control">
                              <input type="hidden" id="Com_id" name="Com_id" value="" class="form-control">
                              <input type="hidden" id="Com_Mem_id" name="Com_Mem_id" value="" class="form-control">
                              <label for="Mem_name" class="control-label">أعضاء اللجنة</label>
                              <select id="Mem_name" name="Mem_name" class="form-control">
                                  <option value="{{ $x->emp_id }}">{{ $x->name }}</option>
                                  @foreach ($member as $y)
                                      <option value="{{ $y->emp_id }}"> {{ $y->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Comm" class="control-label">توصيات</label>
                              <textarea class="form-control" id="Mem_Comm" name="Mem_Comm" rows="3"></textarea>
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
{{--      EndEdit--}}
        {{--edit master--}}
        <div class="modal fade" id="select3modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('meeting.update', 'test') }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="Ms_Id" name="Ms_Id" value="" class="form-control">
                                <label for="Comps" class="control-label">اسم الشركة</label>
                                <select id="Comps" name="Comps" class="form-control">
                                    <option value="{{ $masters->comp_id }}">{{ $masters->comp_name }}</option>
                                    @foreach ($Comps as $y)
                                        <option value="{{ $y->id }}"> {{ $y->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group control-group row">
                                <div class="col">
                                    <label for="Ms_Code" class="control-label">كود اللجنة</label>
                                    <input id="Ms_Code" name="Ms_Code" class="form-control" type="text" value="{{$masters ->ms_code}}">
                                </div>
                                <div class="col">
                                    <label for="Ms_Name" class="control-label">تعريف اللجنة</label>
                                    <input id="Ms_Name" name="Ms_Name" class="form-control" type="text" value="{{$masters -> ms_name}}">
                                </div>
                                <div class="col">
                                    <label for="Ms_Com_Date" class="control-label">تاريخ اللجنة</label>
                                    <input id="Ms_Com_Date" name="Ms_Com_Date" class="form-control" type="date" value="">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="Ms_Comm" class="control-label">توصيات</label>
                                <textarea class="form-control" id="Ms_Comm" name="Ms_Comm" rows="3"></textarea>
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
        {{--      EndEdit--}}
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
        $('#select2modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Emp_Id = button.data('emp_id')
            var Comm_Id = button.data('comm_id')
            var Com_Mem_Id = button.data('com_mem_id')
            var Emp_Comm = button.data('emp_comm')
            var modal = $(this)

            modal.find('.modal-body #Mem_id').val(Emp_Id);
            modal.find('.modal-body #Com_id').val(Comm_Id);
            modal.find('.modal-body #Mem_Comm').val(Emp_Comm);
            modal.find('.modal-body #Com_Mem_id').val(Com_Mem_Id);
        })
        $('#select3modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Ms_Id_3 = button.data('id')
            // var Comp_Id = button.data('comp_id')
            var Ms_Code = button.data('code')
            var Ms_Name = button.data('name')
            var Ms_Com_Date = button.data('comDate')
            var Ms_Comm = button.data('comm')
            var modal = $(this)

            modal.find('.modal-body #Ms_Id').val(Ms_Id_3);
            // modal.find('.modal-body #Comps').val(Comp_Id);
            modal.find('.modal-body #Ms_Code').val(Ms_Code);
            modal.find('.modal-body #Ms_Name').val(Ms_Name);
            modal.find('.modal-body #Ms_Com_Date').val(Ms_Com_Date);
            modal.find('.modal-body #Ms_Comm').val(Ms_Comm);
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
