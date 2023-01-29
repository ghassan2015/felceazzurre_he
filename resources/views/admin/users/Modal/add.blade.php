<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h5 style="color: #0c0e1a">&times;</h5></span>
                </button>
            </div>

            <form class="needs-validation" id="form" novalidate action="" method="post">

                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="attribute_id" id="attribute_id">
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">

                            <label for="brands_name_ar">
                                <h4>   @lang('admin.name_ar')
                                    <span class="text-danger">*</span>
                                </h4>

                            </label>
                            <input type="text" name="attribute_name_ar" class="form-control" id="attribute_name_ar"
                                   aria-describedby="emailHelp" placeholder="" required>
                            <div class="invalid-feedback">
                                @lang('admin.name_ar')
                            </div>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="attribute_name_ar">
                                <h4>   @lang('admin.name_he')
                                    <span class="text-danger">*</span>
                                </h4>

                            </label>
                            <input type="text" name="attribute_name_he" class="form-control" id="attribute_name_he"
                                   placeholder="" required>
                            <div class="invalid-feedback">
                                @lang('admin.name_he')
                            </div>
                        </div>



                    </div>


                    <div class="form-group row">

                        <div class="col-lg-6 ">
                            <label class="col-form-label"><h4>@lang('admin.status')</h4></label>
                            <div class="col-6">
                            <span class="switch switch-icon">
                                <label>
                                    <input type="checkbox" value="1" checked="checked"/>
                                    <span></span>
                                </label>
                            </span>
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                               aria-hidden="true"></i></span>
                           @lang('admin.submit')

                        </button>

                        <button type="button" class="btn  btn-danger" data-dismiss="modal"><i
                                class="fa fa-window-close" aria-hidden="true"></i>
                            @lang('admin.cancel')
                        </button>
                    </div>
            </form>
        </div>
        </div>
    </div>

