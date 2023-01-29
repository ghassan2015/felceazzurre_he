<div class="modal fade" id="edit_ajaxModel" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel" style="font-size: 18px;">تعديل المنشور</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h5 style="color: #0c0e1a">&times;</h5></span>
                </button>
            </div>

            <form class="needs-validation" id="form" novalidate action="{{route('admin.posts.update')}}" method="post"
                  enctype="multipart/form-data"
            >

                <div class="modal-body">
                    @csrf
                    <input class="form-control " type="hidden" name="id" id="edit_id">

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="title_ar">
                                 العنوان باللغة العربية
                                    <span class="text-danger">*</span>




                            </label>
                            <input name="title_ar" class="form-control" id="edit_title_ar">
                            <div class="invalid-feedback">
اضافة العنوان باللغة العربية
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="title_he">
                                 العنوان باللغة العبرية
                                    <span class="text-danger">*</span>


                            </label>
                            <input name="title_he" class="form-control" id="edit_title_he">
                            <div class="invalid-feedback">

                                اضافة العنوان باللغة العبرية
                            </div>
                        </div>



                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">
                            <label for="image">
                                  الصورة
                                    <span class="text-danger">*</span>


                            </label>
                            <input class="form-control image" type="file" name="avatar" id="example-tel-input">
                            <div class="invalid-feedback">
                                الصورة
                            </div>
                        </div>


                        <div class="w-50 text-center">


                            <img src="{{ asset('assets/images/img1.jpg') }}" style="width: 100px"
                                 class="img-thumbnail image_preview" alt="">

                        </div>

                    </div>



                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="url">
                                  رابط المنشور
                                    <span class="text-danger">*</span>




                            </label>
                            <input type="text" name="url" class="form-control" id="edit_url"
                                   aria-describedby="emailHelp" placeholder="" required>
                            <div class="invalid-feedback">
رابط المنشور
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                               aria-hidden="true"></i></span>
                            تاكيد
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-window-close" aria-hidden="true"></i>
                           اللغاء
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
