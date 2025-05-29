@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    بيانات العامل تفصيلى
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4>
                <a href="{{ route('employee.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    العاملين</span></a>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الموظف</span>
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
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الموظف</a></li>
                                            {{--                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>--}}
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
                                                        <th scope="row">الكـــود</th>
                                                        <td>{{ $employee->code }}</td>
                                                        <th scope="row">الاســـم</th>
                                                        <td>{{ $employee->name }}</td>
                                                        <th scope="row">تاريخ الميلاد</th>
                                                        <td>{{ $employee->birth_date }}</td>
                                                        <th scope="row">العمر</th>
                                                        <td>{{ $employee->age }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">البريد الالكترونى</th>
                                                        <td>{{ $employee->email}}</td>
                                                        <th scope="row">رقم البطاقة</th>
                                                        <td>{{ $employee->id_number }}</td>
                                                        <th scope="row">رقم الهاتف المحمول 1</th>
                                                        <td>{{ $employee->phone1 }}</td>
                                                        <th scope="row">رقم الهاتف المحمول 2</th>
                                                        <td>{{ $employee->phone2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">المؤهل</th>
                                                        <td>{{ $employee->degree->name }}</td>
                                                        <th scope="row">الكليه</th>
                                                        <td>{{ $employee->faculty->name }}</td>
                                                        <th scope="row">المسار الوظيفى</th>
                                                        <td>{{ $employee->careerPath->name }}</td>
                                                        <th scope="row">الشركة</th>
                                                        <td>{{ $employee->company->name  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">نوع التعيين</th>
                                                        <td>{{ $employee->contract_type }}</td>
                                                        <th scope="row">تاريخ التعيين</th>
                                                        <td>{{ $employee->dependable }}</td>
                                                        <th scope="row">الرقم التأمينى</th>
                                                        <td>{{ $employee->insurance_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">المسمى الوظيفى</th>
                                                        <td>{{ $employee->position->name }}</td>
                                                        <th scope="row">الاداره التابع لها / القطاع</th>
                                                        <td>{{ $employee->organization->name }}</td>
                                                        <th scope="row">الدرجه الماليه</th>
                                                        <td>{{ $employee->grade->name }}</td>
                                                        <th scope="row">الوظيفة</th>
                                                        <td>{{ $employee->job->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">الديانه</th>
                                                        <td>{{ $employee->relition  == 1 ? 'مسلم' : 'مسيحي' }}</td>
                                                        <th scope="row">النوع (الجنس)</th>
                                                        <td>{{ $employee->gender == 1 ? 'ذكر' : 'أنثي' }}</td>
                                                        <th scope="row">الجنسيه</th>
                                                        <td>{{ $employee->nationality }}</td>
                                                        <th scope="row">الحالة الحالية</th>
                                                        @if ($employee->active === 'T')
                                                            <td>
                                                                <span class="badge badge-pill badge-success">فعال</span>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <span
                                                                    class="badge badge-pill badge-warning">غير فعال</span>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">
                                                <div class="card-body">
                                                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">اضافة مرفقات</h5>
                                                    <form method="post" action="{{ url('/empDocs') }}"
                                                          enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label for="docType">نوع المستند</label>
                                                            <input type="text" class="form-control" id="docType"
                                                                   name="docType" required>
                                                        </div>
                                                        <br>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="file_name"
                                                                   name="file_name" required>
                                                            <input type="hidden" id="emp_id" name="emp_id"
                                                                   value="{{ $employee->id }}">
                                                            <label class="custom-file-label" for="customFile">حدد
                                                                المرفق</label>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">تاكيد
                                                        </button>
                                                    </form>
                                                </div>
                                                <br>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table-hover"
                                                           style="text-align:center">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            <th scope="col">م</th>
                                                            <th scope="col">اسم الملف</th>
                                                            <th scope="col">العمليات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0; ?>
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>السيرة الذاتية</td>
                                                            <td colspan="2">
                                                                <a class="btn btn-outline-success btn-sm"
                                                                   target="_blank"
                                                                   href="{{ asset('storage/' . $employee->cv)}}"
                                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                    عرض</a>
                                                                <a class="btn btn-outline-info btn-sm"
                                                                   href=""
                                                                   role="button"><i
                                                                        class="fas fa-download"></i>&nbsp;
                                                                    تحميل</a>
                                                                <button class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-file_name="{{ $employee->cv }}"
                                                                        data-id_file="{{ $employee->id }}"
                                                                        data-target="#delete_file1">حذف
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>بطاقة الوصف الوظيفي</td>
                                                            <td colspan="2">
                                                                <a class="btn btn-outline-success btn-sm"
                                                                   target="_blank"
                                                                   href="{{ asset('storage/' . $employee->job_description_card)}}"
                                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                    عرض</a>
                                                                <a class="btn btn-outline-info btn-sm"
                                                                   href=""
                                                                   role="button"><i
                                                                        class="fas fa-download"></i>&nbsp;
                                                                    تحميل</a>
                                                                <button class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-file_name="{{ $employee->job_description_card }}"
                                                                        data-id_file="{{ $employee->id }}"
                                                                        data-target="#delete_file1">حذف
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            {{-- we will return to it again --}}
                                                            <td>3</td>
                                                            <td>بيان الحالة الوظيفية المعتمد</td>
                                                            <td colspan="2">
{{--                                                                <a class="btn btn-outline-success btn-sm"--}}
{{--                                                                   target="_blank"--}}
{{--                                                                   href="{{ asset('storage/' . $employee->job_description_card)}}"--}}
{{--                                                                   role="button"><i class="fas fa-eye"></i>&nbsp;--}}
{{--                                                                    عرض</a>--}}
{{--                                                                <a class="btn btn-outline-info btn-sm"--}}
{{--                                                                   href=""--}}
{{--                                                                   role="button"><i--}}
{{--                                                                        class="fas fa-download"></i>&nbsp;--}}
{{--                                                                    تحميل</a>--}}
{{--                                                                <button class="btn btn-outline-danger btn-sm"--}}
{{--                                                                        data-toggle="modal"--}}
{{--                                                                        data-file_name="{{ $employee->job_description_card }}"--}}
{{--                                                                        data-id_file="{{ $employee->id }}"--}}
{{--                                                                        data-target="#delete_file">حذف--}}
{{--                                                                </button>--}}
                                                            </td>
                                                        </tr>
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
        </div>
    </div>
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
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center"><h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
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
        $('#delete_file').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
