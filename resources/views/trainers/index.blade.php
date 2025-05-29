@extends('layouts.master')
@section('title')
    قائمة المدربين
@stop
@section('page-header')
{{--    <!-- breadcrumb -->--}}
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التعريفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    المدربين</span>
            </div>
        </div>

    </div>
@endsection
@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('Edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
   @if (session()->has('delete'))
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>{{ session()->get('delete') }}</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
   @endif
    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can('bt-add-trainer')
                            <a href="{{route('trainers.create')}}" class="modal-effect btn btn-outline-primary btn-sm">اضافة مدرب</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">كود المدرب</th>
                                <th class="border-bottom-0">اسم المدرب</th>
                                <th class="border-bottom-0">رقم الهاتف</th>
                                <th class="border-bottom-0">البريد الالكترونى</th>
                                <th class="border-bottom-0">الدرجه المالية</th>
                                <th class="border-bottom-0"> المؤهل</th>
                                <th class="border-bottom-0">جهه المدرب</th>
                                <th class="border-bottom-0">تأهيل المدرب</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">ملاحظات</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @php--}}
{{--                                $i = 0;--}}
{{--                            @endphp--}}
{{--                            @foreach ($trainers as $trainer)--}}
{{--                                @php--}}
{{--                                    $i++--}}
{{--                                @endphp--}}
                                <tr>
                                    <td>
{{--                                        {{ $i }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $trainer->code }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $trainer->a_name }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $trainer->tel }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $trainer->email }}--}}
                                    </td>
                                    <td>
{{--                                        @if($trainer->grade_id == 1)--}}
{{--                                            <span class="text-success">دكتوراه</span>--}}
{{--                                        @elseif($trainer->grade_id == 2)--}}
{{--                                            <span class="text-success">ماجستير</span>--}}
{{--                                        @elseif($trainer->grade_id == 3)--}}
{{--                                            <span class="text-success">بكالوريوس</span>--}}
{{--                                        @elseif($trainer->grade_id == 4)--}}
{{--                                            <span class="text-success">ثانويه</span>--}}
{{--                                        @elseif($trainer->grade_id == 5)--}}
{{--                                            <span class="text-success">متوسط </span>--}}
{{--                                        @elseif($trainer->grade_id == 6)--}}
{{--                                            <span class="text-success">تحت متوسط </span>--}}
{{--                                        @elseif($trainer->grade_id == 7)--}}
{{--                                            <span class="text-success">بدون </span>--}}
{{--                                        @elseif($trainer->grade_id == 8)--}}
{{--                                            <span class="text-success">ليسانس </span>--}}
{{--                                        @elseif($trainer->grade_id == 9)--}}
{{--                                            <span class="text-success">فوق متوسط </span>--}}
{{--                                        @elseif($trainer->grade_id == 10)--}}
{{--                                            <span class="text-success">ابتدائيه </span>--}}
{{--                                        @elseif($trainer->grade_id == 11)--}}
{{--                                            <span class="text-success">اعداديه </span>--}}
{{--                                        @elseif($trainer->grade_id == 12)--}}
{{--                                            <span class="text-success">محو اميه </span>--}}
{{--                                        @endif--}}
                                    </td>
                                    <td>
{{--                                        @if($trainer->deg_id == 1)--}}
{{--                                            <span class="text-success">الدرجة الممتازة</span>--}}
{{--                                        @elseif($trainer->deg_id == 2)--}}
{{--                                            <span class="text-success">الدرجة العليا</span>--}}
{{--                                        @elseif($trainer->deg_id == 3)--}}
{{--                                            <span class="text-success">درجة مدير عام</span>--}}
{{--                                        @elseif($trainer->deg_id == 4)--}}
{{--                                            <span class="text-success">درجة كبير</span>--}}
{{--                                        @elseif($trainer->deg_id == 5)--}}
{{--                                            <span class="text-success">الدرجة الاولى </span>--}}
{{--                                        @elseif($trainer->deg_id == 6)--}}
{{--                                            <span class="text-success">الدرجة الثانية </span>--}}
{{--                                        @elseif($trainer->deg_id == 7)--}}
{{--                                            <span class="text-success">الدرجة الثالثة </span>--}}
{{--                                        @elseif($trainer->deg_id == 8)--}}
{{--                                            <span class="text-success">الدرجة الرابعة </span>--}}
{{--                                        @elseif($trainer->deg_id == 9)--}}
{{--                                            <span class="text-success">الدرجة الخامسة </span>--}}
{{--                                        @elseif($trainer->deg_id == 10)--}}
{{--                                            <span class="text-success">الدرجة السادسة </span>--}}
{{--                                        @endif--}}
                                    </td>
                                    <td>
{{--                                        @if($trainer->tr_side == 'IN')--}}
{{--                                            <span class="text-success">داخلى</span>--}}
{{--                                        @else--}}
{{--                                            <span class="text-warning">خارجى</span>--}}
{{--                                        @endif--}}
                                    </td>
                                    <td>
{{--                                        @if ($trainer->dependable == 'T')--}}
{{--                                            <span class="text-success">معتمد</span>--}}
{{--                                        @else--}}
{{--                                            <span class="text-warning">غير معتمد</span>--}}
{{--                                        @endif--}}
                                    </td>
                                    <td>
{{--                                        @if ($trainer->type == 'E')--}}
{{--                                            <span class="text-success">مشرف</span>--}}
{{--                                        @elseif ($trainer->type == 'M')--}}
{{--                                            <span class="text-success">عضو لجنة</span>--}}
{{--                                        @else--}}
{{--                                            <span class="text-success">مدرب</span>--}}
{{--                                        @endif--}}
                                    </td>
                                    <td>
{{--                                        {{ $trainer->comm }}--}}
                                    </td>
                                    <td>
                                        @can('bt-edit-trainer')
                                            <button class="btn btn-outline-success btn-sm"
{{--                                                    data-name="{{ $trainer->a_name }}"--}}
{{--                                                    data-pro_id="{{ $trainer->id }}"--}}
{{--                                                    data-code="{{ $trainer->code }}"--}}
{{--                                                    data-deg_id="{{ $trainer->deg_id }}"--}}
{{--                                                    data-tel="{{ $trainer->tel }}"--}}
{{--                                                    data-email="{{ $trainer->email }}"--}}
{{--                                                    data-grade_id="{{ $trainer->grade_id }}"--}}
{{--                                                    data-tr_side="{{ $trainer->tr_side }}"--}}
{{--                                                    data-dependable="{{ $trainer->dependable }}"--}}
{{--                                                    data-type="{{ $trainer->type }}"--}}
{{--                                                    data-note="{{ $trainer->comm }}"--}}
{{--                                                    data-toggle="modal"--}}
                                                    data-target="#edit_Product">تعديل</button>
                                        @endcan

                                        @can('bt-delete-trainer')
                                            <button class="btn btn-outline-danger btn-sm "
{{--                                                    data-pro_id="{{ $trainer->id }}"--}}
{{--                                                    data-product_name="{{ $trainer->a_name }}" --}}
                                                    data-toggle="modal"
                                                    data-target="#modaldemo9">حذف</button>
                                        @endcan
                                    </td>
                                </tr>
{{--                            @endforeach--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    <!-- add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة مدرب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('trainers.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">كود المدرب :</label>
                            <input type="text" class="form-control" name="code" id="code">
                        </div>
                        <div class="form-group">
                            <label for="title">اسم المدرب :</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="title"> الرقم القومى :</label>
                            <input type="text" class="form-control" name="id_no" id="id_no">
                        </div>
                        <div class="form-group">
                            <label for="title"> البريد الالكترونى :</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="title"> رقم الهاتف :</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group">
                            <label for="title"> العنوان :</label>
                            <input type="text" class="form-control" name="adress" id="adress">
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="deg_id">الدرجه المالية</label>
                            <select name="deg_id" id="deg_id" class="form-control" required>
                                <option value="" selected disabled>--اختر الدرجه المالية--</option>
{{--                                @foreach ($deg_ids as $deg_id)--}}
{{--                                    <option value="{{ $deg_id->id }}">{{ $deg_id->a_dsc }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="grade_id">المؤهل</label>
                            <select name="grade_id" id="grade_id" class="form-control" required>
                                <option value="" selected disabled>--اختر المؤهل--</option>
{{--                                @foreach ($degrees as $degree)--}}
{{--                                    <option value="{{ $degree->id }}">{{ $degree->a_dsc }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="type">نوع التعيين</label>
                            <select name="type" id="type" class="form-control" onchange="showTyp(this)" required>
                                <option value="" selected disabled>--اختر النوع--</option>
                                <option value="'E'">موظف</option>
                                <option value="'M'">عضو لجنة</option>
                                <option value="T">مدرب</option>
                            </select>
                        </div>
                        <div class="form-group" id="dependable1">
                            <label class="my-1 mr-2" for="dependable">نوع الاعتماد</label>
                            <select name="dependable" id="dependable" class="form-control" >
                                <option value="" selected disabled>--اختر نوع الاعتماد--</option>
                                <option value="T" >معتمد</option>
                                <option value="F" >غير معتمد</option>
                            </select>
                        </div>
                        <div class="form-group" id="dependable_date1">
                            <label>تاريخ الاعتماد</label>
                            <input class="form-control fc-datepicker" id="dependable_date" name="dependable_date" placeholder="YYYY-MM-DD"
                                   type="text" value="{{ date('Y-m-d') }}" >
                        </div>

                        <div class="form-group" id="tr_side1" >
                            <label class="my-1 mr-2" for="tr_side">نوع المدرب</label>
                            <select name="tr_side" id="tr_side"  class="form-control"  onchange="showComp(this)" >
                                <option value="" selected disabled>--اختر نوع المدرب--</option>
                                <option value="IN" >داخلى</option>
                                <option value="OT" >خارجى</option>
                            </select>
                        </div>

                        <div class="form-group" id="comp1">
                            <label class="my-1 mr-2" for="dependable">الشركة</label>
                            <select name="comp" id="comp" class="form-control"
                                    onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                <option value="" selected disabled>--اختر الشركة--</option>
{{--                                @foreach ($comps as $comp)--}}
{{--                                    <option value="{{ $comp->gov_id }}">{{ $comp->gov_name }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group" id="compName1">
                            <label for="inputName" class="control-label">.</label>
                            <select id="compName" name="compName" class="form-control">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="des">ملاحظات :</label>
                            <textarea name="note" cols="20" rows="5" id='note' class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <p class="text-danger">* صيغة المرفق pdf  </p>
                            <label for="title"> المرفقات :</label>
                            <input type="file" name="pic" class="dropify" accept=".pdf"
                                   data-height="70" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit -->
    <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات مدرب </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action='trainers/update' method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">كود المدرب :</label>
                            <input type="hidden" class="form-control" name="pro_id" id="pro_id"
                                   value="">
                            <input type="text" class="form-control" name="code" id="code">
                        </div>
                        <div class="form-group">
                            <label for="title">اسم المدرب :</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الدرجه المالية</label>
                            <select name="deg_id" id="deg_id" class="custom-select my-1 mr-sm-2" >
{{--                                @foreach ($deg_ids as $deg_id)--}}
{{--                                    <option value="{{ $deg_id->id }}">{{ $deg_id->a_dsc }}</option>--}}
{{--                               @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المؤهل</label>
                            <select name="grade_id" id="grade_id" class="custom-select my-1 mr-sm-2" >
{{--                                @if($trainer->grade_id == $degree->id )--}}
{{--                                    @foreach ($degrees as $degree)--}}
{{--                                        <option value="{{ $degree->id }}">{{ $degree->a_dsc }}</option>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع التعيين</label>
                            <select name="type" id="type" class="custom-select my-1 mr-sm-2" >
                                <option value="'E'">موظف</option>
                                <option value="'M'">عضو لجنة</option>
                                <option value="T">مدرب</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع التعيين</label>
                            <select name="dependable" id="dependable" class="custom-select my-1 mr-sm-2" >
                                <option value="T" >معتمد</option>
                                <option value="F" >غير معتمد</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="des">ملاحظات :</label>
                            <textarea name="description" cols="20" rows="5" id='description' class="form-control"></textarea>
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
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف مدرب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="trainers/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="pro_id" id="pro_id" value="">
                        <input class="form-control" name="product_name" id="product_name" type="text" readonly>
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
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    <script type="text/javascript">
        function showTyp(select){
            if(select.value=='T'){
                document.getElementById('dependable1').style.display = "block";
                document.getElementById('dependable_date1').style.display = "block";
                document.getElementById('tr_side1').style.display = "block";
            } else{
                document.getElementById('dependable1').style.display = "none";
                document.getElementById('dependable_date1').style.display = "none";
                document.getElementById('tr_side1').style.display = "none";
            }
        }
        function showComp(select){
            if(select.value=='IN'){
                document.getElementById('comp1').style.display = "block";
                document.getElementById('compName1').style.display = "block";
            } else{
                document.getElementById('comp1').style.display = "none";
                document.getElementById('compName1').style.display = "none";
            }
        }
    </script>
    <script>
        $('#edit_Product').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var code = button.data('code')
            var name = button.data('name')
            var section_name = button.data('section_name')
            var pro_id = button.data('pro_id')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #code').val(code);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #pro_id').val(pro_id);
        })
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #product_name').val(product_name);
        })
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="comp"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('getcomps') }}/" + SectionId,
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







@endsection
