@section('scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script>
    $(document).on('click','.ChangeNext',function(event) {
        if (confirm("هل انت متاكد  من تغير حالة المستخدم ؟")) {
            event.preventDefault();
            var status;
            var _this = $(this)
            var ids = _this.attr('data-id');
            if (_this.prop('checked')) {
                status = 1;
            } else {
                status = 0;

            }
            $.ajax({
                url: '{{route('admin.users.updateStatus')}}',
                method: 'POST',
                data: {
                    "id": ids,
                    "status": status,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log('data' + data.status);
                    if (data.status === 201) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            });

                        $('.data-table').DataTable().ajax.reload();
                    }



                },
                error: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('.data-table').DataTable().ajax.reload();

                }


            });


        } else{
            return false;
        }
    });


    table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ajax: {
            url: "{{route('admin.users.getUsers')}}",
            type: 'get',
            "data": function (d) {
                d.mobile = $('#mobile').val();
                d.email = $('#email').val();
                d.account_type=$('#accountType').val();
                d.name = $('#name').val();
                d.start_date=$( ".start_at" ).val();
                d.end_date=$( ".end_at" ).val();
                d.status=$('#status_id').val();

            },

        },

        columns: [
            {data: 'image_user', name: 'image_user'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
        }
    });

    $(document).on('click', '.excel', function (e) {
        e.preventDefault();
        let _url = "{{route('admin.users.excel')}}";
        $('#filter_form').attr('action', _url);
        $('#filter_form').submit();

    });
    $(document).on('click', '.pdf', function (e) {
        e.preventDefault();
        let _url = "{{route('admin.users.pdf')}}";
        $('#filter_form').attr('action', _url);
        $('#filter_form').submit();
    });
    $('#btnFiterSubmitSearch').click(function (e) {
        e.preventDefault();
        $('.data-table').DataTable().draw(true);
    });

    $(document).ready(function () {
        $("form[name='form']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: "required",
                phone: "required",
                email: {
                    required: true,
                    email: true,

                },
                account_type_id: "required",
                country_id: "required",
                city_id: "required",
                id_number: {
                    required: true,
                    number: true,

                },
                pin:{
                    required:true,
                    number: true

                },
                password: {
                    required: {
                        depends: function (elem) {
                            return $('.user_id').val() == null;
                        }

                    },
                },
                balance: {
                    required: true,
                    number: true,

                },
                person_image: {
                    required: {
                        depends: function (elem) {
                            return $('.user_id').val() == null;
                        }
                    },
                },
                id_image: {
                    required: {
                        depends: function (elem) {
                            return $('.user_id').val() == null;
                        }
                    },
                },
                line1: {
                    required: true,

                },
                post_code:{
                    required: true,

                },
                commercial_record_image: {
                    required: {
                        depends: function (elem) {
                            return $('.account_type_id').val() == 1;
                        }

                    },
                    //     extension: "jpg|jpeg|png|ico|bmp"
                    //
                },
            },
            // Specify validation error messages
            messages: {
                name:{
                    required:'الاسم مطلوب',
                } ,

                phone:{
                    required:'رقم الجوال  مطلوب',
                } ,

                account_type_id:{
                    required:'نوع الحساب مطلوب',
                } ,


                email:{
                    required:'الايميل مطلوب',
                    email:"يجب ادخال الايميل بشكل صحيح"
                } ,
                pin:{
                    required:'رقم الايبان الخاص  مطلوب',
                    max:"يجب ادخال 4ارقام",
                    min:'يجب ادخال 4ارقام',
                    number: 'يجب ان يكون من ارقام',

                } ,
                balance:{
                    required:'الرصيدمطلوب',
                    number: 'يجب ان يكون من ارقام',

                },
                country_id:{
                    required:'الدولة مطلوبة',

                },
                post_code:{
                    required:'الرمز البريدي مطلوبة',

                }
                ,
                city_id:{
                    required:'المدينة مطلوبة',

                },
                line1:{
                    required:'العنوان  مطلوبة',

                },

                person_image:{
                    required:'الصورةالشخصية مطلوبة',

                },
                id_image:{
                    required:'صورة الهوية مطلوبة',

                },
                commercial_record_image:{
                    required:'صورة السجل التجاري مطلوب',

                },





            },
            invalidHandler: function (event, validator) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })

                event.preventDefault();
            },

            submitHandler: function (form) {
                form.submit();
            }


        });






        $('.country_id').on('change', function () {
            var country_id = $(this).val();
            var this_country = $(this);
            var next_province = $(this).parent('div').parent('div').next('div').find('.selectpicker');
            var next_provinces_block = $(this).parent('div').parent('div').next('.provinces_block');
            // next_province.empty();

            if (country_id) {
                KTApp.block(next_provinces_block, {
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'success',
                    message: '@lang("انتظرلحظات")...'
                });
                $.ajax({
                    url: "{{ URL::to('children_options') }}",
                    type: "POST",
                    data:{
                        'country_id':country_id,
                        '_token':'{{csrf_token()}}'
                    },
                    dataType: "json",
                    success: function (data) {

                        $('select[name="city_id"]').empty();
                        $('.city_id').append('<option value="">اختر </option>');

                        $.each(data, function (key, value) {

                            $('.city_id').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
                KTApp.unblock(next_provinces_block);

            } else {
                console.log('AJAX load did not work');
            }
        });

    $(document).on('change','.account_type_id',function (e) {

        if ($(this).val()==10){
            $('.record').show();
        }else{
            $('.record').hide();
        }
    });




    $(document).on('click', '.delete', function (e) {
        $('#confirmModal').modal('show')
        var user_name = $(this).attr('user_name');
        var ids = $(this).attr('id');
        $('#Delete_id').val(ids);
        $('#Name_Delete').val(user_name);

    });

    $(document).on('click', '.submit', function (e) {
        e.preventDefault();

        $('#confirmModal').modal('hide');

        var ids=   $('#Delete_id').val();
        $.ajax({
            url: '{{route('admin.users.delete')}}',
            method: 'POST',
            data: {
                "id": ids,
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                if (data.status === 201) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('.data-table').DataTable().ajax.reload();
                }



            },
            error: function (data) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                });
                $('.data-table').DataTable().ajax.reload();

            }


        });




    });

    });
    function readURL(input) {
        console.log(input.files);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".img-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".id_image").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLRecord(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".image_commercial_record_image").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.select_2').select2({
        'dir':'rtl',
        'width':'100%'
    });

    $(document).on('change','.document_type_id',function (e){
        var document_type_id=$(this).val();
        $('.image_id_row').show();
        $('.id_row').show();

        if(document_type_id==13){
            $('.id_number').text('رقم جواز السفر')
            $('.id_image').text('صورة جواز السفر');

        }
        if (document_type_id==14){
            $('.id_number').text('رقم الهوية')
            $('.id_image').text('صورة الهوية');

        }
        if (document_type_id==15){
            $('.id_number').text('رقم الاقامة');
            $('.id_image').text('صورة الاقامة');
        }
    });

</script>
@endsection
