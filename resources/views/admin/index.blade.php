@extends('layouts.admin')
@section('title')
لوحة التجكم الرئيسة-احصائيات
@endsection
@section('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style>
        th:first-child {
            width: 70%;
        }
    </style>
@stop


@section('content')

    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header flex-wrap border-0 pt-6 pb-0">

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body">
            <div id="views" style="height: 250px;"></div>

            <h4>زيارات الصفحات</h4>

            <br>
            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap text-center" >
                <thead>
                <tr class="text-primary">
                    <th class="text-center">عنوان الصفحة</th>
                    <th class="text-center">زيارات الصفحة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pageViews as $val)
                    <tr>
                        <td>{{$val['pageTitle']}}</td>
                        <td>{{$val['visitors']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <h4>انواع المستخدمين</h4>
            <br>
            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap text-center" >
                <thead>
                <tr class="text-primary">
                    <th >نوع المستخدم</th>
                    <th>عدد الجلسات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userTypes as $val)
                    <tr>
                        <td>{{$val['type']}}</td>
                        <td>{{$val['sessions']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>

            <h4>المتصفحات المستخدمة</h4>
            <br>

            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap text-center" >
                <thead>
                <tr class="text-primary">
                    <th>المتصفح</th>
                    <th>عدد الجلسات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($browsers as $key=>$val)
                    <tr>
                        <td>{{$val['browser']}}</td>
                        <td>{{$val['sessions']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        var date=[];
        var vistor=[];
        const data_array = [];
        $.ajax({
            url: "{{ route('admin.analysis') }}",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                new Morris.Line({
                    element: 'views',
                    data:data,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['زيارات الصفحات', 'عدد الزوار']
                });
                // console.log('test'+data);
                //
                // $.each(data, function (index, value) {
                // 	data_array.push({
                // 		y: new Date(value.date).getDate(),
                // 		a:  value.visitors
                // 	})
                // 	// date = value.date;
                // 	// vistor = value.visitors;
                //
                // });

            }

        });
    </script>
@stop
