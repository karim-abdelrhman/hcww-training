@extends('layouts.master')
@section('title')
    المدربين
@stop
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المدربين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مدرب خارجي</span>
            </div>
        </div>
        {{--        <div class="d-flex my-xl-auto right-content">--}}
        {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
        {{--                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>--}}
        {{--            </div>--}}
        {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
        {{--                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>--}}
        {{--            </div>--}}
        {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
        {{--                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>--}}
        {{--            </div>--}}
        {{--            <div class="mb-3 mb-xl-0">--}}
        {{--                <div class="btn-group dropdown">--}}
        {{--                    <button type="button" class="btn btn-primary">14 Aug 2019</button>--}}
        {{--                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
        {{--                        <span class="sr-only">Toggle Dropdown</span>--}}
        {{--                    </button>--}}
        {{--                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">--}}
        {{--                        <a class="dropdown-item" href="#">2015</a>--}}
        {{--                        <a class="dropdown-item" href="#">2016</a>--}}
        {{--                        <a class="dropdown-item" href="#">2017</a>--}}
        {{--                        <a class="dropdown-item" href="#">2018</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <label class="label" for="image">الصورة الشخصية</label>
                                <a href="{{asset('storage/' . $trainer->image)}}" target="_blank">
                                    <img id="image" alt="" src="{{URL::asset('storage/' . $trainer->image)}}"><a
                                        class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                </a>
                            </div>
                            <div class="main-img-user profile-user" style="margin-right: 200px;">
                                <label class="label" for="id_image">صورة البطاقة</label>
                                <a href="{{asset('storage/' . $trainer->id_image)}}" target="_blank">
                                    <img alt="" id="id_image" src="{{URL::asset('storage/' . $trainer->id_image)}}"><a
                                        class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between mg-b-20" style="margin-top: 25px;">
                                <div>
                                    <h5 class="main-profile-name">{{$trainer->name}}</h5>
                                    <p class="main-profile-name-text">{{$trainer->position}}</p>
                                </div>
                            </div>
                            <h6>نبذة عن المدرب</h6>
                            <div class="main-profile-bio">
                                pleasure rationally encounter but because pursue consequences that are extremely
                                painful.occur in which toil and pain can procure him some great pleasure..
                            </div><!-- main-profile-bio -->
                            <hr class="mg-y-30">
                            <label class="main-content-label tx-13 mg-b-20">Social</label>
                            <div class="main-profile-social-list">
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-facebook"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Facebook</span> <a href="">facebook.com/test.me</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-success-transparent text-success">
                                        <i class="icon ion-logo-twitter"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Twitter</span> <a href="">twitter.com/test.me</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-linkedin"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Linkedin</span> <a href="">linkedin.com/in/test</a>
                                    </div>
                                </div>

                            </div>
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row row-sm">
                <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="counter-status d-flex md-mb-0">
                                <div class="counter-icon bg-primary-transparent">
                                    <i class="icon-layers text-primary"></i>
                                </div>
                                <div class="mr-auto">
                                    <h5 class="tx-13">الدورات التدريبة</h5>
                                    <h2 class="tx-22 mb-1 mt-1">1,587</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="counter-status d-flex md-mb-0">
                                <div class="counter-icon bg-danger-transparent">
                                    <i class="icon-paypal text-danger"></i>
                                </div>
                                <div class="mr-auto">
                                    <h5 class="tx-13">الكورسات</h5>
                                    <h2 class="mb-0 tx-22 mt-1">46,782</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="counter-status d-flex md-mb-0">
                                <div class="counter-icon bg-success-transparent">
                                    <i class="icon-rocket text-success"></i>
                                </div>
                                <div class="mr-auto">
                                    <h5 class="tx-13">المواد التدريبية</h5>
                                    <h2 class=" tx-22 mb-1 mt-1">1,890</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i
                                            class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">عن المدرب</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#personal_info" data-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i
                                            class="las la-cog tx-16 mr-1"></i></span> <span
                                        class="hidden-xs">بيانات المدرب</span> </a>
                            </li>
                            <li class="">
                                <a href="#certificates" data-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i
                                            class="las la-images tx-15 mr-1"></i></span> <span
                                        class="hidden-xs">بيانات الإعتماد</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="home">
                            <h4 class="tx-15 text-uppercase mb-3">نبذة عن المدرب</h4>
                            <p class="m-b-5">Hi I'm Petey Cruiser,has been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of type. Donec pede justo, fringilla
                                vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a,
                                venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer
                                tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                                Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <div class="m-t-30">
                                <h4 class="tx-15 text-uppercase mt-3">الوظيفة الحالية</h4>
                                <div class=" p-t-10">
                                    <h5 class="text-primary m-b-5 tx-14">{{$trainer->position}}</h5>
                                    <p class="">websitename.com</p>
                                    {{--                                    <p><b>2010-2015</b></p>--}}
                                    {{--                                    <p class="text-muted tx-13 m-b-0">Lorem Ipsum is simply dummy text of the printing--}}
                                    {{--                                        and typesetting industry. Lorem Ipsum has been the industry's standard dummy--}}
                                    {{--                                        text ever since the 1500s, when an unknown printer took a galley of type and--}}
                                    {{--                                        scrambled it to make a type specimen book.</p>--}}
                                </div>
                                <hr>
                                {{--                                <div class="">--}}
                                {{--                                    <h5 class="text-primary m-b-5 tx-14">Senior Graphic Designer</h5>--}}
                                {{--                                    <p class="">coderthemes.com</p>--}}
                                {{--                                    <p><b>2007-2009</b></p>--}}
                                {{--                                    <p class="text-muted tx-13 mb-0">Lorem Ipsum is simply dummy text of the printing--}}
                                {{--                                        and typesetting industry. Lorem Ipsum has been the industry's standard dummy--}}
                                {{--                                        text ever since the 1500s, when an unknown printer took a galley of type and--}}
                                {{--                                        scrambled it to make a type specimen book.</p>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <div class="tab-pane" id="personal_info">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="FullName">الإسم</label>
                                    <input type="text" value="{{$trainer->name}}" id="FullName" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Email">البريد الإلكتروني</label>
                                    <input type="email" value="{{$trainer->email}}" id="Email" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Username">رقم الهاتف</label>
                                    <input type="text" value="{{$trainer->phone}}" id="Username" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Username">رقم البطاقة</label>
                                    <input type="text" value="{{$trainer->id_number}}" id="Username"
                                           class="form-control" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Username">العنوان</label>
                                    <input type="text" value="{{$trainer->address}}" id="Username" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Username">المؤهل</label>
                                    <input type="text" value="{{$trainer->qualification}}" id="Username"
                                           class="form-control" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Username">درجة علمية</label>
                                    <input type="text" value="{{$trainer->degree}}" id="Username" class="form-control"
                                           readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="Username">الجامعة</label>
                                    <input type="text" value="{{$trainer->university}}" id="Username"
                                           class="form-control" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Username">الوظيفة الحالية</label>
                                    <input type="text" value="{{$trainer->position}}" id="Username" class="form-control"
                                           readonly>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="certificates">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th>الإسم</th>
                                                        <th>العملبات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($trainer->certificates as $certificate)
                                                        <tr>
                                                            <td>شهادة اعتماد</td>
                                                            <td><a href="{{asset('storage/' . $certificate->certificate)}}"
                                                                   target="_blank"
                                                                   class="btn btn-icon btn-outline-info">
                                                                    عرض
                                                                </a></td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- bd -->
                                        </div><!-- bd -->
                                    </div><!-- bd -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')
            <script>
                $(document).ready(function () {
                    $('ul.nav-tabs li').click(function () {
                        $('ul.nav-tabs li').removeClass('active'); // remove active from all
                        $(this).addClass('active'); // add active to clicked one
                    });
                });
            </script>
@endsection
