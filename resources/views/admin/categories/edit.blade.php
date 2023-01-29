@extends('layouts.admin')
@section('title','تعديل  التصنيف')

@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">


		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.categories.update')}}">
		@csrf

		<div class="col-12 col-lg-12 p-0 main-box">
            <div class="card card-custom example example-compact">
                <div class="card-header">

                <div class="col-12 px-0">
                <div class="col-12 px-3 py-3" style="font-size: 20px;">
                    تعديل التصنيف
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>

                </div>
                <div class="card-body">
			<div class="col-12 p-3 row">



                <input type="hidden" name="category_id" required   maxlength="190" class="form-control" value="{{$category->id}}" >

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					 اسم القسم باللغة العربية
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="title_ar" required   maxlength="190" class="form-control" value="{{$category->getTranslation('title','ar')}}" >
				</div>
			</div>

                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">اسم القسم باللغة العبرية
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="title_he" required   maxlength="190" class="form-control" value="{{$category->getTranslation('title','he')}}" >
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        هل تاابع الى تصنيف اخر
                    </div>
                    <span class="switch switch-icon">
																<label>
																	<input type="checkbox" class="check_value" name="select" />
																	<span></span>
																</label>
                    </span>
                </div>
                <div class="col-12 col-lg-6 p-2 select_categories" >
                    <div class="col-12">
                        اسم القسم التابع له
                    </div>
                    <div class="col-12 pt-3">
<?php
                        $categories=\App\Models\Category::get();
?>
                        <select class="form-control kt_select2_1" name="parent_id" id="select_parent_category" data-parent_id="{{$category->parent_id}}">

                            <option value="">اختر القسم</option>
                            @foreach($categories as $value)
                                <option value="{{$value->id}}"
                                        @if($category->parent_id==$value->id)
                                selected='selected'
                                @endif>
                                {{$value->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


			<div class="col-12 p-2">
				<div class="col-12">
					الشعار
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="image"    class="form-control" accept="image/*">
				</div>
				<div class="col-12 pt-3">
					<img src="{{$category->images()??asset('images/default/image.jpg')}}" style="width:100px">
				</div>
			</div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        لوقو  الخاص بالقسم بالون الازرق
                    </div>
                    <div class="col-12 pt-3">
                        <input type="file" name="icon_image_blue"    class="form-control" accept="image/*">
                    </div>
                    <div class="col-12 pt-3">
                        <img src="{{$category->blueImageIcon()??asset('images/default/image.jpg')}}" style="width:100px">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        لوقوالخاص بالقسم بالون الابيض
                    </div>
                    <div class="col-12 pt-3">
                        <input type="file" name="icon_image_white"    class="form-control" accept="image/*">
                    </div>
                    <div class="col-12 pt-3">
                        <img src="{{$category->whiteImageIcon()??asset('images/default/image.jpg')}}" style="width:100px">
                    </div>
                </div>


			<div class="col-12  p-2">
				<div class="col-12">
					الوصف
				</div>
				<div class="col-12 pt-3">
                    <textarea id="kt-tinymce-2" name="description" class="tox-target">

                        {!!  $category->description!!}
                    </textarea>
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					ميتا الوصف
				</div>
				<div class="col-12 pt-3">
					<textarea name="meta_description" class="form-control" style="min-height:150px">{{$category->meta_description}}</textarea>
				</div>
			</div>
			</div>

		    </div>

		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div>
            </div>
		</form>
	</div>
</div>
@endsection
{{--@include('admin.categories.js.js')--}}
@section('scripts')
    <script src="{{asset('assets_admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets_admin/js/pages/crud/forms/editors/tinymce.js')}}"></script>

    <script>
        $(function () {

            var parent_id=$('.kt_select2_1').attr('data-parent_id');
            // alert(parent_id);

            if(parent_id){
                    $(".select_categories").show();
                 ($('.check_value').prop("checked",true));


            }else{
                $(".select_categories").hide();
                $('.check_value').prop('checked', false);

            }
            // $('.select_categories').hide();
            $(".check_value").on('click',function () {
                if ($(this).is(":checked")) {
                    $(".select_categories").show();
                } else {
                    $(".select_categories").hide();
                }
            });
        });
    </script>
@endsection
