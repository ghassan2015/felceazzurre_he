    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function (){


            $(document).on('click', '.delete', function (e) {
                var $id = $(this).attr('id');
                var title = $(this).attr('title');
                $('#Delete_id').val($id);
                $('#Name_Delete').val(title);
                $('#confirmModal').modal('show')
            });


            table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,

                searching: false,
                ajax: {
                    url: "{{route('admin.getSlider')}}",
                    type: 'GET',

                },
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'subtitle', name: 'subtitle'},
                    {data: 'image', name: 'image'},

                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                @if(app()->getLocale()== 'ar')

                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
                }
                @endif
            });


            $("form[name='my-form']").validate({
                // Specify validation rules
                rules: {

                    title_ar: {
                        required:true,

                    },
                    title_en: {
                        required:true,

                    },


                    sub_title_ar: {
                        required:true,

                    },
                    sub_title_en: {
                        required:true,

                    },
                    image: {
                        required: true,
                    },


                },
                // Specify validation error messages
                messages: {
                    title_ar: {
                        "required" :"العنوان الرئيسي  باللغة العربية مطلوب",
                    },

                    title_en: {
                        "required" :"العنوان الرئيسي باللغة العبرية مطلوب",
                    },

                    sub_title_ar: {
                        "required" :"العنوان الفرعي باللغة العربية مطلوب",
                    },

                    sub_title_en: {
                        "required" :"العنوان الفرعي العبرية مطلوب",
                    },


                    image: "الصورة مطلوب",
                },


                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var data= new FormData(document.getElementById("my-form"));
                    data.append('image', $('#image')[0].files[0]);
                    // $('#kt-tinymce-2').triggerSave(true, true);

                    $('#send_form').html('Sending..');
                    $.ajax({
                        url: '{{route('admin.slider.store')}}' ,
                        type: "POST",
                        data: data,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,

                        success: function( response ) {
                            if (response.status==201){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                setTimeout( function(){
                                        window.location.replace('{{route("admin.slider.index")}}')
                                    }
                                    ,
                                    2000 );
                            }else if (response.status==422){
                                jQuery.each(response.error, function(key, value){
                                    $('.'+key+'_error').text(value);
                                });
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response,
                                })
                            }
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response,
                            })
                        }
                    });


                }

            });

            $("form[name='edit-my-form']").validate({
                // Specify validation rules
                rules: {

                    title_ar: {
                        required:true,

                    },
                    title_en: {
                        required:true,

                    },


                    sub_title_ar: {
                        required:true,

                    },
                    sub_title_en: {
                        required:true,

                    },



                },
                // Specify validation error messages
                messages: {
                    title_ar: {
                        "required" :"العنوان الرئيسي  باللغة العربية مطلوب",
                    },

                    title_en: {
                        "required" :"العنوان الرئيسي باللغة العبرية مطلوب",
                    },

                    sub_title_ar: {
                        "required" :"العنوان الفرعي باللغة العربية مطلوب",
                    },

                    sub_title_en: {
                        "required" :"العنوان الفرعي العبرية مطلوب",
                    },


                    // image: "الصورة مطلوب",
                },


                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var data= new FormData(document.getElementById("edit-my-form"));
                    // data.append('image', $('#image').get(0).files[0]);
                    // $('#kt-tinymce-2').triggerSave(true, true);

                    $('#send_form').html('Sending..');
                    $.ajax({
                        url: '{{route('admin.slider.update')}}' ,
                        type: "POST",
                        data: data,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,

                        success: function( response ) {
                            if (response.status==201){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                setTimeout( function(){
                                        window.location.replace('{{route("admin.slider.index")}}')
                                    }
                                    ,
                                    2000 );
                            }else if (response.status==422){
                                jQuery.each(response.error, function(key, value){
                                    $('.'+key+'_error').text(value);
                                });
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response,
                                })
                            }
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response,
                            })
                        }
                    });


                }

            });

            $(document).on('click', '.delete', function (event) {
                event.preventDefault();
                window.$('#confirmModal').modal('show');
                var id = $(this).attr('id');
                var name = $(this).attr('title');
                $('.modal-title').text('حذف السلايدر')
                $('#Delete_id').val(id);
                $('#Name_Delete').val(name);
            });

            $(document).on('click','.submit_delete',function(event) {
                event.preventDefault();

                var ids = $('#Delete_id').val();
                $.ajax({
                    url: '{{route('admin.slider.delete')}}',
                    method: 'POST',
                    data: {
                        "slider_id": ids,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        $('#confirmModal').modal('hide');

                        $('.data-table').DataTable().ajax.reload();
                        if (data.status == 201) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            });

                        } else if (data.status == 302) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });

                        }
                        $('.yajra-datatable').DataTable().ajax.reload();


                    },
                    error: function (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('.yajra-datatable').DataTable().ajax.reload();

                    }


                });




            });
        });
    </script>

