@extends('layouts.admin')

@section('title','تعديل الفيديو')
@section('content')

    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.video.update')}}">
                @csrf

                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="card card-custom example example-compact">
                        <div class="card-header">

                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3" style="font-size: 20px;">
                                    تعديل الفيديو
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                        </div>
                        <div class="card-body">
                    <div class="col-12 p-3 row">

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم  باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name_ar" required   maxlength="190" class="form-control" value="{{$video->getTranslation('title','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم  باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name_he" required   maxlength="190" class="form-control" value="{{$video->getTranslation('title','he')}}" >
                            </div>
                        </div>




                        <div class="col-12 p-2">
                            <div class="col-12">
                                صورة الفيديو
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image"     class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">
<img src="{{asset('assets/images/videos/'.$video->image)}}" width="150px" height="150px">
                            </div>
                        </div>
                        <div class="col-12 p-2">
                            <div class="col-12">
                            الفيديو
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="video"    class="form-control" >
                            </div>
                            <div class="col-12 pt-3">
                                <video style="width:100%; height:100%; object-fit:cover" poster="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/home/orchidea-nera.jpg" playsinline autoplay preload muted loop><source src="{{asset('assets/images/videos/'.$video->video)}}" type="video/mp4">Your browser does not support the video tag.</video>

                            </div>
                        </div>







                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>

                    </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('admin.products.js.add_edit_js')

@endsection

