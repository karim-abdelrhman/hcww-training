@extends('layouts.master')

@section('title')
    تعديل بيانات المدرب
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التدريب</h4>
                <a href="{{ route('employee.index') }}"> <span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المدربين</span></a>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/تعديل بيانات المدرب</span>
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
                <form action="{{ route('trainers.update' , $trainer->id) }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    <div class="card-body">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div
                                            class="label heading-info text-center mb-3">
                                            صورة المدرب
                                        </div>
                                        <div class="col-12">
                                            <div class="inline-inputs mb-3">
                                                <label
                                                    class="image-input admin-avatar">
                                                    <input hidden type="file"
                                                           name="image"
                                                           accept="image/*"
                                                           class="img-input @error('image') is-invalid @enderror">
                                                    <img
                                                        src="{{asset('storage/' . $trainer->image)}}"
                                                        class="img-input-preview h-auto"
                                                        style="height: 250px; width: 250px;"
                                                        alt="">
                                                    <div class="overlay-icon">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-edit"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="2"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none"
                                                                  d="M0 0h24v24H0z"
                                                                  fill="none"/>
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                            <path d="M16 5l3 3"/>
                                                        </svg>
                                                    </div>
                                                </label>
                                                @error('image')
                                                <div
                                                    class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="label heading-info text-center mb-3">
                                            صورة البطاقة
                                        </div>
                                        <div class="col-12">
                                            <div class="inline-inputs mb-3">
                                                <label
                                                    class="image-input admin-avatar">
                                                    <input hidden type="file"
                                                           name="id_image"
                                                           accept="image/*"
                                                           class="img-input @error('id_image') is-invalid @enderror">
                                                    <img
                                                        src="{{asset('storage/' . $trainer->id_image)}}"
                                                        class="img-input-preview h-auto"
                                                        style="height: 250px; width: 250px;"
                                                        alt="">
                                                    <div class="overlay-icon">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-edit"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="2"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none"
                                                                  d="M0 0h24v24H0z"
                                                                  fill="none"/>
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                            <path d="M16 5l3 3"/>
                                                        </svg>
                                                    </div>
                                                </label>
                                                @error('id_image')
                                                <div
                                                    class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="label heading-info text-center mb-3">بيانات المدرب</div>
                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <label for="emp_name" class="control-label">اسم المدرب</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{$trainer->name}}" title="يرجي ادخال أسم المدرب"
                                               required>
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="id_number" class="control-label">رقم البطاقة</label>
                                        <input type="text"
                                               class="form-control @error('id_number') is-invalid @enderror"
                                               name="id_number" value="{{$trainer->id_number}}" required>
                                        @error('id_number')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="Email">البريد الالكترونى</label>
                                        <input type="email" name="email" value="{{$trainer->email}}" id="Email"
                                               class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>رقم الموبايل</label>
                                        <input type="number" id="phone" name="phone" value="{{$trainer->phone}}"
                                               class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>العنوان</label>
                                        <input type="text" id="Address" name="address" value="{{$trainer->address}}"
                                               class="form-control @error('address') is-invalid @enderror">
                                        @error('address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="emp_name" class="control-label">المؤهل</label>
                                        <input type="text"
                                               class="form-control @error('qualification') is-invalid @enderror"
                                               name="qualification" value="{{$trainer->qualification}}" required>
                                        @error('qualification')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="Email">درجة علمية</label>
                                        <input type="text" name="degree" value="{{$trainer->degree}}" id="degree"
                                               class="form-control @error('degree') is-invalid @enderror">
                                        @error('degree')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>الجامعة</label>
                                        <input type="text" id="university" name="university"
                                               value="{{$trainer->university}}"
                                               class="form-control @error('university') is-invalid @enderror">
                                        @error('university')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>الوظيفة الحالية</label>
                                        <input type="text" id="position" name="position"
                                               value="{{$trainer->position}}"
                                               class="form-control @error('position') is-invalid @enderror">
                                        @error('position')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="label heading-info text-center mb-3">بيانات الإعتماد</div>
                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <label for="coach_accreditation_number" class="control-label">رقم
                                            المحضر</label>
                                        <input type="text"
                                               class="form-control @error('coach_accreditation_number') is-invalid @enderror"
                                               name="coach_accreditation_number"
                                               value="{{$trainer->coach_accreditation_number}}"
                                               required>
                                        @error('coach_accreditation_number')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="coach_accreditation_date" class="control-label">تاريخ
                                            المحضر</label>
                                        <input type="date"
                                               class="form-control @error('coach_accreditation_date') is-invalid @enderror"
                                               name="coach_accreditation_date"
                                               value="{{ \Carbon\Carbon::parse($trainer->coach_accreditation_date)->format('Y-m-d') }}"
                                               required>
                                        @error('coach_accreditation_date')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="accreditation_type" class="control-label">نوع الإعتماد
                                            بالشركة</label>
                                        <select id="accreditation_type" name="accreditation_type"
                                                class="form-control @error('accreditation_type') is-invalid @enderror">
                                            <option value="" disabled>--اختر نوع الإعتماد--</option>
                                            <option
                                                value="فني" {{$trainer->accreditation_type == 'فني' ? 'selected' : ''}}>
                                                فني
                                            </option>
                                            <option
                                                value="إداري" {{$trainer->accreditation_type == 'إداري' ? 'selected' : ''}}>
                                                إداري
                                            </option>
                                            <option
                                                value="قانوني" {{$trainer->accreditation_type == 'قانوني' ? 'selected' : ''}}>
                                                قانوني
                                            </option>
                                            <option
                                                value="مالي" {{$trainer->accreditation_type == 'مالي' ? 'selected' : ''}}>
                                                مالي
                                            </option>
                                            <option
                                                value="it" {{$trainer->accreditation_type == 'it' ? 'selected' : ''}}>
                                                IT
                                            </option>
                                            <option
                                                value="أخري" {{$trainer->accreditation_type == 'أخري' ? 'selected' : ''}}>
                                                أخري
                                            </option>
                                        </select>
                                        @error('accreditation_type')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="accreditation_category" class="control-label">فئة
                                            الإعتماد</label>
                                        <select id="accreditation_category" name="accreditation_category"
                                                class="form-control @error('accreditation_category') is-invalid @enderror">
                                            <option value="" disabled>--اختر فئة الإعتماد--</option>
                                            <option
                                                value="ماجيستير" {{$trainer->accreditation_category == 'ماجيستير' ? 'selected' : ''}}>
                                                ماجيستير
                                            </option>
                                            <option
                                                value="دكتوراه" {{$trainer->accreditation_category == 'دكتوراه' ? 'selected' : ''}}>
                                                دكتوراه
                                            </option>
                                            <option
                                                value="مستشار متخصص" {{$trainer->accreditation_category == 'مستشار متخصص' ? 'selected' : ''}}>
                                                مستشار متخصص
                                            </option>
                                        </select>
                                        @error('accreditation_category')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="coach_accreditation">محضر إعتماد المدرب</label>
                                                <input id="coach_accreditation" type="file"
                                                       name="coach_accreditation"
                                                       class="dropify form-control @error('coach_accreditation') is-invalid @enderror"
                                                       accept=".pdf"
                                                       data-height="70"/>
                                                @error('coach_accreditation')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-2" style="margin-top: 29px;">
                                                <a href="{{asset('storage/' . $trainer->coach_accreditation)}}"
                                                   target="_blank" class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="job_description">تقييم المدرب</label>
                                                <input type="file" id="interview_evaluation"
                                                       name="interview_evaluation"
                                                       class=" form-control @error('interview_evaluation') is-invalid @enderror"
                                                       accept=".pdf"
                                                       data-height="70"/>
                                                @error('interview_evaluation')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-2" style="margin-top: 29px;">
                                                <a href="{{asset('storage/' . $trainer->interview_evaluation)}}"
                                                   target="_blank" class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="job_description_card">بطاقة الوصف الوظيفي</label>
                                                <input type="file" id="job_description_card"
                                                       name="job_description_card"
                                                       class="dropify form-control @error('job_description_card') is-invalid @enderror"
                                                       accept=".pdf"
                                                       data-height="70"/>
                                                @error('job_description_card')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-2" style="margin-top: 29px;">
                                                <a href="{{asset('storage/' . $trainer->job_description_card)}}"
                                                   target="_blank" class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="job_description">بيان حالة وظيفية
                                                    معتمد</label>
                                                <input type="file" id="employment_status"
                                                       name="employment_status"
                                                       class=" form-control @error('employment_status') is-invalid @enderror"
                                                       accept=".pdf"
                                                       data-height="70"/>
                                                @error('employment_status')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-2" style="margin-top: 29px;">
                                                <a href="{{asset('storage/' . $trainer->employment_status)}}"
                                                   target="_blank" class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="job_description">خطاب
                                                    الإسناد</label>
                                                <input type="file" id="letter_of_attribution"
                                                       name="letter_of_attribution"
                                                       class=" form-control @error('letter_of_attribution') is-invalid @enderror"
                                                       accept=".pdf"
                                                       data-height="70"/>
                                                @error('letter_of_attribution')
                                                <div
                                                    class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-2" style="margin-top: 29px;">
                                                <a href="{{asset('storage/' . $trainer->letter_of_attribution)}}"
                                                   target="_blank" class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="cv">السيرة الذاتية</label>
                                                <input id="cv" type="file" name="cv"
                                                       class="dropify form-control @error('cv') is-invalid @enderror"
                                                       accept=".pdf"
                                                       data-height="70"/>
                                                @error('cv')
                                                <div
                                                    class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-2" style="margin-top: 29px;">
                                                <a href="{{asset('storage/' . $trainer->cv)}}"
                                                   target="_blank" class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="label heading-info text-center mb-3">
                                    شهادات الإعتماد
                                </div>
                                <div class="row mb-3" id="certificates">
                                    @if($trainer->certificates->count() > 0)
                                        @foreach($trainer->certificates as $certificate)
                                            <div
                                                class="col-12 mb-4 @error('accreditation_certificates') is-invalid @enderror"
                                                style="display: flex; justify-content: space-between; gap: 10px; align-items: center;">
                                                <input type="file" class="form-control"
                                                       name="accreditation_certificates[]"
                                                       accept=".pdf">
                                                <a href="{{ asset('storage/' . $certificate->certificate) }}"
                                                   target="_blank"
                                                   class="btn btn-icon btn-outline-info">
                                                    عرض
                                                </a>
                                                <button type="button"
                                                        id="add-new-certificate"
                                                        class="btn btn-primary mr-3">+
                                                </button>

                                                @error('accreditation_certificates')
                                                <div
                                                    class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @else
                                        <div
                                            class="col-12 mb-4 @error('accreditation_certificates') is-invalid @enderror"
                                            style="display: flex; justify-content: space-between; gap: 10px; align-items: center;">
                                            <input type="file" class="form-control"
                                                   name="accreditation_certificates[]" accept=".pdf">
                                            <button type="button" id="add-new-certificate"
                                                    class="btn btn-primary mr-3">+
                                            </button>
                                            @error('accreditation_certificates')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    تعديل البيانات
                                </button>
                            </div>
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
            $('#add-new-certificate').on('click', function (e) {
                e.preventDefault();
                $('#certificates').append(`
                    <div class="col-12 mb-4 certificate-item" id="certificates"
                                         style="display: flex; justify-content: space-between; gap: 10px; align-items: center;">
                                        <input type="file" class="form-control"
                                               name="accreditation_certificates[]" accept=".pdf">

                                        <button type="button" class="btn btn-danger remove-certificate">-</button>
                                    </div>
                `)
            })
            $(document).on('click', '.remove-certificate', function () {
                $(this).closest('.certificate-item').remove()
            })
        })
    </script>
@endpush

