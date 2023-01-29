@extends('layouts.admin')

@section('content')
<style type="text/css">
	.settings-tab-opener{
		box-shadow: 0px 6px 12px #ebebeb;
    	border-radius:11px;
    	cursor: pointer;
    	width:80px;height: 45px;
	}
	.settings-tab-opener.active{
		box-shadow: 0px 6px 12px #c8e0ff!important;
		color: #fff;
		background: #2196f3;
	}
	.taber:not(.active){
		display: none;
	}

</style>
<div class="col-12 col-lg-12 p-0 main-box">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="card card-custom example example-compact">
            <div class="card-header">

                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3" style="font-size: 20px;">
اعدادات الموقع
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>

            </div>
            <div class="card-body">


	 	<div class="col-12 row" >
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener active" data-opentab="general-tab">
                <i class="fa fa-wrench" aria-hidden="true"></i>
                عام
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="appearance-tab">
                <i class="fas fa-paint-roller"></i>	مظهر
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="links-tab">
				<i  class="fas fa-link "></i>	روابط
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="pages-tab">
				<span  class="fas fa-pager "></span>	صفحات
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="codes-tab">
				<i  class="fas fa-code"></i>	أكواد
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="others-tab">
				<i  class="fas fa-cogs"></i>	اخرى
			</div>
		</div>

	 	<form class="col-12 row " id="validate-form" method="POST" action="{{route('admin.settings.update')}}" enctype="multipart/form-data" >
	 	@csrf
	 	@method("PUT")

	 	<div class="col-12 col-lg-8 px-3 py-5">

	 		<div class="col-12 row p-0 taber active" id="general-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-6 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 			 باللغة العربية	اسم الموقع
		 			</div>
		 			<div class="col-6 col-lg-9 px-2">
                        <input type="" name="website_name_ar" class="form-control" value="{{$settings->getTranslation('website_name','ar')}}"  maxlength="190">
		 			</div>

		 		</div>

                <div class="col-12 px-0 d-flex mb-3 row pb-3">
                    <div class="col-6 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                اسم الموقع باللغة العبرية
                    </div>
                    <div class="col-6 col-lg-9 px-2">
                        <input type="" name="website_name_he" class="form-control" value="{{$settings->getTranslation('website_name','he')}}"  maxlength="190">
                    </div>

                </div>

                <div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        العنوان باللغة العربية

                    </div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="address_ar" class="form-control">{{$settings->getTranslation('address','ar')}}</textarea>
		 			</div>
		 		</div>


                <div class="col-12 px-0 d-flex mb-3 row pb-3">
                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                            العنوان باللغة العبرية
                    </div>
                    <div class="col-12 col-lg-9 px-2">
                        <textarea name="address_he" class="form-control">{{$settings->getTranslation('address','he')}}</textarea>
                    </div>
                </div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">

عن الموقع باللغة العربية		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="website_bio_ar" class="form-control">{{$settings->getTranslation('website_bio','ar')}}</textarea>
		 			</div>
		 		</div>



                <div class="col-12 px-0 d-flex mb-3 row pb-3">
                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        عن الموقع باللغة العبرية                    </div>
                    <div class="col-12 col-lg-9 px-2">
                        <textarea name="website_bio_he" class="form-control">{{$settings->getTranslation('website_bio','he')}}</textarea>
                    </div>
                </div>

		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				بريد التواصل
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}" >
		 			</div>
		 		</div>


		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				لوجو الموقع
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_logo" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_logo()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اللوجو عريض
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_wide_logo" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_wide_logo()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				الصورة المصغرة
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_icon" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_icon()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
	 		</div>
	 		<div class="col-12 row p-0 taber" id="appearance-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				غلاف الموقع
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_cover" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_cover()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>


		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اللون الرئيسي
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="main_color"  value="{{$settings->main_color}}" maxlength="190">
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اللون الفرعي
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="hover_color"  value="{{$settings->hover_color}}" maxlength="190">
		 			</div>
		 		</div>

		 	</div>
		 	<div class="col-12 row p-0 taber" id="links-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رقم الهاتف
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="phone" class="form-control" value="{{$settings->phone}}" maxlength="190">
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رقم الهاتف 2
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="phone2" class="form-control" value="{{$settings->phone2}}" maxlength="190">
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رقم واتس آب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="whatsapp_phone" class="form-control" value="{{$settings->whatsapp_phone}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط فيس بوك
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="facebook_link" class="form-control" value="{{$settings->facebook_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط تويتر
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="twitter_link" class="form-control" value="{{$settings->twitter_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط انستجرام
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="instagram_link" class="form-control" value="{{$settings->instagram_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط يوتيوب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="youtube_link" class="form-control" value="{{$settings->youtube_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط تيلي جرام
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="telegram_link" class="form-control" value="{{$settings->telegram_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط واتس أب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="whatsapp_link" class="form-control" value="{{$settings->whatsapp_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط تيك توك
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="tiktok_link" class="form-control" value="{{$settings->tiktok_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط نفذلي
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="nafezly_link" class="form-control" value="{{$settings->nafezly_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط لينكد ان
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="linkedin_link" class="form-control" value="{{$settings->linkedin_link}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط جيت هب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="github_link" class="form-control" value="{{$settings->github_link}}" >
	 			</div>
	 		</div>


	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>

	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط مخصص 1
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="another_link1" class="form-control" value="{{$settings->another_link1}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط مخصص 2
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="another_link2" class="form-control" value="{{$settings->another_link2}}" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط مخصص 3
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="another_link3" class="form-control" value="{{$settings->another_link3}}" >
	 			</div>
	 		</div>

	 	</div>
	 	<div class="col-12 row p-0 taber" id="pages-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				سياسة الخصوصية
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="privacy_page" class="form-control editor with-file-explorer">{{$settings->privacy_page}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				شروط الإستخدام
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="terms_page" class="form-control editor with-file-explorer">{{$settings->terms_page}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				من نحن
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="about_page" class="form-control editor with-file-explorer">{{$settings->about_page}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				تواصل معنا
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="contact_page" class="form-control editor with-file-explorer">{{$settings->contact_page}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="codes-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				كود الهيدر
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="header_code" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->header_code}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				كود الفوتر
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="footer_code" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->footer_code}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				ملف robots
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="robots_txt" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->robots_txt}}</textarea>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="others-tab">
	 	</div>

	 </div>

	 	<div class="col-12 col-lg-8 px-0 d-flex mb-3 row pb-3">

 		 	<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">

	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">حفظ التغييرات</button>
	 			</div>
	 		</div>

 		</div>

	  	</form>
	 </div>
</div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$('.settings-tab-opener').on('click',function(){
		$('.settings-tab-opener').removeClass('active');
		$(this).addClass('active');
		var open_id = $(this).attr('data-opentab');
		$('.taber').removeClass('active');
		$('.taber#'+open_id).addClass('active');
	});
</script>
@endsection
