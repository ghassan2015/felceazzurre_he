    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">معلومات الحساب الشخصي</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">تغير معلومات الحساب الشخصي</span>
            </div>
            <div class="card-toolbar">


            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->

        <form id="form" class="form" action="{{route('admin.profile.update')}}" method="post">
            @csrf
            <div class="card-body">
                <!--begin::Heading-->

                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">اسم المستخدم:
                        <span class="text-danger">*</span>
                    </label>


                    <div class="col-lg-9 col-xl-6">

                        <div class="input-group input-group-lg input-group-solid">
                            <input class="form-control form-control-lg form-control-solid" placeholder="@lang('lang.Fullname')" name="name" type="text"
                                   value="{{auth()->user()->name}}"/>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">الايميل
                        <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">

                            <input type="text" class="form-control form-control-lg form-control-solid"
                                   value="{{auth()->user()->email}}" name="email" placeholder="الايميل الشخصي"/>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('lang.Mobile')
                        <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">

                            <input type="text" class="form-control form-control-lg form-control-solid"
                                   value="{{auth()->user()->mobile}}" name="mobile" placeholder="@lang('lang.Mobile')"/>
                        </div>
                        @error('mobile')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <button type="submit" class="btn btn-success mr-2 mb-3" style="float: left">@lang('lang.submit')<span><i
                            class="fas fa-check-circle"></i></span></button>
            </div>

        </form>
        <!--end::Form-->
    </div>
    <br>
    <br>
    <!--end::Card-->
