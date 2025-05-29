@extends('layouts.master')

@section('title')
    مركز تدريب
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

    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">مركز تدريب</h1>
                            <div class="billed-from">
                                <h6>{{$trainingCenter->name}}</h6>
                                <p>{{$trainingCenter->company->name}}<br>
                                    {{$trainingCenter->code}}<br>
                                    {{$trainingCenter->fax}}</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">بيانات المركز</label>
                                <p class="invoice-info-row"><span>اسم مدير المركز</span>
                                    <span>{{$trainingCenter->center_manager_name}}</span></p>
                                <p class="invoice-info-row"><span>تليفون مدير المركز</span>
                                    <span>{{$trainingCenter->center_manager_phone}}</span></p>
                                <p class="invoice-info-row"><span>تليفون المركز</span>
                                    <span>{{$trainingCenter->phone}}</span></p>
                                <p class="invoice-info-row"><span>البريد الإلكتروني</span>
                                    <span>{{$trainingCenter->email}}</span></p>
                                <p class="invoice-info-row"><span>العنوان</span>
                                    <span>{{$trainingCenter->address}}</span></p>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات عامة</label>
                                <p class="invoice-info-row"><span>اسم مدير عام التدريب</span>
                                    <span>{{$trainingCenter->general_manager_name}}</span></p>
                                <p class="invoice-info-row"><span>تليفون مدير عام التدريب</span>
                                    <span>{{$trainingCenter->general_manager_phone}}</span></p>
                                <p class="invoice-info-row"><span>اسم رئيس قطاع الموارد البشرية</span>
                                    <span>{{$trainingCenter->hr_name}}</span></p>
                                <p class="invoice-info-row"><span>تليفون رئيس قطاع الموارد البشرية</span>
                                    <span>{{$trainingCenter->hr_phone}}</span></p>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">صورة المركز</div>
                                    <div class="card-body">
                                        <a href="{{ asset('storage/' . $trainingCenter->image) }}" target="_blank">
                                            <img src="{{asset('storage/' . $trainingCenter->image)}}"
                                                 alt="Image Description" width="300px" height="200">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">المكان علي الخريطه</div>
                                    <div class="card-body">
                                        {!! $trainingCenter->location !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
