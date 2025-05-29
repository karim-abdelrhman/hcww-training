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
    قاعات التدريب
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قاعات التدريب</span>
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
                        <a class="btn btn-outline-primary btn-sm" data-toggle="modal"
                           data-target="#add"> اضافه
                            قاعة تدريب</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">رقم القاعة</th>
                                <th class="border-bottom-0">الطاقة الإستيعابية</th>
                                <th class="border-bottom-0">صورة القاعة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($trainingHalls as $hall)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $hall->hall_number }}</td>
                                    <td>{{ $hall->capacity }}</td>
                                    <td>
                                        <a href="{{asset('storage/' . $hall->image)}}" target="_blank">
                                            <img src="{{asset('storage/' . $hall->image)}}" width="75;" height="75px;"
                                                 alt="Training Hall">
                                        </a>
                                    </td>
                                    <td>
                                        {{--                                        <a class="btn btn-outline-success btn-sm edit-btn"--}}
                                        {{--                                           data-toggle="modal"--}}
                                        {{--                                           data-target="#edit"--}}
                                        {{--                                           data-id="{{ $hall->id }}"--}}
                                        {{--                                           data-hall_number="{{ $hall->hall_number }}"--}}
                                        {{--                                           data-capacity="{{ $hall->capacity }}"--}}
                                        {{--                                           data-image="{{ asset('storage/' . $hall->image) }}">--}}
                                        {{--                                            تعديل--}}
                                        {{--                                        </a>--}}

                                        <form action="{{route('training-halls.destroy' , $hall->id)}}" method="post"
                                              class="d-inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف')">
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
        {{--add--}}
        <div class="modal" id="add">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة قاعة تدريب</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal"
                                type="button"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('training-halls.store') }}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="training_center_id" value="{{$trainingCenter->id}}">
                                <label for="code">رقم القاعة</label>
                                <input type="number" class="form-control @error('hall_number') is-invalid @enderror"
                                       id="hall_number" name="hall_number">
                                @error('hall_number') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">الطاقة الإستيعابية</label>
                                <input type="number" class="form-control @error('capacity') is-invalid @enderror"
                                       id="capacity" name="capacity">
                                @error('capacity') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">صورة القاعة</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                       name="image">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--edit--}}
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات القاعة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="training_center_id" value="{{$trainingCenter->id}}">
                                <label for="code">رقم القاعة</label>
                                <input type="number" class="form-control @error('hall_number') is-invalid @enderror"
                                       id="hall_number" name="hall_number">
                                @error('hall_number') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">الطاقة الإستيعابية</label>
                                <input type="number" class="form-control @error('capacity') is-invalid @enderror"
                                       id="capacity" name="capacity">
                                @error('capacity') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">صورة القاعة</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                       name="image">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
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
            <script>
                // Edit modal
                $(document).on('click', '.edit-btn', function () {
                    let id = $(this).data('id');
                    let hallNumber = $(this).data('hall_number');
                    let capacity = $(this).data('capacity');
                    let image = $(this).data('image');

                    // Set values in the modal inputs (if you have input fields)
                    $('#edit input[name="hall_id"]').val(id);
                    $('#edit input[name="hall_number"]').val(hallNumber);
                    $('#edit input[name="capacity"]').val(capacity);
                    $('#edit img#hall-image-preview').attr('src', image);
                });

                // Delete modal
                $(document).on('click', '.delete-btn', function () {
                    let id = $(this).data('id');
                    $('#delete input[name="hall_id"]').val(id); // Assuming you have a hidden input for it
                });
            </script>
@endsection
