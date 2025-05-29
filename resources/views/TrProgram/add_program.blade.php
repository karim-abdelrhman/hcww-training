@extends('layouts.master')
@section('title')
    اضافة برنامج تدريبي
@endsection
@section('css')

    <link href="{{ URL::asset('assets/css/fileUpload.css') }}" rel="stylesheet">
    {{--select with search--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    {{-- end select with search--}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="#">البرامج والمواد التدريبية</a></h4>
                <h4 class="content-title mb-0 my-auto"><a href="{{ route('train_program.index') }}">/ قائمة البرامج التدريبية</a></h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة برنامج تدريبي</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{URL('/train_program')}}">رجوع</a>
                        </div>
                    </div><br>
                    <form action="{{ route('train_program.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}


                                    <div class="row">
                                        <div class="col">
                                            <label for="Program_code" class="control-label">كود البرنامج</label>
                                            <input type="text" name="Program_code" id="Program_code" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <label for="Program_name" class="control-label">اسم البرنامج</label>
                                            <input type="text" name="Program_name" id="Program_name" class="form-control" required>
                                        </div>
                                    </div><br><br>
                                    <div class="row">

                                        <div class="col">
                                            <label for="comm" class="control-label">ملاحظات</label>
                                            <textarea class="form-control" id="comm" name="comm" rows="3"></textarea>
                                        </div>

                                    </div><br><br>


                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">
                                        <label class="control-label"> وحدات البرنامج التدريبى</label><span style="color: red">*</span>
                                        <div class="table-responsive col-md-10">
                                            <table class="table mg-b-0 text-md-nowrap table-bordered text-center">
                                                <thead>
                                                <tr>
                                                    <th width="1%">#</th>
                                                    <th>كود الوحده </th>
                                                    <th>اسم الوحده </th>
                                                    <th width="5%"><button class="btn btn-sm btn-info" type="button" onclick="addRow()">اضافه</button></th>
                                                </tr>
                                                </thead>
                                                <tbody id="tbl_det">
                                                <tr>
                                                    <th scope="row" >1</th>
                                                    <td>
                                                        <input class="form-control" name="Det_code[]" oninvalid="this.setCustomValidity('الرجاء ادخال كود تفاصيل البرنامج التدريبى')"
                                                               oninput="setCustomValidity('')">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="Det_name[]" oninvalid="this.setCustomValidity('الرجاء ادخال اسم تفاصيل البرنامج التدريبى')"
                                                               oninput="setCustomValidity('')">
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
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                </div>--}}
                        <br><br>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">الحفظ </button>
                                    </div>


                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Container closed -->

@endsection
@section('js')
    <script>
        $(function(){
            $( ".fc-datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
            $('.fc-datepicker').keypress(function(event){
                event.preventDefault();
            });
        });
    </script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <script>
        function addRow(){
            var id="";
            id=$("#tbl_det tr:last th:first").text();
            id++;
            var newRow=`<tr>
                            <th scope="row">`+id+`</th>
                            <td>
                                <input class="form-control" name="Det_code[]" oninvalid="this.setCustomValidity('الرجاء ادخال كود تفاصيل البرنامج التدريبى')"
                                                   oninput="setCustomValidity('')">
                            </td>
                            <td>
                            <input class="form-control" name="Det_name[]" oninvalid="this.setCustomValidity('الرجاء ادخال اسم تفاصيل البرنامج التدريبى')"
                                                   oninput="setCustomValidity('')">
                            </td>

                            <td>
                                <button class="del_row btn btn-sm btn-danger" type="button" onclick="del_row(this)" >حذف</button>
                            </td>
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
                if (!img.type.match("image.*")) {
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
        $(function () {

        });
    </script>
    {{--select with serch--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

    </script>
    {{--end select with search--}}
@endsection
