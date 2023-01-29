{{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--     aria-hidden="true" style="text-align: right">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h1 class="modal-title" id="exampleModalLabel">@lang('admin.background')</h1>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true"><h5 style="color: #0c0e1a">&times;</h5></span>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <form class="needs-validation" id="form" novalidate action="{{route('admin.slider.storeImage')}}" method="post" enctype="multipart/form-data">--}}

{{--                <div class="modal-body">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group row">--}}
{{--                        <div class="col-lg-6 col-sm-12">--}}
{{--                            <label for="image">--}}
{{--                                <h4>   @lang('admin.Images')--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                </h4>--}}

{{--                            </label>--}}
{{--                            @if(!is_null($backgoundimage))--}}
{{--                                <input class="form-control image" type="file" name="avatar" id="example-tel-input">--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    @lang('admin.image')--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}


{{--                        <div class="w-50 text-center">--}}

{{--                            @if(!is_null($backgoundimage))--}}
{{--                                <img src="{{ asset('assets/images/slider/'.$backgoundimage->image) }}" style="width: 100px"--}}
{{--                                     class="img-thumbnail image-preview" alt="">--}}
{{--                            @else--}}
{{--                                <img src="{{ asset('assets/images/img1.jpg') }}" style="width: 100px"--}}
{{--                                     class="img-thumbnail image-preview" alt="">--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"--}}
{{--                                                                               aria-hidden="true"></i></span>--}}
{{--                           @lang('admin.submit')--}}

{{--                        </button>--}}

{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i--}}
{{--                                class="fa fa-window-close" aria-hidden="true"></i>--}}
{{--                            @lang('admin.cancel')--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
