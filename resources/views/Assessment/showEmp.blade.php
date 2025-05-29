@extends('layouts.master')
@section('title')
    التقييم
@endsection
@section('css')
/*<!--Internal Data table css -->*/
    <link href=" {{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet" />
    <link href=" {{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }} " rel="stylesheet">
    <link href=" {{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }} " rel="stylesheet" />
<link href=" {{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }} " rel="stylesheet"/>
<link href=" {{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }} " rel="stylesheet"/>
<link href=" {{ URL::asset('assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="{{route('dashboard')}}">الدورات التدريبية</a></h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/اللجان</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">اللجان التى يتم تقييم المتدربين بها</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">كود الموظف</th>
                                <th class="border-bottom-0">اسم الموظف</th>
                                <th class="border-bottom-0">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($prEmps as $x)
                                    <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td> {{ $x -> emp_code}} </td>
                                    <td>{{ $x -> emp_name }} </td>
                                    <td>
                                        <a class="btn btn-success btn-sm "
                                            data-id="{{ $x -> emp_id }}"
                                            data-comm_id="{{ $x -> comm_id }}"
                                            data-name="{{ $x -> emp_name }}"
                                            data-code="{{ $x -> emp_code }}"
                                            data-toggle="modal"
                                            data-target="#select3modal">التقييم مدرب</a>
                                        <a class="btn btn-success btn-sm "
                                            data-empid="{{ $x -> emp_id }}"
                                            data-com_id="{{ $x -> comm_id }}"
                                            data-a_name="{{ $x -> emp_name }}"
                                            data-a_code="{{ $x -> emp_code }}"
                                            data-toggle="modal"
                                            data-target="#select4modal">التقييم مدير</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    {{--add Ass مدرب--}}
    <div class="modal fade" id="select3modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة تقييم المدرب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Assessment.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" id="Ms_Id" name="Emp_Id" value="" class="form-control">
                            <input type="hidden" id="Comm_Id" name="Comm_Id" value="" class="form-control">
                        </div>
                        <div class="form-group control-group row">
                            <div class="col">
                                <label for="Ms_Code" class="control-label">كود الموظف</label>
                                <input id="Ms_Code" name="Ms_Code" class="form-control" type="text" value="">
                            </div>
                            <div class="col">
                                <label for="Ms_Name" class="control-label">اسم الموظف</label>
                                <input id="Ms_Name" name="Ms_Name" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>التواصل مع الاخرين</td>
                                <td>أ) اخبرنى متى وجدت أنه من الصعب بناء علاقة عمل فعالة مع عميل او زميل ما.</td>
                                <td>* يقيم علاقات طيبة مع العملاء والعاملين. </td>
                                <td><input type="text" class="numb" name="Comm1" id="Comm1" value="0"  onblur="mySumComm()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) إذكر موقف تطلب منك بناء شبكة من علاقات الاعمال والحفاظ عليها.</td>
                                <td>* ينشئ شبكات واسعة وفعالة من العلاقات داخل وخارج المؤسسة. </td>
                                <td><input type="text" class="numb" name="Comm2" id="Comm2" value="0"  onblur="mySumComm()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) هل يمكن ان تتذكر متى طلب منك بناء علاقة مع اكثر من فرد من كبار الموظفين داخل شركتك؟ </td>
                                <td>* يتواصل بنجاح مع الافراد على مختلف مستوياتهم. </td>
                                <td><input type="text" class="numb" name="Comm3" id="Comm3" value="0"  onblur="mySumComm()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يسيطر على الاختلاف بين الافراد. </td>
                                <td><input type="text" class="numb" name="Comm4" id="Comm4" value="0"  onblur="mySumComm()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                             <tr>
                                <td></td>
                                <td></td>
                                 <td>* يستطيع ان يتحكم فى انفعلاته. </td>
                                 <td><input type="text" class="numb" name="Comm5" id="Comm5" value="0"  onblur="mySumComm()" />
                                     <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                 </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يستطيع ان يروج للافكار النابعة منه ومن الاخرين. </td>
                                <td><input type="text" class="numb" name="Comm6" id="Comm6" value="0"  onblur="mySumComm()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Comm_Avg" class="control-label"> متوسط الدرجة للتواصل والتعامل مع الاخرين</label>
                            <input type="text" id="Comm_Avg" name="Comm_Avg" value="0"  class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Comm_comm" name="Comm_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>اتخاذ القرار وبدء النشاط</td>
                                <td>أ) اخبرنى متى قمت بإدارة مجموعه من الافراد لتحقيق نتائج على جانب من الاهمية.</td>
                                <td>* يتخذ قرارات فورية واضحة والتى قد تتضمن اختيارات صعبة او عوامل مجازفة. </td>
                                <td><input type="text" class="numb" name="Dma1" id="Dma1" value="0" onblur="mySumDma()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) إذكر مثالا عن شئ قمت بة لتبرز افضل ما فى شخص اخر.</td>
                                <td>* يتحمل مسئولية الانشطة والمشروعات والافراد. </td>
                                <td><input type="text" class="numb" name="Dma2" id="Dma2" value="0" onblur="mySumDma()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) صف موقف تطلب منك تفويض عمل هام لاشخاص اخرين.  </td>
                                <td>* يقوم بالمبادره ويتصرف بثقة ويعمل بتوجيه ذاتى. </td>
                                <td><input type="text" class="numb" name="Dma3" id="Dma3" value="0" onblur="mySumDma()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يبادر وينشئ الانشطه. </td>
                                <td><input type="text" class="numb" name="Dma4" id="Dma4" value="0" onblur="mySumDma()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يصدر أحكام واقعيه من تحليل البيانات والمعلومات لحل المشكلة. </td>
                                <td><input type="text" class="numb" name="Dma5" id="Dma5" value="0" onblur="mySumDma()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Dma_Avg" class="control-label"> متوسط الدرجة اتخاذ القرار وبدء النشاط</label>
                            <input type="text" id="Dma_Avg" name="Dma_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Dma_comm" name="Dma_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>صياغة الاستراتيجيات والمفاهيم</td>
                                <td>أ) اخبرنى عن قرار او خطهقمت بها وكان لها تأثير كبير على الوظائف او الادارات الاخرى داخل شركتك.</td>
                                <td>* تفعيل الخطط الاساسية لتحقيق اهداف المؤسسة. </td>
                                <td><input type="text" class="numb" name="Fsc1" id="Fsc1" value="0" onblur="mySumFsc()" /><span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) الى اى مدى يسمح لك دورك الحالى (او السابق) بالعمل الاستراتيجى.</td>
                                <td>* وضع وتطوير الخطط الاساسية. </td>
                                <td><input type="text" class="numb" name="Fsc2" id="Fsc2" value="0" onblur="mySumFsc()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) صف لى كيف تنسيق بين مشروع ما وبين اهدافة الاستراتيجية.  </td>
                                <td>* تعريف وتطوير الرؤي الايجابيه الحاكمة للافكار المستقبلية للمؤسسة. </td>
                                <td><input type="text" class="numb" name="Fsc3" id="Fsc3" value="0" onblur="mySumFsc()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يتعرف على مجموعة واسعه من الظروف المتعارضة والمتعلقة بالمؤسسة. </td>
                                <td><input type="text" class="numb" name="Fsc4" id="Fsc4" value="0" onblur="mySumFsc()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يؤكد فهمه الى كيف يمكن لموضوع واحد ان يكون جزء من منظومة كبيرة . </td>
                                <td><input type="text" class="numb" name="Fsc5" id="Fsc5" value="0" onblur="mySumFsc()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Fsc_Avg" class="control-label"> متوسط الدرجة صياغة الاستراتيجيات والمفاهيم</label>
                            <input type="text" id="Fsc_Avg" name="Fsc_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Fsc_comm" name="Fsc_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>القيادة والاشراف وتوجيه الافراد</td>
                                <td>أ) أخبرنى متى قمت بإدارة مجموعة من الافراد لتحقيق نتائج على جانب من الاهمية.</td>
                                <td>* تفعيل الخطط الاساسية لتحقيق اهداف المؤسسة. </td>
                                <td><input type="text" class="numb" name="Lsg1" id="Lsg1" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) الى اى مدى يسمح لك دورك الحالى (او السابق) بالعمل الاستراتيجى.</td>
                                <td>* وضع وتطوير الخطط الاساسية. </td>
                                <td><input type="text" class="numb" name="Lsg2" id="Lsg2" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) صف لى كيف تنسيق بين مشروع ما وبين اهدافة الاستراتيجية.  </td>
                                <td>* تعريف وتطوير الرؤي الايجابيه الحاكمة للافكار المستقبلية للمؤسسة. </td>
                                <td><input type="text" class="numb" name="Lsg3" id="Lsg3" value="0" onblur="mySumLsg()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يتعرف على مجموعة واسعه من الظروف المتعارضة والمتعلقة بالمؤسسة. </td>
                                <td><input type="text" class="numb" name="Lsg4" id="Lsg4" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يؤكد فهمه الى كيف يمكن لموضوع واحد ان يكون جزء من منظومة كبيرة . </td>
                                <td><input type="text" class="numb" name="Lsg5" id="Lsg5" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Lsg_Avg" class="control-label"> متوسط الدرجة القيادة والاشراف وتوجيه الافراد</label>
                            <input type="text" id="Lsg_Avg" name="Lsg_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Lsg_comm" name="Lsg_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>التعلم والبحث </td>
                                <td>أ) أخبرنى متى كان عليك أن تتعلم تقنية او مهمة جديدة وبسرعة .</td>
                                <td>* سريع التعلم للاشغال الجديده ويحفظ المعلومات بسرعة فى ذاكرته. </td>
                                <td><input type="text" class="numb" name="Lr1" id="Lr1" value="0"  onblur="mySumLr()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) الى اى مدى يسمح لك دورك الحالى (او السابق) بالعمل الاستراتيجى.</td>
                                <td>* يحتفظ بمجموعة شاملة من المعلومات لدعم ما يتخذه من قرارات تؤكد سرعة ادراكه للمعلومات الجديده. </td>
                                <td><input type="text" class="numb" name="Lr2" id="Lr2" value="0"  onblur="mySumLr()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) متى تعلمت من الملاحظات؟(على سبيل المثال من زملائك ام من عملائك).  </td>
                                <td>* يشجع التعلم من خلال الخبرات الادارية(مثلا : التعلم من حالات النجاح الفشل ويسترشد بتجارب القوى العاملة و العملاء) - إجادة إدارة المعلومات (يجمع ويصنف وينشر المعلومات ذات الفائدة للمؤسسة) . </td>
                                <td><input type="text" class="numb" name="Lr3" id="Lr3" value="0"  onblur="mySumLr()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Lr_Avg" class="control-label"> متوسط الدرجة التعلم والبحث </label>
                            <input type="text" id="Lr_Avg" name="Lr_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Lr_comm" name="Lr_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>السعى إلى تحقيق الاهداف </td>
                                <td></td>
                                <td>* تحقيق نتائج مذهله. </td>
                                <td><input type="text" class="numb" name="Sag1" id="Sag1" value="0" onblur="mySumSag()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* التصرف بعزيمة . </td>
                                <td><input type="text" class="numb" name="Sag2" id="Sag2" value="0" onblur="mySumSag()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* المثابرة خلال الصعوبات . </td>
                                <td><input type="text" class="numb" name="Sag3" id="Sag3" value="0" onblur="mySumSag()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Sag_Avg" class="control-label"> متوسط الدرجة التعلم والبحث </label>
                            <input type="text" id="Sag_Avg" name="Sag_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Sag_comm" onblur="Percent()" name="Sag_comm" rows="6"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="NCom" class="control-label">عدد الكفاءات التى تم تقيمها </label>
                                <input type="text" id="NCom" name="NCom" value="6" class="form-control" onblur="Percent()" readonly>
                            </div>
                            <div class="col">
                                <label for="NCom_Avg" class="control-label"> متوسط الدرجات للكفاءات </label>
                                <input type="text" id="NCom_Avg" name="NCom_Avg" value="0" onblur="Percent()" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label for="Percentage" class="control-label"> النسبة المئوية لدرجات للكفاءات </label>
                                <input type="text"  id="Percentage" name="Percentage" value="0" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--      EndAdd--}}
    {{--add Ass مدير--}}
    <div class="modal fade" id="select4modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة تقييم المدير المباشر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Assessment.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" id="Ms_Id" name="Emp_Id" value="" class="form-control">
                            <input type="hidden" id="Comm_Id" name="Comm_Id" value="" class="form-control">
                        </div>
                        <div class="form-group control-group row">
                            <div class="col">
                                <label for="Ms_Code" class="control-label">كود الموظف</label>
                                <input id="Ms_Code" name="Ms_Code" class="form-control" type="text" value="">
                            </div>
                            <div class="col">
                                <label for="Ms_Name" class="control-label">اسم الموظف</label>
                                <input id="Ms_Name" name="Ms_Name" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>أهم نقاط القوه لدى المرؤوس قيد التقييم</label>
                            <textarea class="form-control" id="Dma_comm" name="Dma_comm" rows="6"></textarea>
                        </div>
                       <div class="form-group">
                            <label>أهم نقاط الضعف او فرص التحسن لدى المرؤوس قيد التقييم</label>
                            <textarea class="form-control" id="Dma_comm" name="Dma_comm" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>حدد الدورات التدريبية التى يحتاجها المرؤوس قيد التقييم لتطوير قدراته ومهاراته؟</label>
                            <textarea class="form-control" id="Dma_comm" name="Dma_comm" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>أهم الانجازات التى قدمها المرؤوس قيد التقييم</label>
                            <textarea class="form-control" id="Dma_comm" name="Dma_comm" rows="6"></textarea>
                        </div>

                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <p>ثانيا: تقييم الجدارات (ضع الدرجة من 1 الى 5)</p>
                            <p> <span>الدرجة1: لا يقوم بأى من السلوكيات   </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>الدرجة2: يقوم نادرا ببعض تلك السلوكيات الوارده   </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>الدرجة3: يقوم احيانا ببعض تلك السلوك الوارده   </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>الدرجة4: فى كثير من موافق العمل يقوم بتلك السلوكيات الواردة   </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>الدرجة5: يقوم بتلك السلوكيات الواردة دائما فى مواقف العمل اليومية   </span>
                            </p>
                            <thead>
                            <tr class="text-dark">
                                <th>#</th>
                                <th>#</th>
                                <th>عناصر التقييم</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td >1 المبادرة وا تخاذ القرار</td>
                                <td >1 </td>
                                <td >يتحمل مسئولية الانشطة والافراد والمهام التى تسند له</td>
                                <td style="border: 1px solid"><input type="text" class="numb" name="summg1" id="summg1" value="0"  onblur="mySumMg1()" /></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>2 </td>
                                <td>يبادر ويتصرف بثقه ويعمل بتوجيه ذاتى</td>
                                <td style="border: 1px solid"><input type="text" class="numb" name="summg2" id="summg2" value="0"  onblur="mySumMg1()"/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>3</td>
                                <td>يصدر أحكام واقعية من تحليل البيانات والمعلومات لحل المشكلات </td>
                                <td style="border: 1px solid"><input type="text" class="numb" name="summg3" id="summg3" value="0"  onblur="mySumMg1()"/>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>4</td>
                                <td>يتخذ قرارات فورية واضحة يمكن أن تتضمن إختيارت صعبة ومخاطر حسسوبة </td>
                                <td style="border: 1px solid"><input type="text" class="numb" name="summg4" id="summg4" value="0"  onblur="mySumMg1()"/></td>
                            </tr>
                             <tr>
                                <td></td>
                                <td>5</td>
                                 <td>لديه القدرة على حل المشاكل و اتخاذ القرارات المناسبة </td>
                                 <td style="border: 1px solid"><input type="text" class="numb" name="summg5" id="summg5" value="0"  onblur="mySumMg1()"/></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Comm_Avg" class="control-label"> إجمالى الدرجة للمبادرة وا تخاذ القرار</label>
                            <input type="text" id="mg1_Sum" name="mg1_Sum" value="0"  class="form-control" onblur="mySumNmg1()" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Comm_Avg" class="control-label"> متوسط الدرجة للمبادرة وا تخاذ القرار</label>
                            <input type="text" id="mg1_Avg" name="mg1_Avg" value="0"  class="form-control" onblur="mySumNmg1()" readonly>
                        </div>
                        <thead>
                        <tr class="text-dark">
                            <th>#</th>
                            <th>#</th>
                            <th>عناصر التقييم</th>
                            <th>الدرجه</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >1 المبادرة وا تخاذ القرار</td>
                            <td >1 </td>
                            <td >يتحمل مسئولية الانشطة والافراد والمهام التى تسند له</td>
                            <td style="border: 1px solid"><input type="text" class="numb" name="summg1" id="summg1" value="0"  onblur="mySumMg1()" /></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>2 </td>
                            <td>يبادر ويتصرف بثقه ويعمل بتوجيه ذاتى</td>
                            <td style="border: 1px solid"><input type="text" class="numb" name="summg2" id="summg2" value="0"  onblur="mySumMg1()"/></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>3</td>
                            <td>يصدر أحكام واقعية من تحليل البيانات والمعلومات لحل المشكلات </td>
                            <td style="border: 1px solid"><input type="text" class="numb" name="summg3" id="summg3" value="0"  onblur="mySumMg1()"/>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>4</td>
                            <td>يتخذ قرارات فورية واضحة يمكن أن تتضمن إختيارت صعبة ومخاطر حسسوبة </td>
                            <td style="border: 1px solid">
                                <tr>
                                    <td><input type="text" class="numb" name="summg4" id="summg4" value="0"  onblur="mySumMg1()"/></td>
                                    <td><input type="text" class="numb" name="summg4" id="summg4" value="0"  onblur="mySumMg1()"/></td>
                                    <td><input type="text" class="numb" name="summg4" id="summg4" value="0"  onblur="mySumMg1()"/></td>
                                    <td><input type="text" class="numb" name="summg4" id="summg4" value="0"  onblur="mySumMg1()"/></td>
                                    <td><input type="text" class="numb" name="summg4" id="summg4" value="0"  onblur="mySumMg1()"/></td>

                                </tr>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>5</td>
                            <td>لديه القدرة على حل المشاكل و اتخاذ القرارات المناسبة </td>
                            <td style="border: 1px solid"><input type="text" class="numb" name="summg5" id="summg5" value="0"  onblur="mySumMg1()"/></td>
                        </tr>
                        </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Comm_Avg" class="control-label"> إجمالى الدرجة للمبادرة وا تخاذ القرار</label>
                            <input type="text" id="mg1_Sum" name="mg1_Sum" value="0"  class="form-control" onblur="mySumNmg1()" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Comm_Avg" class="control-label"> متوسط الدرجة للمبادرة وا تخاذ القرار</label>
                            <input type="text" id="mg1_Avg" name="mg1_Avg" value="0"  class="form-control" onblur="mySumNmg1()" readonly>
                        </div>

                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>صياغة الاستراتيجيات والمفاهيم</td>
                                <td>أ) اخبرنى عن قرار او خطهقمت بها وكان لها تأثير كبير على الوظائف او الادارات الاخرى داخل شركتك.</td>
                                <td>* تفعيل الخطط الاساسية لتحقيق اهداف المؤسسة. </td>
                                <td><input type="text" class="numb" name="Fsc1" id="Fsc1" value="0" onblur="mySumFsc()" /><span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) الى اى مدى يسمح لك دورك الحالى (او السابق) بالعمل الاستراتيجى.</td>
                                <td>* وضع وتطوير الخطط الاساسية. </td>
                                <td><input type="text" class="numb" name="Fsc2" id="Fsc2" value="0" onblur="mySumFsc()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) صف لى كيف تنسيق بين مشروع ما وبين اهدافة الاستراتيجية.  </td>
                                <td>* تعريف وتطوير الرؤي الايجابيه الحاكمة للافكار المستقبلية للمؤسسة. </td>
                                <td><input type="text" class="numb" name="Fsc3" id="Fsc3" value="0" onblur="mySumFsc()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يتعرف على مجموعة واسعه من الظروف المتعارضة والمتعلقة بالمؤسسة. </td>
                                <td><input type="text" class="numb" name="Fsc4" id="Fsc4" value="0" onblur="mySumFsc()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يؤكد فهمه الى كيف يمكن لموضوع واحد ان يكون جزء من منظومة كبيرة . </td>
                                <td><input type="text" class="numb" name="Fsc5" id="Fsc5" value="0" onblur="mySumFsc()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Fsc_Avg" class="control-label"> متوسط الدرجة صياغة الاستراتيجيات والمفاهيم</label>
                            <input type="text" id="Fsc_Avg" name="Fsc_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Fsc_comm" name="Fsc_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>القيادة والاشراف وتوجيه الافراد</td>
                                <td>أ) أخبرنى متى قمت بإدارة مجموعة من الافراد لتحقيق نتائج على جانب من الاهمية.</td>
                                <td>* تفعيل الخطط الاساسية لتحقيق اهداف المؤسسة. </td>
                                <td><input type="text" class="numb" name="Lsg1" id="Lsg1" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) الى اى مدى يسمح لك دورك الحالى (او السابق) بالعمل الاستراتيجى.</td>
                                <td>* وضع وتطوير الخطط الاساسية. </td>
                                <td><input type="text" class="numb" name="Lsg2" id="Lsg2" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) صف لى كيف تنسيق بين مشروع ما وبين اهدافة الاستراتيجية.  </td>
                                <td>* تعريف وتطوير الرؤي الايجابيه الحاكمة للافكار المستقبلية للمؤسسة. </td>
                                <td><input type="text" class="numb" name="Lsg3" id="Lsg3" value="0" onblur="mySumLsg()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يتعرف على مجموعة واسعه من الظروف المتعارضة والمتعلقة بالمؤسسة. </td>
                                <td><input type="text" class="numb" name="Lsg4" id="Lsg4" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* يؤكد فهمه الى كيف يمكن لموضوع واحد ان يكون جزء من منظومة كبيرة . </td>
                                <td><input type="text" class="numb" name="Lsg5" id="Lsg5" value="0" onblur="mySumLsg()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Lsg_Avg" class="control-label"> متوسط الدرجة القيادة والاشراف وتوجيه الافراد</label>
                            <input type="text" id="Lsg_Avg" name="Lsg_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Lsg_comm" name="Lsg_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>التعلم والبحث </td>
                                <td>أ) أخبرنى متى كان عليك أن تتعلم تقنية او مهمة جديدة وبسرعة .</td>
                                <td>* سريع التعلم للاشغال الجديده ويحفظ المعلومات بسرعة فى ذاكرته. </td>
                                <td><input type="text" class="numb" name="Lr1" id="Lr1" value="0"  onblur="mySumLr()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ب) الى اى مدى يسمح لك دورك الحالى (او السابق) بالعمل الاستراتيجى.</td>
                                <td>* يحتفظ بمجموعة شاملة من المعلومات لدعم ما يتخذه من قرارات تؤكد سرعة ادراكه للمعلومات الجديده. </td>
                                <td><input type="text" class="numb" name="Lr2" id="Lr2" value="0"  onblur="mySumLr()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ج) متى تعلمت من الملاحظات؟(على سبيل المثال من زملائك ام من عملائك).  </td>
                                <td>* يشجع التعلم من خلال الخبرات الادارية(مثلا : التعلم من حالات النجاح الفشل ويسترشد بتجارب القوى العاملة و العملاء) - إجادة إدارة المعلومات (يجمع ويصنف وينشر المعلومات ذات الفائدة للمؤسسة) . </td>
                                <td><input type="text" class="numb" name="Lr3" id="Lr3" value="0"  onblur="mySumLr()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Lr_Avg" class="control-label"> متوسط الدرجة التعلم والبحث </label>
                            <input type="text" id="Lr_Avg" name="Lr_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Lr_comm" name="Lr_comm" rows="6"></textarea>
                        </div>
                        <br>
                        <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                            <thead>
                            <tr class="text-dark">
                                <th>الكفاءات المهارية</th>
                                <th>الاسئلة الاسترشادية</th>
                                <th>مؤشر السلوك</th>
                                <th>الدرجه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>السعى إلى تحقيق الاهداف </td>
                                <td></td>
                                <td>* تحقيق نتائج مذهله. </td>
                                <td><input type="text" class="numb" name="Sag1" id="Sag1" value="0" onblur="mySumSag()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* التصرف بعزيمة . </td>
                                <td><input type="text" class="numb" name="Sag2" id="Sag2" value="0" onblur="mySumSag()" />
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>* المثابرة خلال الصعوبات . </td>
                                <td><input type="text" class="numb" name="Sag3" id="Sag3" value="0" onblur="mySumSag()"/>
                                    <span class="custom-alert alert alert-danger" style=" display: none;">
                                        الحد الاقصى العدد 5
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="Sag_Avg" class="control-label"> متوسط الدرجة التعلم والبحث </label>
                            <input type="text" id="Sag_Avg" name="Sag_Avg" value="0" class="form-control" onblur="mySumNCom()" readonly>
                        </div>
                        <div class="form-group">
                            <label>التقييم العام للكفاءه</label>
                            <textarea class="form-control" id="Sag_comm" onblur="Percent()" name="Sag_comm" rows="6"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="NCom" class="control-label">عدد الكفاءات التى تم تقيمها </label>
                                <input type="text" id="NCom" name="NCom" value="6" class="form-control" onblur="Percent()" readonly>
                            </div>
                            <div class="col">
                                <label for="NCom_Avg" class="control-label"> متوسط الدرجات للكفاءات </label>
                                <input type="text" id="NCom_Avg" name="NCom_Avg" value="0" onblur="Percent()" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label for="Percentage" class="control-label"> النسبة المئوية لدرجات للكفاءات </label>
                                <input type="text"  id="Percentage" name="Percentage" value="0" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--      EndAdd--}}
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script>
        function mySumComm() {
            let VrComm1              = parseFloat(document.getElementById("Comm1").value);
            let VrComm2              = parseFloat(document.getElementById("Comm2").value);
            let VrComm3              = parseFloat(document.getElementById("Comm3").value);
            let VrComm4              = parseFloat(document.getElementById("Comm4").value);
            let VrComm5              = parseFloat(document.getElementById("Comm5").value);
            let VrComm6              = parseFloat(document.getElementById("Comm6").value);
            let intSumCom = VrComm1 + VrComm2 + VrComm3 + VrComm4 + VrComm5 + VrComm6;
            let intAvgCom = Math.round(intSumCom / 6);
            let intResultsCom = parseFloat(intAvgCom).toFixed(2);
            sumcomm = parseFloat(intResultsCom).toFixed(2);
            document.getElementById("Comm_Avg").value = sumcomm ;
        }
        function mySumDma() {
            let VrDma1              = parseFloat(document.getElementById("Dma1").value);
            let VrDma2              = parseFloat(document.getElementById("Dma2").value);
            let VrDma3              = parseFloat(document.getElementById("Dma3").value);
            let VrDma4              = parseFloat(document.getElementById("Dma4").value);
            let VrDma5              = parseFloat(document.getElementById("Dma5").value);
            let intSumDma = VrDma1 + VrDma2 + VrDma3 + VrDma4 + VrDma5 ;
            let intAvgDma = Math.round(intSumDma / 5);
            let intResultsDma = parseFloat(intAvgDma).toFixed(2);
            sumdma = parseFloat(intResultsDma).toFixed(2);
            document.getElementById("Dma_Avg").value = sumdma ;
        }
        function mySumFsc() {
            let VrFsc1              = parseFloat(document.getElementById("Fsc1").value);
            let VrFsc2              = parseFloat(document.getElementById("Fsc2").value);
            let VrFsc3              = parseFloat(document.getElementById("Fsc3").value);
            let VrFsc4              = parseFloat(document.getElementById("Fsc4").value);
            let VrFsc5              = parseFloat(document.getElementById("Fsc5").value);
            let intSumFsc = VrFsc1 + VrFsc2 + VrFsc3 + VrFsc4 + VrFsc5 ;
            let intAvgFsc = Math.round(intSumFsc / 5);
            let intResultsFsc = parseFloat(intAvgFsc).toFixed(2);
            sumfsc = parseFloat(intResultsFsc).toFixed(2);
            document.getElementById("Fsc_Avg").value = sumfsc ;
        }
        function mySumLsg() {
            let VrLsg1              = parseFloat(document.getElementById("Lsg1").value);
            let VrLsg2              = parseFloat(document.getElementById("Lsg2").value);
            let VrLsg3              = parseFloat(document.getElementById("Lsg3").value);
            let VrLsg4              = parseFloat(document.getElementById("Lsg4").value);
            let VrLsg5              = parseFloat(document.getElementById("Lsg5").value);
            let intSumLsg = VrLsg1 + VrLsg2 + VrLsg3 + VrLsg4 + VrLsg5 ;
            let intAvgLsg = Math.round(intSumLsg / 5);
            let intResultsLsg  = parseFloat(intAvgLsg).toFixed(2);
            sumlsg = parseFloat(intResultsLsg).toFixed(2);
            document.getElementById("Lsg_Avg").value = sumlsg ;
        }
        function mySumLr() {
            let VrLr1              = parseFloat(document.getElementById("Lr1").value);
            let VrLr2              = parseFloat(document.getElementById("Lr2").value);
            let VrLr3              = parseFloat(document.getElementById("Lr3").value);
            let intSumLr = VrLr1 + VrLr2 + VrLr3 ;
            let intAvgLr = Math.round(intSumLr / 3);
            let intResultsLr  = parseFloat(intAvgLr).toFixed(2);
            sumlr = parseFloat(intResultsLr).toFixed(2);
            document.getElementById("Lr_Avg").value = sumlr ;
        }
        function mySumSag() {
            let VrSag1              = parseFloat(document.getElementById("Sag1").value);
            let VrSag2              = parseFloat(document.getElementById("Sag2").value);
            let VrSag3              = parseFloat(document.getElementById("Sag3").value);
            let intSumSag = VrSag1 + VrSag2 + VrSag3 ;
            let intAvgSag = Math.round(intSumSag / 3);
            let intResultsSag  = parseFloat(intAvgSag).toFixed(2);
            sumsag = parseFloat(intResultsSag).toFixed(2);
            document.getElementById("Sag_Avg").value = sumsag ;
        }

        function mySumNCom() {
            let VrComm_Avg           = parseFloat(document.getElementById("Comm_Avg").value);
            let VrDma_Avg            = parseFloat(document.getElementById("Dma_Avg").value);
            let VrFsc_Avg            = parseFloat(document.getElementById("Fsc_Avg").value);
            let VrLsg_Avg            = parseFloat(document.getElementById("Lsg_Avg").value);
            let VrLr_Avg             = parseFloat(document.getElementById("Lr_Avg").value);
            let VrSag_Avg            = parseFloat(document.getElementById("Sag_Avg").value);
            let intSum = VrComm_Avg + VrDma_Avg + VrFsc_Avg + VrLsg_Avg + VrLr_Avg + VrSag_Avg ;
            let intAvg = Math.round(intSum / 6);
            let intResults  = parseFloat(intAvg).toFixed(2);
            sum = parseFloat(intResults).toFixed(2);
            document.getElementById("NCom_Avg").value = sum ;
        }
        function mySumMg1() {
            let Vrsummg1              = parseFloat(document.getElementById("summg1").value);
            let Vrsummg2              = parseFloat(document.getElementById("summg2").value);
            let Vrsummg3              = parseFloat(document.getElementById("summg3").value);
            let Vrsummg4              = parseFloat(document.getElementById("summg4").value);
            let Vrsummg5              = parseFloat(document.getElementById("summg5").value);
            let intSumSmg = Vrsummg1 + Vrsummg2 + Vrsummg3 + Vrsummg4 + Vrsummg5 ;
            let intAvgSmg = Math.round(intSumSmg / 5);
            let intResultsmg1  = parseFloat(intSumSmg).toFixed(2);
            sumsmg1 = parseFloat(intResultsmg1).toFixed(2);
            let intResultsSmg  = parseFloat(intAvgSmg).toFixed(2);
            sumsmg1Av = parseFloat(intResultsSmg).toFixed(2);
            document.getElementById("mg1_Sum").value = sumsmg1 ;
            document.getElementById("mg1_Avg").value = sumsmg1Av ;
        }


        function Percent(){
            let VrNCom_Avg  = parseFloat(document.getElementById("NCom_Avg").value);
            let intPer = Math.round((VrNCom_Avg / 5) * 100 );
            let intResultsPre  = parseFloat(intPer).toFixed(2);
            prec = parseFloat(intResultsPre).toFixed(2);
            document.getElementById("Percentage").value = prec + "%" ;
        }

        $('#select3modal').on('show.bs.modal', function(event) {
            var button      = $(event.relatedTarget)
            var Ms_Id_3     = button.data('id')
            var Comm_Id     = button.data('comm_id')
            var Ms_Code     = button.data('code')
            var Ms_Name     = button.data('name')
            var Ms_Com_Date = button.data('comDate')
            var Ms_Comm     = button.data('comm')
            var modal       = $(this)

            modal.find('.modal-body #Ms_Id').val(Ms_Id_3);
            modal.find('.modal-body #Comm_Id').val(Comm_Id);
            modal.find('.modal-body #Ms_Code').val(Ms_Code);
            modal.find('.modal-body #Ms_Name').val(Ms_Name);
            modal.find('.modal-body #Ms_Com_Date').val(Ms_Com_Date);
            modal.find('.modal-body #Ms_Comm').val(Ms_Comm);
        })
        $('#select4modal').on('show.bs.modal', function(event) {
            var button      = $(event.relatedTarget)
            var Ms_Id_3     = button.data('empid')
            var Comm_Id     = button.data('com_id')
            var Ms_Code     = button.data('a_code')
            var Ms_Name     = button.data('a_name')
            var Ms_Com_Date = button.data('comDate')
            var Ms_Comm     = button.data('comm')
            var modal       = $(this)

            modal.find('.modal-body #Ms_Id').val(Ms_Id_3);
            modal.find('.modal-body #Comm_Id').val(Comm_Id);
            modal.find('.modal-body #Ms_Code').val(Ms_Code);
            modal.find('.modal-body #Ms_Name').val(Ms_Name);
            modal.find('.modal-body #Ms_Com_Date').val(Ms_Com_Date);
            modal.find('.modal-body #Ms_Comm').val(Ms_Comm);
        })

    </script>
    <script>
        $('.numb').blur(function () {
            if ($(this).val() > 5) {
                $(this).css('border', '1px solid #F00');
                $(this).parent().find('.custom-alert').fadeIn(200);
            } else {
                $(this).css('border', '1px solid #080');
                $(this).parent().find('.custom-alert').fadeOut(200);

            }
        });
    </script>
@endsection
