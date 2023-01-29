@extends('layouts.admin')
@section('title','اضافة  تصنيف جديد')

@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">


		<form id="my-form" name="my-form" class="row" enctype="multipart/form-data"method="post" action="javascript:void(0)">
		@csrf

		<div class="col-12 col-lg-12 p-0 main-box">
            <div class="card card-custom example example-compact">
                <div class="card-header">

                <div class="col-12 px-0">
				<div class="col-12 px-3 py-3" style="font-size: 20px;">
				 	إضافة تصنيف  جديد
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
                </div>
                <div class="card-body">

                <div class="col-12 p-3 row">



			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					العنوان باللغة العربية
                    <span class="red" style="color: red">*</span>

                </div>
				<div class="col-12 pt-3">
					<input type="text" name="title_ar" required   maxlength="190" class="form-control" value="{{old('title_ar')}}" >
				</div>
			</div>
                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        العنوان باللغة العبرية
                        <span class="red" style="color: red">*</span>

                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="title_he" required   maxlength="190" class="form-control" value="{{old('title_he')}}" >
                    </div>
                </div>

                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                      هل تاابع الى تصنيف اخر
                    </div>
                    <span class="switch switch-icon">
																<label>
																	<input type="checkbox" id="check_parent_category" class="check_value" name="select" />
																	<span></span>
																</label>
                    </span>
                </div>
                <div class="col-12 col-lg-6 p-2 select_categories" >
                    <div class="col-12">
اسم القسم التابع له                    <span class="red" style="color: red">*</span>

                    </div>
                    <div class="col-12 pt-3 ">

                        <select class="form-control kt_select2_1 select_2" name="parent_id">

                            <option value="">اختر القسم</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




			<div class="col-12 col-lg-12 p-2 row">
				<div class="col-6">
					الشعار
                    <span class="red" style="color: red">*</span>

				<div class="col-12 pt-3">
                    <input type="file" name="image"  id="image" required class="form-control"
                           accept="image/*" @error('image') is-invalid @enderror

                           onchange="readURL(this);"
                    >
                </div>

                    <img id="image-preview"  width="120" height="120" align='middle'src="{{asset('storage/upload.png')}}" alt="your image" title=''/>

                </div>
                <div class="col-6">
                    لوقو القسم بالون الازرق
                    <span class="red" style="color: red">*</span>

                    				<div class="col-12 pt-3">
                    <input type="file" name="icon_image_blue"  id="icon_image_blue" required class="form-control"
                           accept="image/*" @error('icon_image_blue') is-invalid @enderror onchange="readURLIconBlue(this)">
                                    </div>

                    <img id="image_icon_blue"  width="120" height="120" align='middle'src="{{asset('storage/upload.png')}}" alt="your image" title=''/>

                </div>

			</div>

            <div class="col-12 col-lg-12 p-2 row">

                    </div>


            <div class="col-12 col-lg-12 p-2 row">
                        <div class="col-6">
                            لوقو القسم بالون الابيض

                            <span class="red" style="color: red">*</span>

                            				<div class="col-12 pt-3">
                            <input type="file" name="icon_image_white"  id="icon_image_white"
                                   onchange="readURLIconWhite(this)"
                                   required class="form-control"
                                   accept="image/*" @error('icon_image_white') is-invalid @enderror>
                                            </div>

                            <img id="image_icon_white"  width="120" height="120" align='middle'src="{{asset('storage/upload.png')}}" alt="your image" title=''/>

                        </div>

                    </div>




                <div class="col-12  p-2">
				<div class="col-12">
					الوصف
				</div>
				<div class="col-12 pt-3">
                    <span class="red" style="color: red">*</span>

                    <textarea id="kt-tinymce-2" name="description" id class="tox-target">

					{{old('description')}}
                    </textarea>
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					ميتا الوصف
				</div>
				<div class="col-12 pt-3">
					<textarea name="meta_description" class="form-control" style="min-height:150px">{{old('meta_description')}}</textarea>
				</div>
			</div>
			</div>
                    <div class="col-12 p-3">
                        <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                    </div>
                </div>
		</div>


		</form>
	</div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

    <script>

        $(function () {
            tinymce.init({
                selector: '#kt-tinymce-2',
                toolbar: false,
                statusbar: false
            });
            $('.select_categories').hide();
            $(".check_value").on('click',function () {
                if ($(this).is(":checked")) {
                    $(".select_categories").show();
                } else {
                    $(".select_categories").hide();
                }
            });
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLIconBlue(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_icon_blue').attr('src', e.target.result);
                    $('#image_icon_blue').hide();
                    $('#image_icon_blue').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLIconWhite(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_icon_white').attr('src', e.target.result);
                    $('#image_icon_white').hide();
                    $('#image_icon_white').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
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
                // image: {
                //     required: true,
                //     accept: "png|jpeg|gif",
                //     filesize: 1048576
                // },
                // icon_image_blue: {
                //     required: true,
                //     accept: "png|jpeg|gif",
                //     filesize: 1048576
                // },
                // icon_image_white: {
                //     required: true,
                //     accept: "png|jpeg|gif",
                //     filesize: 1048576
                // },
                // description: {
                //   required:true,
                //
                // },


                parent_id: {
                    required: {
                        depends: function (elem) {
                            return($('#check_parent_category').is(":checked"));
                        }


                    },
                },

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
                icon_image_blue: "الصورة مطلوب",
                icon_image_white: "الصورة مطلوب",
                parent_id:"القسم التابع له مطلوب",
                description:"التصنيف مطلوب",
                // meta_description:"وصف الميتا مطلوب"
            },


                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    // var my_form=$('#my-form');
                    var data= new FormData(document.getElementById("my-form"));
                    data.append('description', $('#kt-tinymce-2'));
                    data.append('image', $('#image')[0].files[0]);
                    data.append('icon_image_blue', $('#icon_image_blue')[0].files[0]);
                    data.append('icon_image_white', $('#icon_image_white')[0].files[0]);
                    // $('#kt-tinymce-2').triggerSave(true, true);

                    $('#send_form').html('Sending..');
                    $.ajax({
                        url: '{{route('admin.categories.store')}}' ,
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
                                                window.location.replace('{{route("admin.categories.index")}}')
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

