{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>

    $(function () {
        $('.select_category').select2({


            dir:'rtl',
            placeholder: "ابحث عن التصنيف التابع له",
            ajax: {
                url: "{{route('admin.categories.search')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{csrf_token()}}",
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }


        });
        table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,

            searching: false,
            ajax: {
                url: "{{route('admin.getCategory')}}",
                type: 'GET',
                "data": function (d) {
                    d.name = $('#title').val();
                    d.category_id = $('#category_id').val();
                    // d.status = $('#status').val();

                },
            },
            columns: [
                {data: 'title', name: 'title',searchable: true},
                {data: 'parent_category', name: 'parent_category',searchable: true},

                {data: 'images', name: 'images'},

                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            @if(app()->getLocale()== 'ar')

            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
            }
            @endif
        });
    });



    // $(document).on('click', '.delete', function (e) {
    //     var $id = $(this).attr('id');
    //     var title = $(this).attr('title');
    //     $('#Delete_id').val($id);
    //     $('#Name_Delete').val(title);
    //     $('#confirmModal').modal('show')
    // });

    $(document).on('click','.change_status',function(event) {
        if (confirm("هل انت متاكد  من تغير حالة التصنيف ؟")) {
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
                url: '{{route('admin.categories.updateStatus')}}',
                method: 'POST',
                data: {
                    "id": ids,
                    "status": status,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    if (data.status == 201) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000
                        });

                    } else if (data.status == 404) {
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


        } else{
            return false;
        }
    });
    $(document).on('click', '.delete', function (event) {
        event.preventDefault();
        window.$('#confirmModal').modal('show');

        var id = $(this).attr('id');
        var name = $(this).attr('title');
        $('.modal-title').text('حذف التصنيف')
        $('#Delete_id').val(id);
        $('#Name_Delete').val(name);
    });
    $('#btnFiterSubmitSearch').click(function (e) {
        e.preventDefault();
        $('.yajra-datatable').DataTable().draw(true);
    });

    $(document).on('click','.submit_delete',function(event) {
        event.preventDefault();

        var ids = $('#Delete_id').val();
        $.ajax({
            url: '{{route('admin.categories.delete')}}',
            method: 'POST',
            data: {
                "id": ids,
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


</script>
