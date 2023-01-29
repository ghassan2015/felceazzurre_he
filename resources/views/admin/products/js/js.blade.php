


{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>--}}

<script>
    $(function () {
        $('#btnFiterSubmitSearch').click(function (e) {
            e.preventDefault();
            $('.yajra-datatable').DataTable().draw(true);
        });
        table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,

            searching: false,
            ajax: {
                url: "{{route('admin.getProduct')}}",
                type: 'GET',
                "data": function (d) {
                    d.name = $('#name').val();
                    d.category_id = $('#category_id').val();
                    d.status = $('#status').val();

                },
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'smell_product', name: 'smell_product'},
                {data: 'name_category', name: 'name_category'},

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



    $(document).on('click', '.delete', function (event) {
        event.preventDefault();
        window.$('#confirmModal').modal('show');

        var id = $(this).attr('id');
        var name = $(this).attr('title');
        $('.modal-title').text('حذف المنتج')
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
            url: '{{route('admin.product.delete')}}',
            method: 'POST',
            data: {
                "product_id": ids,
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
