@extends('layouts.master')
@section('css')

@section('title')
    المستخدمين - تحديث الملف الشخصى
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تعديل الملف الشخصى </span>
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
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif




<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
<br><br>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/' . ($page = 'users')) }}"> رجوع</a>
        </div>
    </div>
</div>

<div class="table-responsive mt-15">

    <table class="table table-striped" style="text-align:center">
        <tbody>
            <tr>
                <th scope="row">اسم المستخدم:</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th scope="row">كلمة المرور:</th>
                <td></td>
            </tr>
            <tr>
                <th scope="row">البريد الالكتروني:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th scope="row">الحالة:</th>
                <td>
                    @if ($user->status == 'T')
                        <span class="label text-success">
                            <div class="dot-label bg-success ml-1"></div>مفعل
                        </span>
                    @else
                        <span class="label text-danger d-flex">
                            <div class="dot-label bg-danger ml-1"></div>غير مفعل
                        </span>
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">الصورة :</th>
                <td><img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/'.Auth::user()->image)}}">
                    {{ $user->image }}
                </td>
            </tr>
            <tr>
                <th scope="row">نوع المستخدم:</th>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
            </tr>

            <tr>
                <th>العمليات</th>
                <td>
                    @can('password-edit')
                        <button class="btn btn-outline-success btn-sm"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-toggle="modal"
                            data-target="#edit_user">تعديل</button>
                    @endcan
                </td>
            </tr>
        </tbody>
    </table>

</div>

<!-- edit_mstr -->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">تعديل كلمة المرور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action='{{ route('profileup', ['id' => $user->id]) }}' method="post"  autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">اسم المستخدم :</label>
                        {{-- hidden --}}
                        <input type="hidden" class="form-control" name="id" id="id" value="{{ $user->id }}">

                        <input type="text" class="form-control" name="name" id="name" disabled value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الالكترونى :</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="password"> كلمة المرور:</label>
                        <input type="password" class="form-control" name="password" id="password" value="" >
                    </div>
                    <div class="form-group">
                        <label for="confirm-password"> تأكد كلمة المرور:</label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" value="" >
                    </div>
                    <div class="form-group">
                        <label for="image">: صوره المستخدم</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تحديث</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
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
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
        $('#edit_mstr').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var req = button.data('req')
            var est = button.data('est')
            var id_ident = button.data('id_ident')
            var req_id = button.data('req_id')
            var emp_comm = button.data('emp_comm')
            var modal = $(this)
            modal.find('.modal-body #emp_comm').val(emp_comm);
            modal.find('.modal-body #id_ident').val(id_ident);
            modal.find('.modal-body #req').val(req);
            modal.find('.modal-body #est').val(est);
            modal.find('.modal-body #req_id').val(req_id);
        })
        $('#edit_req').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var clnt_comm = button.data('clnt_comm')
            var adrss = button.data('adrss')
            var req_id = button.data('req_id')
            var emp_comm = button.data('emp_comm')
            var modal = $(this)
            modal.find('.modal-body #emp_comm').val(emp_comm);
            modal.find('.modal-body #adrss').val(adrss);
            modal.find('.modal-body #clnt_comm').val(clnt_comm);
            modal.find('.modal-body #req_id').val(req_id);
        })


        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var req_id = button.data('req_id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #req_id').val(req_id);
            modal.find('.modal-body #clnt_comm').val(clnt_comm);
        })
    </script>


@endsection


