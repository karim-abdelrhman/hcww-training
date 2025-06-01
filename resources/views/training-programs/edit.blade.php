@extends('layouts.master')

@section('title')
    تعديب برنامج تدريبي
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">البرامج التدريبية</h4>
                <a href="{{ route('employee.index') }}"> <span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة البرامج</span></a>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/تعديل برنامج تدريبي</span>
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
                <form action="{{ route('training-programs.update' , $program->id) }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    <div class="card-body">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="control-label">اسم البرنامج</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{$program->name}}"
                                       title="يرجي ادخال أسم البرنامج " required>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="description" class="control-label">وصف البرنامج</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description">{{$program->description}}</textarea>
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
                                        <div id="payment_plans">
                                            @if($program->units()->count() > 0)
                                                @foreach ($program->units as $unit)
                                                    <div class="row payment-plan-row">
                                                        <div class="col-12 mb-4"
                                                             style="display: flex; justify-content: space-between">
                                                            <input type="text" class="form-control" name="unit_names[]" value="{{$unit->name}}" style="width: 45%" placeholder="اسم الوحدة">
                                                            <input type="file" class="form-control" name="contents[]" value="{{$unit->program}}" style="width: 45%">
                                                            <a href="{{asset('storage/' . $unit->content)}}"
                                                               class="btn btn-success" target="_blank">عرض</a>
                                                            <button type="button"
                                                                    class="btn btn-primary add-payment-plan">
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row payment-plan-row">
                                                    <div class="col-12 mb-4"
                                                         style="display: flex; justify-content: space-between">
                                                        <input type="text" class="form-control" name="unit_names[]" style="width: 45%" placeholder="اسم الوحدة">
                                                        <input type="file" class="form-control" name="contents[]" style="width: 45%">
                                                        <button type="button"
                                                                class="btn btn-primary add-payment-plan">
                                                            +
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
{{--                                        <div class="row " id="payment_plans">--}}
{{--                                            <div class="col-12 mb-4" style="display: flex; justify-content: space-between">--}}
{{--                                                <input type="text" class="form-control" min="0" name="unit_names[]" style="width: 45%" placeholder="اسم الوحدة">--}}
{{--                                                <input type="file" class="form-control" min="0" name="contents[]" style="width: 45%">--}}
{{--                                                <button type="button" id="add-payment-plan" class="btn btn-primary">+--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
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
        $(document).ready(function () {
            // Function to add a new payment plan row
            function addPaymentPlanRow() {
                return `
                <div class="row payment-plan-row">
                    <div class="col-12 mb-4" style="display: flex; justify-content: space-between">
                        <input type="text" class="form-control" name="unit_names[]" style="width: 45%" placeholder="اسم الوحدة">
                    <input type="file" class="form-control" name="contents[]" style="width: 45%">
                    <button type="button" class="btn btn-danger remove-payment-plan">-</button>
                    </div>
                </div>
            `;
            }

            // Add a new payment plan row when clicking any "+" button
            $(document).on('click', '.add-payment-plan', function (e) {
                e.preventDefault();
                $('#payment_plans').append(addPaymentPlanRow());
            });

            // Remove a payment plan row when clicking any "-" button
            $(document).on('click', '.remove-payment-plan', function () {
                $(this).closest('.payment-plan-row').remove();
            });
        });

    </script>
@endpush

