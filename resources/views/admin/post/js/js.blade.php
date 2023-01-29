    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function (){
            table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,

                searching: false,
                ajax: {
                    url: "{{route('admin.getPost')}}",
                    type: 'GET',

                },

                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'image', name: 'image'},
                    {data: 'url', name: 'url'},

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
            $('#createNewProduct').click(function () {
                $('#ajaxModel').modal('show');
                $('#title_ar').val('');
                $('#edit_id').val('');
                $('#title_he').val('');
                $('#url').val('');
                $('#post_image').val('');
                let noimage =
                    "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";

                $('#img-preview').attr('src',noimage);
            });
            $(document).on('click', '.edit_post', function () {
                $('#ajaxModel').modal('show');
                var id = $(this).attr('id');
                var Name_ar = $(this).attr('title_ar');
                var Name_he = $(this).attr('title_he');
                var  url= $(this).attr('url');
                $('#title_ar').val(Name_ar);
                $('#edit_id').val(id);
                $('#title_he').val(Name_he);
                $('#url').val(url);


                var image = $(this).attr('image');

                $('#img-preview').attr('src',image);


            });
            $('#saveBtn').on('click',function (e){
                e.preventDefault();
                $('#ajaxModel').modal('hide');
                var data= new FormData(document.getElementById("my-form"));

                $.ajax({
                    url: '{{route('admin.posts.store')}}' ,
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
                                    table.draw();
                                }
                                ,
                                2000 );

                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            })
                        }
                    },
                    error: function(response) {
                        // Object.keys(response['responseText']).forEach(key => {
                        // });
                        const obj = JSON.parse(response['responseText']);


                        jQuery.each(obj.errors, function(key, value){
                            $('.'+key+'_error').show();
                            $('.'+key+'_error').text(value);
                            //
                        });
                    }

                });
            });





            $(document).on('click', '.delete', function (e) {
                var id = $(this).attr('id');
                var title = $(this).attr('title');
                let url="{{route('admin.posts.delete')}}";
                var action = $(this).attr('action',url);
                $('#Delete_id').val(id);
                $('#Name_Delete').val(title);
                $('#confirmModal').modal('show')
            });
            $('.submit_delete').on('click',function (e){
                e.preventDefault();
                $('#confirmModal').modal('hide');

                var data= new FormData(document.getElementById("delete"));
                $.ajax({
                    url: '{{route('admin.posts.delete')}}' ,
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
                            // $('.data-table').DataTable().ajax.reload();
                            setTimeout( function(){
                                    table.draw();
                                }
                                ,
                                2000 );

                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            })
                        }
                    },
                    error: function(response) {
                        // Object.keys(response['responseText']).forEach(key => {
                        // });
                        const obj = JSON.parse(response['responseText']);


                        jQuery.each(obj.errors, function(key, value){
                            $('.'+key+'_error').show();
                            $('.'+key+'_error').text(value);
                            //
                        });
                    }

                });
            });

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

        let noimage =
            "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";

        function readURL(input) {
            console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#img-preview").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $("#img-preview").attr("src", noimage);
            }
        }

    </script>

