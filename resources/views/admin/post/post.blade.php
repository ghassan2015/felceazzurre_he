@extends('layouts.admin')

@section('title')
    منشورات
@endsection



@section('content')

    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <span class="fas fa-categories" style="font-size: 20px;">عرض كافة المنشورات</span>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">


                            <a class="btn btn-primary font-weight-bolder btn btn-success" href="javascript:void(0)" id="createNewProduct">اضافة منشور جديد</a>

                        </div>
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>



                <div class="card-body">


            <!--begin: Datatable-->
                    <table class="table table-bordered  data-table yajra-datatable">


                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>صورة</th>
                    <th>الرابط</th>
                    <th>العمليات</th>

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
    @include('admin.post.js.js')
    @include('Shared.delete')
        @include('admin.post.Modal.add')
@endsection

