@extends('layouts.admin')
@section('title')
المستخدمين
@endsection
@section('style')
    @if(app()->getLocale()=='ar')
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    @else
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <style>

        .error .select2-choice.select2-default,
        .error .select2-choices {
            color: #a94442;
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .error:focus,
        .error .select2-choice.select2-defaultLfocus,
        .error .select2-choicesLfocus {
            border-color: #843534;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
        }
        .select2-container .select2-choices .select2-search-field input,
        .select2-container .select2-choice,
        .select2-container .select2-choices,
        .error {
            border-radius: 1px;
        }
    </style>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap ">
            <div class="card-title">
                <h1 class="card-label">عرض كافة المستخدمين</h1>
            </div>
            <form id="filter_form" action="" method="post">
                @csrf
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>تصدير</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2"></li>
                                <li class="navi-item">
                                    <a   class="navi-link excel" >
                                        		<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
                                                    																</span>
                                                                                            <span class="navi-text">Excel</span>

                                    </a>

                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link pdf">
																<span class="navi-icon">
																	<i class="la la-file-pdf-o"></i>
																</span>
                                        <span class="navi-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>

                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>اضافة مستخدم جديد</a>
                    <!--end::Button-->
                </div>


                <!--begin::Dropdown Menu-->
{{--                <button class="btn btn-warning pdf" name="pdf">تصدير </button>--}}
{{--                <button class="btn btn-secondary excel" name="pdf"> Excel تصدير </button>--}}

                <!--end::Button-->
        </div>



        <div class="card-body">
            <!--begin::Table-->



                <div class="form-group row m-1">
                    <div class="col-lg-3">
                        <label>الاسم:</label>
                        <input name="name" id="name" class="form-control">

                    </div>
                    <div class="col-lg-3">
                        <label>الايميل:</label>
                        <input name="email" id="email" class="form-control">

                    </div>

                    <div class="col-lg-3">
                        <label>رقم الجوال:</label>
                        <input name="mobile" id="mobile" class="form-control">

                    </div>
                    <div class="col-lg-3">
                        <label>نوع المستخدم:</label>
                        <select class="form-control select_2"

                                id="accountType">
                            <option value="">اختر</option>
                            @foreach($accountTypes as $account_type)
                                <option value="{{$account_type->id}}"> {{$account_type->value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-1">


                    <div class="col-lg-3">
                        <label>الحالة:</label>
                        <select class="form-control select_2"

                                name="status_id"
                                id="status_id">
                            <option value="">اختر</option>
                                <option value="1" >فعال
                                </option>
                            <option value="0">غير فعال</option>

                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>من تاريخ:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker start_at" readonly="readonly" name="start_at" placeholder=""  />
                            <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <label>الى  تاريخ:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control end_at datepicker" readonly="readonly" name="end_at" placeholder=""  />
                            <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group row" style="margin: 10px 3px 10px 0px">
                    <div class="col-lg-4">
                        <button class="btn btn-primary " id="btnFiterSubmitSearch">بحث</button>

                    </div>
                </div>
</form>


            <div class="col-lg-12 row m-1">


            <div class="table-responsive col-lg-12">
                <table class="table table-head-custom table-vertical-center data-table" id="kt_advance_table_widget_1">
                    <thead>
                    <tr class="text-left">

                        <th class="pr-0" style="width: 50px">الصورة</th>
                        <th >"الاسم</th>
                        <th >رقم الجوال</th>
                        <th >الايميل</th>
                        <th >الحالة</th>
                        <th >العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>




@include('Shared.delete')
@include('admin.users.js.js')
@endsection

