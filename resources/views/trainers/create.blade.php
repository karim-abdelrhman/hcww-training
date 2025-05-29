@extends('layouts.master')

@section('title')
    اضافة مدرب
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التدريب</h4>
                <a href="{{ route('employee.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المدربين</span></a>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/اضافة مدرب</span>
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
                <div class="card-body">
                    <form action="{{ route('trainers.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="emp_name" class="control-label">اسم المدرب</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" title="يرجي ادخال أسم المدرب" required>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label for="id_number" class="control-label">رقم البطاقة</label>
                                <input type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{old('id_number')}}" required>
                                @error('id_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label for="Email">البريد الالكترونى</label>
                                <input type="email" name="email" value="{{old('email')}}" id="Email"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label>العنوان</label>
                                <input type="text" id="Address" name="address" value="{{old('address')}}"
                                       class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label>رقم الموبايل</label>
                                <input type="text" id="phone" name="phone" value="{{old('phone')}}"
                                       class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="emp_name" class="control-label">المؤهل</label>
                                <input type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{old('qualification')}}" required>
                                @error('qualification')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="Email">درجة علمية</label>
                                <input type="text" name="degree" value="{{old('degree')}}" id="degree"
                                       class="form-control @error('degree') is-invalid @enderror">
                                @error('degree')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label>الجامعة</label>
                                <input type="text" id="university" name="university" value="{{old('university')}}"
                                       class="form-control @error('university') is-invalid @enderror">
                                @error('university')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label>الوظيفة الحالية</label>
                                <input type="text" id="position" name="position" value="{{old('position')}}"
                                       class="form-control @error('position') is-invalid @enderror">
                                @error('position')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="coach_accreditation">محضر إعتماد المدرب</label>
                                <input id="coach_accreditation" type="file" name="coach_accreditation" class="dropify @error('coach_accreditation') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('coach_accreditation')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label for="coach_accreditation_number" class="control-label">رقم المحضر</label>
                                <input type="text" class="form-control @error('coach_accreditation_number') is-invalid @enderror" name="coach_accreditation_number" value="{{old('coach_accreditation_number')}}" required>
                                @error('coach_accreditation_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="coach_accreditation_date" class="control-label">تاريخ المحضر</label>
                                <input type="date" class="form-control @error('coach_accreditation_date') is-invalid @enderror" name="coach_accreditation_date" value="{{old('coach_accreditation_date')}}" required>
                                @error('coach_accreditation_date')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label for="accreditation_type" class="control-label">نوع الإعتماد بالشركة</label>
                                <select id="accreditation_type" name="accreditation_type"
                                        class="form-control @error('accreditation_type') is-invalid @enderror">
                                    <option value="" disabled>--اختر نوع الإعتماد--</option>
                                    <option value="فني">فني</option>
                                    <option value="إداري">إداري</option>
                                    <option value="قانوني">قانوني</option>
                                    <option value="مالي">مالي</option>
                                    <option value="IT">IT</option>
                                    <option value="أخري">أخري</option>
                                </select>
                                @error('accreditation_type')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label for="accreditation_category" class="control-label">فئة الإعتماد</label>
                                <select id="accreditation_category" name="accreditation_category"
                                        class="form-control @error('accreditation_category') is-invalid @enderror">
                                    <option value="" disabled>--اختر فئة الإعتماد--</option>
                                    <option value="ماجيستير">ماجيستير</option>
                                    <option value="دكتوراه">دكتوراه</option>
                                    <option value="مستشار متخصص">مستشار متخصص</option>
                                </select>
                                @error('accreditation_category')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="form-label">صورة الموظف</label>
                                <div class="inline-inputs mb-3">
                                    <label class="image-input admin-avatar">
                                        <input hidden type="file" name="image" accept="image/*" class="img-input">
                                        <img src="{{asset('')}}assets/img/image-placeholder.png"
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
                            <div class="col-3">
                                <label for="cv">السيرة الذاتية</label>
                                <input id="cv" type="file" name="cv" class="dropify @error('cv') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('cv')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="job_description_card">بطاقة الوصف الوظيفي</label>
                                <input type="file" id="job_description_card" name="job_description_card"
                                       class="dropify @error('job_description_card') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('job_description_card')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="job_description">بيان حالة وظيفية معتمد</label>
                                <input type="file" id="employment_status" name="employment_status"
                                       class="dropify @error('employment_status') is-invalid @enderror"
                                       accept=".pdf"
                                       data-height="70"/>
                                @error('employment_status')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

