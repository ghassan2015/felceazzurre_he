@extends('layouts.admin')
@section('title')
    المستخدمين -اضافة مستخدم

@endsection


@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h1 class="card-label">  البيانات الخاصة بتعديل المستخدم : {{$user->name}}</h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->




                <!--end::Dropdown-->
                <!--begin::Button-->


                <!--end::Button-->
            </div>
        </div>

        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample3">
            <form class="needs-validation "  name="form" action="{{route('admin.users.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne3">البيانات الشخصية</div>
                    </div>
                    <div id="collapseOne3" class="collapse show" data-parent="#accordionExample3">
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div class="modal-body">
                                <input type="hidden" class="user_id" name="user_id" value="{{$user->id}}">
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="name">
                                            الاسم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            الاسم
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="pin">
                                            رقم السري الخاص (PIN)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="pin" class="form-control @error('pin') is-invalid @enderror" id="pin" value="{{$user->pin_code}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('pin')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            رقم السري الخاص (PIN)

                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="document_type_id">
                                            نوع الوثيقة
                                            <span class="text-danger">*</span>
                                        </label>
                                        <br>
                                        <select name="document_type_id" class="row  form-control select_2 document_type_id @error('document_type_id') is-invalid @enderror"
                                                style="width: 100%">
                                            <option value=""> اختر</option>
                                            @foreach($document_types as $va)
                                                <option value="{{ $va->id }}"> {{ $va->value }}</option>

                                                </option>
                                            @endforeach
                                        </select>

                                        @error('document_type_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 col-sm-12 id_row" style="display: none">

                                        <label  class="id_number" for="id_number">
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="id_number" class="form-control @error('id_number') is-invalid @enderror" id="id_number" value="{{old('id_number')}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('id_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            رقم الهوية او الجواز السفر
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="email">
                                            الايمل
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            الاسم
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="password">
                                            رقم المرور الخاصة بالحساب
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{old('password')}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            رقم المرور الخاصة بالحساب
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>


                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="phone">
                                            رقم الجوال
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            رقم الجوال
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <label for="account_type_id">
                                            نوع الحساب
                                            <span class="text-danger">*</span>
                                        </label>
                                        <br>
                                        <select name="account_type_id" class="row  form-control select_2 account_type_id @error('account_type_id') is-invalid @enderror"
                                                style="width: 100%">
                                            <option value=""> اختر</option>
                                            @foreach($accountTypes as $va)
                                                <option value="{{ $va->id }}" @if($va->id==$user->accountTypes->id) selected @endif> {{ $va->value }}</option>

                                                </option>
                                            @endforeach
                                        </select>

                                        @error('account_type_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>



                                <div class="form-group row">

                                    <div class="col-lg-6 col-sm-12">

                                        <label for="balance">
                                            الرصيد
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="balance" class="form-control  @error('balance') is-invalid @enderror"  id="balance" value="{{$user->balance??''}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('balance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            الرصيد
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingTwo3">
                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo3">العنوان</div>
                    </div>
                    <div id="collapseTwo3" class="collapse" data-parent="#accordionExample3">
                        <div class="card-body">
                            <!--begin: Datatable-->

                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="line1">
                                            (Line 1)  العنوان

                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="line1" class="form-control @error('line1') is-invalid @enderror" id="line1" value="{{$user->address->line1??''}}"
                                               aria-describedby="emailHelp" placeholder="">
                                        <div class="invalid-feedback">
                                            (Line 1)  العنوان
                                        </div>
                                        @error('line1')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="line2">
                                            (Line 2)  العنوان

                                        </label>
                                        <input type="text" name="line2" class="form-control" id="line2" value="{{$user->address->line_2??''}}"
                                               aria-describedby="emailHelp" placeholder="">
                                        <div class="invalid-feedback">
                                            (Line 2)  العنوان

                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">

                                        <label class="form-control-label" for="country_id">الدولة<span style="color: red">*</span> </label>
                                        <select class="form-control  select_2 country_id @error('country_id') is-invalid @enderror" data-live-search="true" name="country_id"  data-container=".accordion">
                                            <option value="">اختر</option>
                                            @foreach($countries as $val)
                                                <option value="{{$val->id}}" @if(!is_null($user->address))@if($val->id===$user->address->country->id) selected @endif @endif>{{$val->name_ar }} </option>
                                            @endforeach
                                        </select>

                                        @error('country_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-sm-12 provinces_block">
                                        <label class="form-control-label" for="province_cd">المدينة <span style="color: red">*</span> </label>
                                        <select class="form-control select_2 city_id @error('city_id') is-invalid @enderror" data-live-search="true" name="city_id" data-container=".accordion">
                                            @if(!is_null($user->address))
                                            <option value="{{$user->address->country->city->id}}" >{{$user->address->country->city->name_ar}} </option>
         @endif
                                        </select>
                                    </div>
                                    @error('city_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">

                                        <label for="post_code">
                                            الرقم البريدي

                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="post_code" class="form-control @error('post_code') is-invalid @enderror" id="post_code" value="{{$user->address?$user->address->post_code:''}}"
                                               aria-describedby="emailHelp" placeholder="">

                                        @error('post_code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            الرقم البريدي
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingTwo3">
                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree3">المرفقات</div>
                    </div>
                    <div id="collapseThree3" class="collapse" data-parent="#accordionExample3">
                        <div class="card-body">
                            <!--begin: Datatable-->

                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="person_image">
                                            الصورة الشخصية
                                            <span class="text-danger">*</span>

                                        </label>
                                        <input class="form-control image @error('person_image') is-invalid @enderror" type="file" accept=".png, .jpg" name="person_image" id="person_image" onchange="readURL(this);" >
                                        @error('person_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="w-50 text-center">


                                        <img src="{{$user->images()}}" style="width: 100px"
                                             class="img-thumbnail img-preview"  id="imagePreview" alt="">

                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="id_image" class="id_image">

                                            <span class="text-danger">*</span>

                                        </label>
                                        <input class="form-control image @error('id_image') is-invalid @enderror" accept=".png, .jpg" type="file" name="id_image" id="id_image" onchange="readURLImage(this);" >
                                        @error('id_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            صورة الهوية او جواز السفر
                                        </div>
                                    </div>


                                    <div class="w-50 text-center">


                                        <img src="{{$user->idImage()}}" style="width: 100px"
                                             class="img-thumbnail id_image"  id="imagePreview" alt="">

                                    </div>

                                </div>
                                <div class="form-group row record" style="display: none;">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="commercial_record_image">
                                            صورة السجل التجاري
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control commercial_record_image @error('commercial_record_image') is-invalid @enderror" accept=".png, .jpg" type="file" name="commercial_record_image" id="commercial_record_image" onchange="readURLRecord(this);" >
                                        <div class="invalid-feedback">
                                            صورة السجل التجاري
                                        </div>
                                        @error('commercial_record_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="w-50 text-center">


                                        <img src="{{$user->commercial_record_image()}}" style="width: 100px"
                                             class="img-thumbnail image_commercial_record_image"  id="imagePreview" alt="">

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="form-group row">
                        <div class="card-body">

                            <div class="col-lg-6">
                                <label>الحالة:</label>

                                <span class="switch switch-icon">
																<label>
																	<input type="checkbox" checked="checked" name="status" class="status"  />
																	<span></span>
																</label>
															</span>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                   aria-hidden="true"></i></span>
                تاكيد

            </button>


        </div>
        </form>

    </div>
@endsection

@include('admin.users.js.js')
