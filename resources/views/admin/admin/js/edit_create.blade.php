
<script>
    $("form[name='my-form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: {
                required: true,

            },
            email: {
                required: true,
                email: true,

            },

            phone: {
                required: true,

            },
            password: {
                required: true,
                // min:6,
            },
            role_id: {
                required: true,

            }

        },

        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // var my_form=$('#my-form');
            var data= new FormData(document.getElementById("my-form"));


            $('#send_form').html('Sending..');
            $.ajax({
                url: '{{route('admin.admins.store')}}' ,
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
                                window.location.replace('{{route("admin.admins.index")}}')
                            }
                            ,
                            2000 );

                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.data,
                        })
                    }
                },
                error: function(response) {
                    // Object.keys(response['responseText']).forEach(key => {
                    // });
                    const obj = JSON.parse(response['responseText']);
                    // console.log();

                    jQuery.each(obj.errors, function(key, value){

                        $('.'+key+'_error').show();
                        $('.'+key+'_error').text(value);
                    //
                    });
                }
            });


        }

    });


    $("form[name='edit_admin']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: {
                required:true,

            },
            email: {
                required:true,
                email:true,

            },

            phone:{
                required:true,

            },
            password:{
                // required:true,
                // min:6/
            },
            role_id:{
                required:true,

            }



        },

        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // var my_form=$('#my-form');
            var data= new FormData(document.getElementById("edit_admin"));

            $('#send_form').html('Sending..');
            $.ajax({
                url: '{{route('admin.admins.update')}}' ,
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
                                window.location.replace('{{route("admin.admins.index")}}')
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
                            console.log();
                            //
                            //     // // alert(key);
                            //     // alert(value);
                            //
                            //     jQuery('.alert-danger').show();

                            $('.'+key+'_error').show();
                            $('.'+key+'_error').text(value);
                            //
                        });
                    }

            });


        }


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

</script>
