<div class="modal fade" id="ajaxModel" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel" style="font-size: 18px;">اضافة منشور</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h5 style="color: #0c0e1a">&times;</h5></span>
                </button>
            </div>

            <form id="my-form" name="my-form" method="POST" enctype="multipart/form-data">


            <div class="modal-body">
                    @csrf


                <input type="hidden" id="edit_id" name="post_id">
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="title_ar">
                                   العنوان باللغة العربية
                                    <span class="text-danger">*</span>



                            </label>
                            <input name="title_ar" class="form-control" id="title_ar">
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
                            <input name="title_he" class="form-control" id="title_he"
                                      ></input>
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
                            <input class="form-control image" type="file" name="avatar"  onchange="readURL(this)" id="post_image">
                            <div class="invalid-feedback">
اضافة صورة
                            </div>
                        </div>


                        <div class="w-50 text-center">


                            <img id="img-preview" src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" width="250px" />
                        </div>

                    </div>



                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="url">
                                   الرابط
                                    <span class="text-danger">*</span>




                            </label>
                            <input type="text" name="url" class="form-control" id="url"
                                   aria-describedby="emailHelp" placeholder="" required>
                            <div class="invalid-feedback">
                                اضف رابط المنشور
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create"><i class="fa fa-paper-plane">تاكيد</i>



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
