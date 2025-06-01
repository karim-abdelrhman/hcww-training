@extends('layouts.master')

@section('title')
    اضافة برنامج تدريبي
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">البرامج التدريبية</h4>
                <a href="{{ route('employee.index') }}"> <span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة البرامج</span></a>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/اضافة برنامج تدريبي</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('training-programs.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="control-label">اسم البرنامج</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{old('name')}}"
                                       title="يرجي ادخال أسم البرنامج " required>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="description" class="control-label">وصف البرنامج</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description"></textarea>

                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title">وحدات البرنامج</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="row " id="payment_plans">
                                            <div class="col-12 mb-4" style="display: flex; justify-content: space-between">
                                                <input type="text" class="form-control" name="unit_names[]" style="width: 45%" placeholder="اسم الوحدة">
                                                <input type="file" class="form-control" name="contents[]" style="width: 45%">
                                                <button type="button" id="add-payment-plan" class="btn btn-primary">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            <a href="" class="btn btn-link link-secondary">رجوع</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#add-payment-plan').on('click', function (e) {
                e.preventDefault();
                $('#payment_plans').append(`
                <div class="col-12 mb-4 payment-type-item" style="display: flex; justify-content: space-between">
                    <input type="text" class="form-control" name="unit_names[]" style="width: 45%" placeholder="اسم الوحدة">
                    <input type="file" class="form-control" name="contents[]" style="width: 45%">
                    <button type="button" class="btn btn-danger remove-payment-plan">-</button>
                </div>
            `)
            })

            $(document).on('click', '.remove-payment-plan', function () {
                $(this).closest('.payment-type-item').remove()
            })
        })
    </script>
@endpush

