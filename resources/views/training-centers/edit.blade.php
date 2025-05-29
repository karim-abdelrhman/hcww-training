@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
@endsection
@section('title')
    إضافة مركز تدريب
@stop
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    مراكز التدريب</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('training-centers.update' , $trainingCenter->id) }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col-3">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <select name="company_id"
                                        class="form-control @error('company_id') is-invalid @enderror">
                                    @foreach ($companies as $comp)
                                        <option
                                            value="{{ $comp->id }}" {{ $trainingCenter->company_id == $comp->id ? 'selected' : ''}}> {{ $comp->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="code">كود المركز</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{$trainingCenter->code}}">
                                @error('code') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="name"> اسم مركز التدريب</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$trainingCenter->name}}">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="fax"> فاكس </label>
                                <input type="text" class="form-control" id="fax" name="fax" value="{{$trainingCenter->fax}}">
                                <span class="text-danger"></span>
                                @error('fax') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <br>
                        {{--2--}}
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="mag_name"> اسم مدير المركز </label>
                                <input type="text" class="form-control" id="mag_name" name="center_manager_name" value="{{$trainingCenter->center_manager_name}}">
                                @error('center_manager_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="mag_phone">موبايل مدير المركز </label>
                                <input type="tel" class="form-control" id="mag_phone" name="center_manager_phone" value="{{$trainingCenter->center_manager_phone}}"
                                       maxlength="11"
                                       minlength="11">
                                <span class="text-danger"></span>
                                @error('center_manager_phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="phone"> تليفون المركز </label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{$trainingCenter->phone}}" maxlength="11"
                                       minlength="11">
                                <span class="text-danger"></span>
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="email">البريد الالكتروني </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$trainingCenter->email}}">
                                <span class="text-danger"></span>
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                        </div>
                        <div class="row">


                            <div class="form-group col-6">
                                <label for="gm_name">اسم مدير عام تدريب</label>
                                <input type="text" name="general_manager_name" value="{{$trainingCenter->general_manager_name}}" id="gm_name" class="form-control">
                                <span class="text-danger"></span>
                                @error('general_manager_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="gm_phone">موبايل مدير عام التدريب </label>
                                <input type="tel" class="form-control" id="gm_phone" name="general_manager_phone" value="{{$trainingCenter->general_manager_phone}}"
                                       maxlength="11"
                                       minlength="11">
                                <span class="text-danger"></span>
                                @error('general_manager_phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="sh_name">اسم رئيس قطاع الموارد البشرية</label>
                                <input type="text" name="hr_name" value="{{$trainingCenter->hr_name}}"  class="form-control">
                                @error('hr_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="sh_phone"> تليفون رئيس قطاع الموارد البشرية </label>
                                <input type="tel" class="form-control" id="sh_phone" name="hr_phone" value="{{$trainingCenter->hr_phone}}" maxlength="11"
                                       minlength="11">
                                <span class="text-danger"></span>
                                @error('hr_phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="address">العنوان</label>
                                <input class="form-control" id="address" name="address" value="{{$trainingCenter->address}}">
                                <span class="text-danger"></span>
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="address">المركز علي الخريطه [ iframe ]</label>
                                <input class="form-control" id="location" name="location" value="{{$trainingCenter->location}}">
                                <span class="text-danger"></span>
                                @error('location') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">صورة المركز</label>
                                <div class="inline-inputs mb-3">
                                    <label class="image-input admin-avatar">
                                        <input hidden type="file" name="image" accept="image/*" class="img-input">
                                        <img src="{{asset('storage/' . $trainingCenter->image)}}"
                                             class="img-input-preview h-auto" style="height: 250px; width: 250px;"
                                             alt="">
                                        <div class="overlay-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                <path d="M16 5l3 3"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

@endsection
