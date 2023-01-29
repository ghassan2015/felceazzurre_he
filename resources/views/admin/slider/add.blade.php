@extends('layouts.admin')

@section('title','اضافة  سلايدر جديد')

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
اضافة سلايدر جديد
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="col-12 p-3 row">

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_ar" required   maxlength="190" class="form-control" value="{{old('title_ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                                                العنوان باللغة
                                العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_he" required   maxlength="190" class="form-control" value="{{old('title_he')}}" >
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">

العنوان الفرعي باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="sub_title_ar" required   maxlength="190" class="form-control" value="{{old('sub_title_ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
العنوان الفرعي باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="sub_title_he" required   maxlength="190" class="form-control" value="{{old('sub_title_he')}}" >
                            </div>
                        </div>













                        <div class="col-12 p-2">
                            <div class="col-12">
                                صورة المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image"  required  id="image"  class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">

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

