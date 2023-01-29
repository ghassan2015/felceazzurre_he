@extends('layouts.admin')
@section('title','الاعدادات العامة')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h1 class="card-label"> اعدادات عامة</h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <!--end::Dropdown-->
                <!--begin::Button-->


                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <form class="form js-validation" name="general_setting" id="my-form"  enctype="multipart/form-data">

                <div class="modal-body">
                    @csrf

                    <div class="form-group row">
                        <input value="{{$website_name->id}}" name="id[]" type="hidden">
                        <div class="col-lg-6 col-sm-12">
                            <label for="website_name_ar">
                                {{$website_name->getTranslation('name','ar')}}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="value_ar[]" class="form-control" id="website_name_ar" value="{{$website_name->getTranslation('value','ar')}}"
                                   aria-describedby="emailHelp" placeholder="">
                            <div class="invalid-feedback">
                                الوصف  (Ar)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label for="website_name_he">
                                {{$website_name->getTranslation('name','he')}}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="value_he[]" class="form-control" id="website_name_he" value="{{$website_name->getTranslation('value','he')}}"
                                   aria-describedby="emailHelp" placeholder="">
                            <div class="invalid-feedback">
                                الاسم  (HE)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                    </div>
                    <hr>

                    <div class="form-group row">
                        <input value="{{$website_content->id}}" name="id[]" type="hidden">

                        <div class="col-lg-6 col-sm-12">
                            <label for="order_receive_notification_description_ar">
                                {{$website_content->getTranslation('name','ar')}}
                                <span class="text-danger">*</span>
                            </label>

                            <textarea
                                class="form-control"
                                name="value_ar[]"
                                placeholder=""
                            >{{$website_content->getTranslation('value','ar')}}</textarea>
                            <div class="invalid-feedback">
                                الوصف  (Ar)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label for="order_receive_notification_description_ar">
                                {{$website_content->getTranslation('name','he')}}
                                <span class="text-danger">*</span>
                            </label>
                            <textarea
                                class="form-control"
                                name="value_he[]"
                                placeholder="{{trans('admin.about_us_ar')}}"
                            >{{$website_content->getTranslation('value','he')}}</textarea>
                            <div class="invalid-feedback">
                                الوصف  (HE)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                    </div>
                    <hr>

                    <div class="form-group row">
                        <input value="{{$term_condition->id}}" name="id[]" type="hidden">
                        <div class="col-lg-6 col-sm-12">
                            <label for="term_condition_ar">
                                {{$term_condition->getTranslation('name','ar')}}
                                <span class="text-danger">*</span>
                            </label>

                            <textarea
                                class="summernote"
                                name="value_ar[]"
                                id="term_condition_ar"
                                placeholder="{{trans('admin.about_us_ar')}}"
                            >{{$term_condition->getTranslation('value','ar')}}</textarea>
                            <div class="invalid-feedback">
                                الوصف  (Ar)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label for="order_receive_notification_description_he">
                                {{$term_condition->getTranslation('name','he')}}
                                <span class="text-danger">*</span>
                            </label>
                            <textarea
                                class="summernote about_ar"
                                name="value_he[]"
                                placeholder="{{trans('admin.about_us_ar')}}"
                            >{{$term_condition->getTranslation('value','he')}}</textarea>
                            <div class="invalid-feedback">
                                الوصف  (HE)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                    </div>
                    <hr>

                    <div class="form-group row">
                        <input value="{{$privacy_policy->id}}" name="id[]" type="hidden">

                        <div class="col-lg-6 col-sm-12">
                            <label for="order_receive_notification_description_ar">
                                {{$privacy_policy->getTranslation('name','ar')}}
                                <span class="text-danger">*</span>
                            </label>

                            <textarea
                                class="summernote about_ar"
                                name="value_ar[]"
                                placeholder="{{trans('admin.about_us_ar')}}"
                            >{{$privacy_policy->getTranslation('value','ar')}}</textarea>
                            <div class="invalid-feedback">
                                الوصف  (Ar)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label for="order_receive_notification_description_he">
                                {{$privacy_policy->getTranslation('name','he')}}

                                <span class="text-danger">*</span>
                            </label>
                            <textarea
                                class="summernote about_ar"
                                name="value_he[]"
                                placeholder="{{trans('admin.about_us_ar')}}"
                            >{{$privacy_policy->getTranslation('value','he')}}</textarea>
                            <div class="invalid-feedback">
                                الوصف  (HE)
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                    </div>

                    <div class="modal-footer">


                        <input type="button"  class="btn btn-primary submit" id="addStatButton"  value="تعديل"/>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/crud/forms/editors/summernote.js')}}"></script>

    <script>
        $('.summernote').summernote({
            height: 150
        });
        $(function() {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='setting_pages']").validate({
                // Specify validation rules
                rules: {
                    'name_ar.*': {
                        required: true
                    }
                },
                // Specify validation error messages
                messages: {
                    "name_ar*":'الاسم مطلوب',



                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        $(document).ready(function () {

            $(document).on('click', '#addStatButton',function (event) {
                event.preventDefault();
                var data = new FormData(document.getElementById("my-form"));
                data.append('term_condition_ar', $('#summernote').text());
                $('.error').text('');
                $.ajax({
                    url: "{{route('admin.settings.update')}}",
                    type: "POST",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response){

                        if (response.status==201){
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });

                        }else if (response.status==422){
                            jQuery.each(response.error, function(key, value){
                                $('.'+key+'_error').text(value);
                            });
                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response,
                            })
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response,
                        })
                    }
                });
            });

        });

    </script>
@endsection
