<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>

    $(document).on('click', '#exampleModal', function () {
        // $('#edit_agent').modal('show');
        $('#edit_name_ar').val('');
        $('#edit_name_he').val('');
        $('#edit_location_ar').val('');
        $('#edit_location_he').val('');
        $('#edit_mobile').val('');

    });


    $(document).on('click', '.edit_agent', function () {
        $('#edit_agent').modal('show');
        var Name_ar = $(this).attr('name_ar');
        $('#edit_name_ar').val(Name_ar);
        var Name_he = $(this).attr('name_he');
        $('#edit_name_he').val(Name_he);
        var agent_id = $(this).attr('id');
        $('#edit_agent_id').val(agent_id);

        var location_ar = $(this).attr('location_ar');
        $('#edit_location_ar').val(location_ar);
        var location_he = $(this).attr('location_he');
        $('#edit_location_he').val(location_he);

        var mobile = $(this).attr('mobile');
        $('#edit_mobile').val(mobile);


    });
    $(document).on('click','.update_agent',function(event) {
        event.preventDefault();
        $('#edit_agent').modal('hide');

        var data= new FormData(document.getElementById("edit-my-form"));
        $.ajax({
            url: '{{route('admin.agent.update')}}',
            method: 'POST',
            processData: false,
            contentType: false,

            data:data,
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


    $(document).on('click','.add_agent',function(event) {
        event.preventDefault();
        $('#edit_agent').modal('hide');

        var data= new FormData(document.getElementById("my-form"));
        $.ajax({
            url: '{{route('admin.agent.store')}}',
            method: 'POST',
            processData: false,
            contentType: false,

            data:data,
            success: function (data) {
                $('#exampleModal').modal('hide');
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

    $(document).ready(function (){


        $(document).on('click', '.delete', function (event) {
            event.preventDefault();
            window.$('#confirmModal').modal('show');

            var id = $(this).attr('id');
            var name = $(this).attr('title');
            $('.modal-title').text('حذف الوكيل')
            $('#Delete_id').val(id);
            $('#Name_Delete').val(name);
        });

        $(document).on('click','.submit_delete',function(event) {
            event.preventDefault();

            var ids = $('#Delete_id').val();
            $.ajax({
                url: '{{route('admin.agent.delete')}}',
                method: 'POST',
                data: {
                    "agent_id": ids,
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



        table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,

            searching: false,
            ajax: {
                url: "{{route('admin.getAgent')}}",
                type: 'GET',

            },

            columns: [
                {data: 'name', name: 'name'},
                {data: 'location', name: 'location'},
                {data: 'mobile', name: 'mobile'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            @if(app()->getLocale()== 'ar')

            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
            }
            @endif
        });
        $('#btnFiterSubmitSearch').click(function (e) {
            e.preventDefault();
            $('.data-table').DataTable().draw(true);
        });

        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    });


</script>
