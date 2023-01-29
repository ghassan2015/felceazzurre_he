@extends('layouts.admin')

@section('title','السلايدر')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <span class="fas fa-categories" style="font-size: 20px;">عرض كافة السلايدرات</span>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">

                            <a href="{{route('admin.slider.create')}}">
					<span class="btn btn-primary">
                        <span class="fas fa-plus"></span> إضافة جديد</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>


                <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="width: 100%;">


                    <table class="table table-bordered yajra-datatable">
                        <thead>



                        <tr>
                            <th width="20%">العنوان</th>
                            <th width="30%">العنوان الفرعي</th>
                            <th width="30%">صورة </th>
                            <th width="20%">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
    @include('Shared.delete')
         @include('admin.slider.js.js')
@endsection
