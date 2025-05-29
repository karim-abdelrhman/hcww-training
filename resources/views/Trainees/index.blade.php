@extends('layouts.master')
@section('title')
    قائمة المتدربين
@stop
@section('css')
    /*<!-- Internal Data table css -->*/
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
{{--    <!--Internal   Notify -->--}}
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
{{--    <!-- breadcrumb -->--}}
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعريفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    المتدربين</span>
            </div>
        </div>

    </div>
{{--    <!-- breadcrumb -->--}}
@endsection
@section('content')
    @if (session()->has('delete_emp'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
    @if (session()->has('Status_Update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تحديث حالة الدفع بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
    @if (session()->has('restore_emp'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم استعادة الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    @can('Emp-add')
                        <a href="trainees/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة متدرب</a>
                    @endcan


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">كود الموظف</th>
                                <th class="border-bottom-0">اسم الموظف</th>
                                <th class="border-bottom-0">الوظيفة</th>
                                <th class="border-bottom-0">الدرجة</th>
                                <th class="border-bottom-0">تاريخ الدرجه</th>
                                <th class="border-bottom-0">المؤهل</th>
                                <th class="border-bottom-0">تاريخ المؤهل</th>
                                <th class="border-bottom-0">تاريخ الميلاد</th>
                                <th class="border-bottom-0">تاريخ التعيين</th>
                                <th class="border-bottom-0">التليفون</th>
                                <th class="border-bottom-0">الموبايل</th>
                                <th class="border-bottom-0">البريد الالكترونى</th>
                                <th class="border-bottom-0">الديانة</th>
                                <th class="border-bottom-0">الادارة التابع لها</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($all_emp as $emp)
                                @php
                                    $i++
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $emp->code }} </td>
                                    <td><a href="{{ url('empDetails') }}/{{ $emp->emp_id }}">{{ $emp->a_name }}</a></td>
                                    <td>{{ $emp->job_id }}</td>
                                    <td>{{ $emp->grade_id }}</td>
                                    <td>{{ $emp->grade_date }}</td>
                                    <td>{{ $emp->degree_id }}</td>
                                    <td>{{ $emp->degree_date }}</td>
                                    <td>{{ $emp->birth_date }}</td>
                                    <td>{{ $emp->hire_date }}</td>
                                    <td>{{ $emp->tel }}</td>
                                    <td>{{ $emp->mob }}</td>
                                    <td>{{ $emp->email }}</td>
                                    <td>
                                        @if ($emp->religions_id == 60)
                                            <span class="text-success">مسلم</span>
                                        @elseif($emp->religions_id == 61)
                                            <span class="text-success">مسيحى</span>
                                        @endif

                                    </td>

                                    <td>{{ $emp->org_unit_id }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                @can('Emp-edit')
                                                    <a class="dropdown-item"
                                                       href=" {{ url('edit_emp') }}/{{ $emp->emp_id }}">تعديل
                                                        المتدرب</a>
                                                @endcan
                                                @can('Emp-deleted')
                                                    <a class="dropdown-item" href="#" data-emp_id="{{ $emp->emp_id }}"
                                                       data-toggle="modal" data-target="#delete_emp"><i
                                                            class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                        المتدرب</a>
                                                @endcan

                                            </div>
                                        </div>

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

    <!-- حذف الفاتورة -->
    <div class="modal fade" id="delete_emp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('trainees.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                    <input type="hidden" name="emp_id" id="emp_id" value="">
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
{{--    <!-- Internal Data tables -->--}}
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
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $('#delete_emp').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var emp_id = button.data('emp_id')
            var modal = $(this)
            modal.find('.modal-body #emp_id').val(emp_id);
        })

    </script>

    <script>
        $('#Transfer_emp').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var emp_id = button.data('emp_id')
            var modal = $(this)
            modal.find('.modal-body #emp_id').val(emp_id);
        })

    </script>







@endsection
