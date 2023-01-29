@extends('layouts.admin')
@section('title','القصص')


@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h1 class="card-label">@lang('admin.Add Story')</h1>
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
            <form name='my-form' id="my-form"action="javascript:void(0)" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group row">
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">

                            العنوان باللغة العربية
                        </div>
                        <div class="col-12 pt-3">


                            <input type="text" name="title_ar" class="form-control"  required id="title_ar" value="{{old('title_ar')}}"
                                   aria-describedby="emailHelp" placeholder="" >
                            <div class="invalid-feedback">

                                العنوان باللغة العبرية       </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            العنوان باللغة العبرية

                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title_he" required class="form-control" id="title_he"
                                   placeholder="@lang('admin.title_he')"  value="{{old('title_he')}}">
                            <div class="invalid-feedback">
                                العنوان باللغة العبرية
                            </div>
                        </div>

                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            التصنيف  باللغة العبرية

                        </div>

                        <div class="editor  col-12 pt-3">
                            <textarea class="form-control  description_editor" id="description_ar" required name="description_ar"></textarea>
                        </div>

                    </div>


                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            التصنيف  باللغة العبرية

                        </div>

                        <div class="editor  col-12 pt-3">
                            <textarea class="form-control  description_editor" required id="description_he" name="description_he"></textarea>
                        </div>


                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-12 col-lg-6 p-2 select_categories" >
                        <div class="col-12">
                            تصنيف القصة                             </div>
                        <div class="col-12 pt-3">

                            <select class="form-control kt_select2_1" name="parent_id" required>

                                <option value="">اختر التصنيف</option>
                                @foreach($stories_cd as $story_cd)
                                    <option value="{{$story_cd->id}}">{{$story_cd->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>

                <div class="form-group row">
                    <div class="col-lg-6 col-sm-12">
                        <label for="image">
                            <h4>   الصورة
                                <span class="text-danger">*</span>
                            </h4>

                        </label>
                        <input class="form-control " id="image"name="image" type="file" accept="image/*" onchange="document.getElementById('image_product').src = window.URL.createObjectURL(this.files[0])">
                        <div class="invalid-feedback">
                            الصورة
                        </div>
                    </div>


                    <div class="w-50 text-center">


                        <img src="{{ asset('assets/logo.png') }}" style="width: 100px"
                             class="img-thumbnail product_image-preview"  id="image_product" alt="">

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                           aria-hidden="true"></i></span>
                        تاكيد

                    </button>

                    <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-window-close" aria-hidden="true"></i>
                        الغاء
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
<script>
    $("form[name='my-form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            title_ar: {
                required:true,

            },
            title_he: {
                required:true,

            },
            image: {
                required: true,
                // accept: "png|jpeg|gif",
                // filesize: 1048576
            },


            story_cd:"required"




        },
        // Specify validation error messages
        messages: {
            title_ar: {
                "required" :"الاسم التصنيف باللغة العربية مطلوب",
            },

            title_he: {
                "required" :"الاسم التصنيف باللغة العبرية مطلوب",
            },
            image: "الصورة مطلوب",
        },


        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // var my_form=$('#my-form');
            var data= new FormData(document.getElementById("my-form"));
            data.append('description_ar', $('#description_ar'));
            data.append('description_he', $('#description_he'));
            data.append('image', $('#image')[0].files[0]);

            $('#send_form').html('Sending..');
            $.ajax({
                url: '{{route('admin.story.store')}}' ,
                type: "POST",
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,

                success: function( response ) {
                    if (response.status==201){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1000
                        });
                        setTimeout( function(){
                                window.location.replace('{{route("admin.story.index")}}')
                            }
                            ,
                            2000 );
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


        }

    });

</script>
@endsection
