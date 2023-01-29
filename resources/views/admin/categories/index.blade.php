@extends('layouts.admin')
@section('title','الاقسام')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <span class="fas fa-categories" style="font-size: 20px;">عرض كافة التصنيفات</span>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">

					<a href="{{route('admin.categories.create')}}">
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
                            <label>اسم التصنيف:</label>
                            <input name="name" id="title" class="form-control">

                        </div>
                        <div class="col-lg-6">
                            <label>تابع الى اي تصنيف:</label>
                            <select class="form-control select_2 select_category"

                                    id="category_id">

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
                <table class="table table-bordered table-checkable  yajra-datatable" >
				<thead>
					<tr>
                        <th>اسم القسم</th>
                        <th>تابع الى  </th>
						<th>الشعار</th>
{{--                        <th>الحالة</th>--}}
                        <th>تحكم</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
                </div>
			</div>
		</div>

	</div>
</div>
    @include('Shared.delete')
@include('admin.categories.js.js')

@endsection


