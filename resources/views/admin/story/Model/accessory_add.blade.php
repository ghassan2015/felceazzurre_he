<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="text-align: right">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">@lang('admin.Add Category')</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h5 style="color: #0c0e1a">&times;</h5></span>
                </button>
            </div>

            <form class="needs-validation "  action="{{route('admin.product.storeAccessory',$product->id)}}" method="POST" >

                <div class="modal-body">
                    @csrf
                    <div id="kt_repeater_1">
                        <div class="form-group row">
                            <div data-repeater-list="group" class="col-lg-10">
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-lg-4">
                                        <label>@lang('admin.product_name')
                                            <span class="text-danger">*</span>

                                        </label>
                                        <input type="text" class="form-control" placeholder="" value="{{$product->name}}" readonly />
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="category_id">
                                            <h4>   @lang('admin.Accessory_name')
                                                <span class="text-danger">*</span>
                                            </h4>

                                        </label>
                                        <br>


                                        <select class="form-control kt_select2_1"  name="Accessory_id">

                                            <option value=''>@lang('admin.select')</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>@lang('admin.price')
                                            <span class="text-danger">*</span>

                                        </label>
                                        <input name="price" type="text" class="form-control" placeholder="" />
                                        <div class="d-md-none mb-2"></div>
                                    </div>

                                    <div class="col-md-2">
                                        <label>@lang('admin.Delete Products'):</label>

                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                            <i class="la la-trash-o"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                    <i class="la la-plus"></i>Add</a>
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-paper-plane"
                                                                               aria-hidden="true"></i></span>
                           @lang('admin.submit')

                        </button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-window-close" aria-hidden="true"></i>
                            @lang('admin.cancel')
                        </button>
                    </div>
            </form>
        </div>
        </div>
    </div>

