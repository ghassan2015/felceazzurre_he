@extends('layouts.admin')

@section('title','عرض كافة المنتجات')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <span class="fas fa-categories" style="font-size: 20px;">عرض كافة المنتجات</span>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">

                            <a href="{{route('admin.product.create')}}">
					<span class="btn btn-primary">
                        <span class="fas fa-plus"></span> إضافة جديد</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>


                <div class="col-12 p-3" style="overflow:auto">
                    <div class="col-12 p-0" style="width: 100%;">
                        <form id="filter_form" action="" >
                            @csrf
                            <div class="form-group row m-1">
                                <div class="col-lg-6">
                                    <label>اسم المنتج:</label>
                                    <input name="name" id="name" class="form-control">

                                </div>
                                <div class="col-lg-6">
                                    <label>تابع الى اي تصنيف:</label>
                                    <select class="form-control select_2 category_id"

                                            id="category_id">
                                        <option value=""> تصنيف التابع له</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" style="margin: 10px 3px 10px 0px">
                                <div class="col-lg-4">
                                    <button class="btn btn-primary " id="btnFiterSubmitSearch">بحث</button>
                                </div>
                            </div>
                        </form>

                        <div class="card-body">

                        <table class="table table-bordered yajra-datatable">
                        <thead>



                <tr>
                    <th width="20%">اسم المنتج</th>
                    <th width="30%">رائحة المنتج</th>
                    <th width="30%">تصنيف المنتج</th>
                    <th width="10%">صورة المنتج</th>
                    <th width="20%">العمليات</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Shared.delete')

@endsection
@section('scripts')
    @include('admin.products.js.js')

@endsection
