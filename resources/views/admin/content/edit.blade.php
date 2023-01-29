@extends('layouts.admin')

@section('title','تعديل المحتوى')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.content.update')}}">
                @csrf

                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="card card-custom example example-compact">
                        <div class="card-header">

                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3" style="font-size: 20px;">
                                    تعديل المحتوى
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                        </div>
                        <div class="card-body">
                    <div class="col-12 p-3 row">

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان  باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_ar" required   maxlength="190" class="form-control" value="{{$content->getTranslation('title','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان  باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_he" required   maxlength="190" class="form-control" value="{{$content->getTranslation('title','he')}}" >
                            </div>
                        </div>


                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان الفرعي  باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="sub_title_ar" required   maxlength="190" class="form-control" value="{{$content->getTranslation('sub_title','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان   الفرعي باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="sub_title_he" required   maxlength="190" class="form-control" value="{{$content->getTranslation('sub_title','he')}}" >
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                               الرابط
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="url" required   maxlength="190" class="form-control" value="{{$content->url}}" >
                            </div>
                        </div>
                        <div class="col-12 p-2">
                            <div class="col-12">
                                الصورة
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image"     class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">
<img src="{{asset('assets/images/contents/'.$content->image)}}" width="150px" height="150px">
                            </div>
                        </div>



</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
    @include('admin.products.js.add_edit_js')

@endsection

