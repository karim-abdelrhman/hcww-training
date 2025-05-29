@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    مراكز التدريب
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    مراكز التدريب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can('bt-add-trPlace')
                            <a class="btn btn-outline-primary btn-sm" href="{{route('training-centers.create')}}"> اضافه
                                مكان تدريب</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الكود</th>
                                <th class="border-bottom-0">اسم مركز التدريب</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($trainingCenters as $center)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $center->code }}</td>
                                    <td>{{ $center->name }}</td>
                                    <td>
                                        <a href="{{route('centers.training-halls.index' , $center->id)}}"
                                           class="btn btn-outline-success btn-sm">قاعات التدريب</a>
                                        <a href="{{route('training-centers.edit' , $center->id)}}"
                                           class="btn btn-outline-success btn-sm">تعديل</a>
                                        <a href="{{route('training-centers.show' , $center->id)}}"
                                           class="btn btn-outline-info btn-sm" target="_blank">التفاصيل
                                        </a>
                                        <form action="{{route('training-centers.destroy', $center->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-sm delete-btn">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الشركة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='training_place/update' method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="code">كود المركز :</label>
                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="name">اسم مركز التدريب :</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="fax"> فاكس :</label>
                                <input type="text" class="form-control" id="fax" name="fax">
                            </div>
                            <div class="form-group">
                                <label for="phone"> تليفون المركز :</label>
                                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{11}">
                            </div>
                            <div class="form-group">
                                <label for="mobile">موبايل المركز :</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{11}">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني :</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان :</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mag_name"> اسم مدير المركز :</label>
                                <input type="text" class="form-control" id="mag_name" name="mag_name">
                            </div>
                            <div class="form-group">
                                <label for="mag_phone">موبايل مدير المركز :</label>
                                <input type="tel" class="form-control" id="mag_phone" name="mag_phone"
                                       pattern="[0-9]{11}">
                            </div>
                            <div class="form-group">
                                <label for="gm_name">اسم مدير عام تدريب :</label>
                                <input type="text" name="gm_name" id="gm_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="gm_phone">موبايل مدير عام التدريب :</label>
                                <input type="tel" class="form-control" id="gm_phone" name="gm_phone"
                                       pattern="[0-9]{11}">
                            </div>
                            <div class="form-group">
                                <label for="sh_name">اسم رئيس قطاع الموارد البشرية :</label>
                                <input type="text" name="sh_name" id="sh_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sh_phone"> تليفون رئيس قطاع الموارد البشرية :</label>
                                <input type="tel" class="form-control" id="sh_phone" name="sh_phone"
                                       pattern="[0-9]{11}">
                            </div>
                            <div class="form-group">
                                <label for="comp"> الشركة :</label>
                                <select class="form-control" name="comp" id="comp">
                                    <option value="" selected disabled> -- اختر --</option>
                                    {{--                                    @foreach ($comps as $comp)--}}
                                    {{--                                        <option value="{{ $comp->id }}">{{ $comp->name}}</option>--}}
                                    {{--                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comm">ملاحظات :</label>
                                <textarea class="form-control" id="comm" name="comm" rows="3"></textarea>
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
                        <h5 class="modal-title">حذف مركز التدريب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="pro_id" id="pro_id" value="">
                            <input class="form-control" name="gov_name" id="gov_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- details -->
        <div class="modal" id="details">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Modal Header</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action='#' method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="code">كود المركز :</label>
                                    <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
                                    <input type="text" class="form-control" id="code" name="code">
                                </div>
                                <div class="form-group col">
                                    <label for="name">اسم مركز التدريب :</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="phone"> تليفون المركز :</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group col">
                                    <label for="mobile">موبايل المركز :</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="fax"> فاكس :</label>
                                    <input type="text" class="form-control" id="fax" name="fax">
                                </div>
                                <div class="form-group col">
                                    <label for="email">البريد الالكتروني :</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="mag_name"> اسم مدير المركز :</label>
                                    <input type="text" class="form-control" id="mag_name" name="mag_name">
                                </div>
                                <div class="form-group col">
                                    <label for="mag_phone">موبايل مدير المركز :</label>
                                    <input type="tel" class="form-control" id="mag_phone" name="mag_phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="gm_name">اسم مدير عام تدريب :</label>
                                    <input type="text" name="gm_name" id="gm_name" class="form-control">
                                </div>
                                <div class="form-group col">
                                    <label for="gm_phone">موبايل مدير عام التدريب :</label>
                                    <input type="tel" class="form-control" id="gm_phone" name="gm_phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="sh_name">اسم رئيس قطاع الموارد البشرية :</label>
                                    <input type="text" name="sh_name" id="sh_name" class="form-control">
                                </div>
                                <div class="form-group col">
                                    <label for="sh_phone"> تليفون رئيس قطاع الموارد البشرية :</label>
                                    <input type="tel" class="form-control" id="sh_phone" name="sh_phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان :</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="comp"> الشركة :</label>
                                <select class="form-control" name="comp" id="comp">
                                    <option value="" selected disabled></option>
                                    {{--                                    @foreach ($comps as $comp)--}}
                                    {{--                                        <option value="{{ $comp->id }}">{{ $comp->name}}</option>--}}
                                    {{--                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comm">ملاحظات :</label>
                                <textarea class="form-control" id="comm" name="comm" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal effects-->
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
            <!-- Internal Modal js-->
            <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


@endsection
