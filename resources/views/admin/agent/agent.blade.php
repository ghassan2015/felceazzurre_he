



@extends('layouts.admin')

@section('title','الوكلاء')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <span class="fas fa-categories" style="font-size: 20px;">عرض كافة الوكلاء</span>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">

                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary font-weight-bolder add_category">
											<span class="svg-icon svg-icon-md">

											</span>اضافة وكيل جديد</button>
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="width: 100%;">


                    <!--begin: Datatable-->
                    <table class="table table-bordered yajra-datatable">


                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف او الجوال</th>
                            <th>العمليات</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>




@include('admin.agent.js.js')
    @include('admin.agent.Modal.add')
    @include('Shared.delete')
    @include('admin.agent.Modal.edit')





@endsection

