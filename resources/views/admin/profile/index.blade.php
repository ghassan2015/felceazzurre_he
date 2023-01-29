@extends('layouts.admin')
@section('title','تغير المعلومات الشخصية')
@section('content')
@include('admin.profile.information_account')
@stop
@section('js')
    <script>
        $('#form').validate({
            errorClass: "error fail-alert",
            validClass: "valid success-alert",
            // initialize the plugin
            rules: {
                'name': {
                    required: true
                },
                'email': {
                    required: true,
                },
                errorClass: "error fail-alert",
                validClass: "valid success-alert",
            }
            ,messages : {
                'name': {
                    required:"الرجاء ادخال الاسم"
                },
                'email':  {
                    required: "الرجاء ادخال الايميل",
                },
            }
        });
    </script>

@endsection
