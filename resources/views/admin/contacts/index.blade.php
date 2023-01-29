@extends('layouts.admin')

@section('title','طلبات التواصل')
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <span class="fas fa-categories" style="font-size: 20px;">عرض كافة طلبات التواصل</span>
            </div>

		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الاسم</th>
						<th>البريد</th>
						<th>رقم الهاتف</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contacts as $contact)
					<tr>
						<td>{{$contact->id}}</td>
						<td>{{$contact->name}}</td>
						<td>{{$contact->email}}</td>
						<td>{{$contact->phone}}</td>
						<td style="width: 180px;">

							<a href="{{route('admin.contacts.show',$contact)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-eye "></span> عرض
							</span>
							</a>
							@if(auth()->user()->has_access_to('delete',$contact))
							<form method="POST" action="{{route('admin.contacts.destroy',$contact)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$contacts->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
