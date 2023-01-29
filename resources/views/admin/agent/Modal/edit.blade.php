<div class="modal fade" id="edit_agent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">تعديل الوكيل</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h5 style="color: #0c0e1a">&times;</h5></span>
                </button>
            </div>

            <form id="edit-my-form" name="edit-my-form" class="row" enctype="multipart/form-data" method="post" action="javascript:void(0)">

                <div class="modal-body">
                    @csrf

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="edit_name_ar">
                                  الاسم باللغة العربية
                                    <span class="text-danger">*</span>




                            </label>
                            <input type="text" name="name_ar" class="form-control" id="edit_name_ar"
                                   aria-describedby="emailHelp" placeholder="" required>
                            <div class="invalid-feedback">
                                الاسم باللغة العربية                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="edit_name_he">
                                   الاسم باللغة العبرية
                                    <span class="text-danger">*</span>


                            </label>
                            <input type="text" name="name_he" class="form-control" id="edit_name_he"
                                   placeholder="" required>
                            <div class="invalid-feedback">
                               الاسم باللغة العبرية
                            </div>
                        </div>



                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="location_ar">
                                  العنوان باللغة العربية
                                    <span class="text-danger">*</span>


                                <input type="hidden" name="agent_id" class="form-control" id="edit_agent_id">


                            </label>
                            <input type="text" name="location_ar" class="form-control" id="edit_location_ar"
                                   aria-describedby="emailHelp" placeholder="" required>
                            <div class="invalid-feedback">
                               العنوان بالغة العربية
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="location_he">
                                  العنوان باللغة العبرية
                                    <span class="text-danger">*</span>


                            </label>
                            <input type="text" name="location_he" class="form-control" id="edit_location_he"
                                   placeholder="" required>
                            <div class="invalid-feedback">
                                العنوان باللغة العبرية
                            </div>
                        </div>



                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="edit_mobile">
                                  رقم الهاتف او الجوال
                                    <span class="text-danger">*</span>




                            </label>
                            <input type="text" name="mobile" class="form-control" id="edit_mobile"
                                   aria-describedby="emailHelp" placeholder="" required>
                            <div class="invalid-feedback">
                                رقم الهاتف او الجوال
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>



                    </div>









                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary update_agent"><span><i class="fa fa-paper-plane"
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
