@extends('layouts.admin')

@section('title','القصص')
@section('content')
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="card card-custom example example-compact">
            <div class="card-header">

                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3" style="font-size: 20px;">
                        تعديل القصة
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
            </div>
            <div class="card-body">

            <!--begin: Datatable-->
            <form class="needs-validation "  name="edit_story"   action="{{route('admin.story.update')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group row">
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">

                                العنوان باللغة العربية
                            </div>
                            <div class="col-12 pt-3">

                            <input type="hidden" name="story_id" class="form-control"  id="story_id" value="{{$story->id}}">

                            <input type="text" name="title_ar" class="form-control"  required id="title_ar" value="{{$story->getTranslation('title','ar')}}"
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
                                   placeholder="@lang('admin.title_he')"  value="{{$story->getTranslation('title','he')}}">
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
                                <textarea class="form-control  kt-tinymce-2" id="kt-tinymce-2" required name="description_ar">{!! $story->getTranslation('description','ar') !!}</textarea>
                            </div>

                        </div>


                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                التصنيف  باللغة العبرية

                            </div>

                            <div class="editor  col-12 pt-3">
                                <textarea class="form-control  kt-tinymce-2" required name="description_he">{!! $story->getTranslation('description','he') !!}</textarea>
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
                                        <option value="{{$story_cd->id}}"@if($story_cd->id==$story->story_cd)selected='selected'@endif>{{$story_cd->name}}</option>
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
                            <input class="form-control " name="image" type="file" accept="image/*" onchange="document.getElementById('image_product').src = window.URL.createObjectURL(this.files[0])">
                            <div class="invalid-feedback">
                                الصورة
                            </div>
                        </div>


                        <div class="w-50 text-center">


                            <img src="{{ asset('assets/images/stories/'.$story->image) }}" style="width: 100px"
                                 class="img-thumbnail product_image-preview"  id="image_product" alt="">

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                               aria-hidden="true"></i></span>
                           تاكيد

                        </button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-window-close" aria-hidden="true"></i>
                            الغاء
                        </button>
                    </div>
            </form>


    </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets_admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets_admin/js/pages/crud/forms/editors/tinymce.js')}}"></script>
{{--    @include('admin.story.js.add_edit_js')--}}
    <script>
        tinymce.init({
            selector: '.kt-tinymce-2'
        });
    </script>
@endsection
