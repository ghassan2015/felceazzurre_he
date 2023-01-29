@extends('layouts.admin')

@section('title','تعديل المنتج')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">



            <form id="edit-my-form" name="edit-my-form" class="row" enctype="multipart/form-data" method="post" action="javascript:void(0)">
                @csrf
                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3" style="font-size: 20px;">
                                    تعديل المنتج
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                        </div>
                        <div class="card-body">

                        <div class="col-12 p-3 row">
                        <input type="hidden" name="product_id"    class="form-control" value="{{$product->id}}" >

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم المنتج باللغة العربية
                            </div>

                            <div class="col-12 pt-3">
                                <input type="text" name="title_ar"    maxlength="190" class="form-control" value="{{$product->getTranslation('name','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم المنتج باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_he"    maxlength="190" class="form-control" value="{{$product->getTranslation('name','he')}}" >
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                رائحة المنتج باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="smell_product_ar"    maxlength="190" class="form-control" value="{{$product->getTranslation('smell_product','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                رائحة المنتج باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="smell_product_he"    maxlength="190" class="form-control" value="{{$product->getTranslation('smell_product','he')}}" >
                            </div>
                        </div>

                        <div class="col-6 col-lg-6 p-2 select_categories" >
                            <div class="col-6 p-2 ">

                                القسم التابع له
                            </div>
                            <div class="col-12  ">

                                <select class="form-control kt_select2_1" name="category_id">

                                    <option value="">اختر القسم</option>
                                    @foreach($categories as $value)
                                        <option value="{{$value->id}}" @if($value->id==$product->category->parent->id)
                                        selected="selected"
                                        @endif>
                                        {{$value->title}}</option>
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
                                    <option value="{{$product->category_id}}" >{{$product->category->title}}</option>

                                </select>
                            </div>
                        </div>





                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الوصف باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor"  name="description_ar">{!! $product->getTranslation('fragrance','ar')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الوصف باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor" name="description_he">{!! $product->getTranslation('fragrance','he')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                تركيبة المنتج باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor"  name="formula_ar">{!! $product->getTranslation('formula','ar')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                تركيبة المنتج باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea class="description_editor"  name="formula_he">{!! $product->getTranslation('formula','he')!!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 p-2 row">
                            <div class="col-12">
                                صورة المنتج
                            </div>
                            <div class="col-6 pt-3">
                                <input type="file" name="image"  value="{{{asset('assets/images/products/'.$product->product_image)}}}}"   class="form-control" accept="image/*">
                            </div>
                            <div class="col-6 pt-3">
<img src="{{asset('assets/images/products/'.$product->product_image)}}" width="200px" height="200px">
                            </div>
                        </div>
                        <div class="col-12 p-2 row" >
                            <div class="col-12">
                                صورة الهرمية للمنتج
                            </div>
                            <div class="col-6 pt-3">
                                <input type="file" name="fragrance_image" value="{{asset('assets/images/products/'.$product->fragrance_image)}}"    class="form-control" accept="image/*">
                            </div>
                            <div class="col-6 pt-3">
                                <img src="{{asset('assets/images/products/'.$product->fragrance_image)}}" width="200px" height="200px">
                            </div>
                        </div>

                        <div class="col-12 p-2 row">
                            <div class="col-12">
                                صورة تركيبة المنتج
                            </div>
                            <div class="col-6 pt-3">
                                <input type="file" name="formula_image"  value="{{asset('assets/images/products/'.$product->fragrance_image)}}"    class="form-control" accept="image/*">
                            </div>
                            <div class="col-6 pt-3">
                                <img src="{{asset('assets/images/products/'.$product->formula_image)}}" width="200px" height="200px">
                            </div>
                        </div>



                        <div class="col-6 col-lg-6 p-2">
                            <div class="col-12">
                                ميتا الوصف باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="meta_description_ar"  class="form-control" style="min-height:150px">{{$product->getTranslation('meta_description','ar')}}</textarea>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 p-2">
                            <div class="col-12">
                                ميتا الوصف باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="meta_description_he" class="form-control"  style="min-height:150px">{{$product->getTranslation('meta_description','he')}}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                حجم العبوة باللغة العربية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="size_ar"     maxlength="190" class="form-control" value="{{$product->getTranslation('size','ar')}}" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                حجم العبوة باللغة العبرية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="size_he"    maxlength="190" class="form-control" value="{{$product->getTranslation('size','he')}}" >
                            </div>
                        </div>
                    </div>


                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('admin.products.js.edit_js')


@endsection

