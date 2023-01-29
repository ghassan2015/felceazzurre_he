@extends('layouts.admin')

@section('title','تعديل  السلايدر')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="edit-my-form" name="edit-my-form" class="row" enctype="multipart/form-data"method="post" action="javascript:void(0)">
                @csrf

                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="card card-custom example example-compact">
                        <div class="card-header">

                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3" style="font-size: 20px;">
                                    تعديل السلايدر
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                        </div>
                        <div class="card-body">

                        <div class="col-12 p-3 row">
                        <input type="hidden" name="id"    maxlength="190" class="form-control" value="{{$slider->id}}" >

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_ar" required   maxlength="190" class="form-control" value="{{$slider->getTranslation('title','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان باللغة
                                العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_he" required   maxlength="190" class="form-control"value="{{$slider->getTranslation('title','he')}}" >
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">

                                العنوان الفرعي باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="sub_title_ar" required   maxlength="190" class="form-control" value="{{$slider->getTranslation('sub_title','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان الفرعي باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="sub_title_he" required   maxlength="190" class="form-control" value="{{$slider->getTranslation('sub_title','he')}}" >
                            </div>
                        </div>













                        <div class="col-12 p-2">
                            <div class="col-6">
                                صورة المنتج
                            </div>
                            <div class="col-6 pt-3">
                                <input type="file" name="image"     class="form-control" accept="image/*">
                            </div>
                            <div class="col-6 pt-3">
<img src="{{asset('assets/images/sliders/'.$slider->image)}}" width="210px" height="210px">
                            </div>
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

    @include('admin.slider.js.js')
@endsection

