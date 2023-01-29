
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>

<!-- ✅ SECOND - load jquery validate ✅ -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
    integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<!-- ✅ THIRD - load additional methods ✅ -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
    integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<script>




    $('select[name="category_id"]').on('change', function () {
        // alert('asrr');
        var category_id = $(this).val();
        let locale = '{{ config('app.locale') }}';
        if (category_id) {
            $.ajax({
                url: "{{ route('admin.product.getcategory')}}",
                type: "GET",
                dataType: "json",
                data: {
                    'id': category_id,
                },
                success: function (data) {
                    $('select[name="child_category_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="child_category_id"]').append('<option value="' + value['id'] + '">' + value['title'][locale] + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });





    $("form[name='edit-my-form']").validate({
        rules: {

            title_ar: {
                required:true,

            },
            title_hre: {
                required:true,

            },

            category_id:{
                required:true,
            },
            child_category_id:{
                required:true,

            },



        },
        messages: {
            title_ar: {
                "required" :"الاسم المنتج مطلوب باللغة العربية مطلوب",
            },

            title_he: {
                "required" :"الاسم المنتج مطلوب باللغة العبرية مطلوب",
            },
            child_category_id:{
                "required" :"التصنيف الفرعي للقسم  مطلوب",

            },
            category_id:{
                "required" :"التصنيف الرئيسي  للقسم  مطلوب",

            },
        },

        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var data= new FormData(document.getElementById("edit-my-form"));


            data.append('description_ar', CKEDITOR.instances['description_ar'].getData());
            data.append('description_he', CKEDITOR.instances['description_he'].getData());
            data.append('formula_ar', CKEDITOR.instances['formula_ar'].getData());
            data.append('formula_he', CKEDITOR.instances['formula_he'].getData());
            data.append('fragrance_image', $('#fragrance_image').get(0));

            // data.append('image', $('#image')[0].files[0]);
            // data.append('formula_image', $('#formula_image')[0].files[0]);



            $('#send_form').html('Sending..');
            $.ajax({
                url: '{{route('admin.product.update')}}' ,
                type: "POST",
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,

                success: function( response ) {
                    // alert('test');
                    if (response.status==201){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1000
                        });
                        setTimeout( function(){
                                window.location.replace('{{route("admin.products.index")}}')
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

</script>





