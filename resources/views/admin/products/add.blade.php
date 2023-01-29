@extends('layouts.admin')
@section('title','اضافة  منتج جديد')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="my-form" name="my-form" class="row" enctype="multipart/form-data"method="post" action="javascript:void(0)">
                @csrf
                <div class="card card-custom example example-compact">
                    <div class="card-header">

                        <div class="col-12 px-0">
                            <div class="col-12 px-3 py-3" style="font-size: 20px;">
                                اضافة منتج جديد
                            </div>
                            <div class="col-12 divider" style="min-height: 2px;"></div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="col-12 p-3 row">

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم المنتج باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_ar"   maxlength="190" class="form-control" value="{{old('title_ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم المنتج باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_he"    maxlength="190" class="form-control" value="{{old('title_he')}}" >
                            </div>
                        </div>

                            <div class="col-12 col-lg-6 p-2">
                                <div class="col-12">
                                رائحة المنتج باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="smell_product_ar"    maxlength="190" class="form-control" value="{{old('smell_product_ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                رائحة المنتج باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="smell_product_he"    maxlength="190" class="form-control" value="{{old('smell_product_he')}}" ></div>
                        </div>

                        <div class="col-6 col-lg-6 p-2 select_categories" >
                            <div class="col-6 p-2 ">

                                القسم التابع له
                            </div>
                            <div class="col-12  ">

                                <select class="form-control kt_select2_1" name="category_id">

                                    <option value="">اختر القسم</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-6 col-lg-6 p-2 " >
                            <div class="col-6 p-2 ">
                            اسم القسم
                            </div>
                            <div class="col-12  ">

                                <select class="form-control kt_select2_1" name="child_category_id">

                                </select>
                            </div>
                        </div>





                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الوصف باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor"  id="description_ar"  name="description_ar">{!!  old('description_ar')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الوصف باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor"   id="description_he"  name="description_he">{!!  old('description_he')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                تركيبة المنتج باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor" id="formula_ar"  name="formula_ar">{!!  old('formula_ar')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                تركيبة المنتج باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor" id="formula_he"  name="formula_he">{!!  old('formula_he')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 p-2">
                            <div class="col-12">
                                صورة المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image"   id="image"  class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">

                            </div>
                        </div>
                        <div class="col-12 p-2">
                            <div class="col-12">
صورة الهرمية للمنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="fragrance_image" id="fragrance_image"   class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">
                            </div>
                        </div>

                        <div class="col-12 p-2">
                            <div class="col-12">
صورة تركيبة المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="formula_image"   id="formula_image"  class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">

                            </div>
                        </div>





                        <div class="col-6 col-lg-6 p-2">
                            <div class="col-12">
                                ميتا الوصف باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="meta_description_ar"  class="form-control" style="min-height:150px">{{old('meta_description_ar')}}</textarea>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 p-2">
                            <div class="col-12">
                                ميتا الوصف باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="meta_description_he" class="form-control"  style="min-height:150px">{{old('meta_description_he')}}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
حجم العبوة باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="size_ar"    maxlength="190" class="form-control" value="{{old('size_ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
حجم العبوة باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="size_he"    maxlength="190" class="form-control" value="{{old('size_he')}}" >
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

