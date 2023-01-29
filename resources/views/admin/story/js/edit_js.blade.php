@section('js')
    <script src="{{asset('admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

{{--    <script src="{{asset('admin/assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>--}}
    <script src="{{asset('admin/assets/plugins/custom/uppy/uppy.bundle.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/crud/file-upload/uppy.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>

    <script>
        $(document).ready(function () {
           // form repeater jquery
            $('.file-repeater, .contact-repeater, .repeater-default').repeater({
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });

        });

        $(document).on("change", ".attribute", function () {
            var attribute_id = $(this).val();
            let option_id=$(this).next();
            if (attribute_id) {
                $.ajax({
                    url: "{{ URL::to('admin/product/getOption') }}/" + attribute_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        (option_id).empty();
                        $.each(data, function (key, value) {

                            $(option_id).append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('.deleteoption').on("click", function () {
let remove=$(this).parent();
            var delete_option=$(this).find('.delete_option').val();
            var token = '{{csrf_token()}}';
            var result = confirm("Want to delete?");
            if (result) {
                $.ajax({
                    url: "{{route('admin.product.option.delete')}}",
                    type: "POST",
                    data:{
                        'id':delete_option,
                        '_token':token,
                    },
                    dataType: "json",
                    success: function (data) {
remove.hide(500);
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        CKEDITOR.config.extraPlugins = 'youtube';
        CKEDITOR.config.youtube_width = '640';
        CKEDITOR. config.youtube_height = '480';
        CKEDITOR. config.youtube_responsive = true;
        CKEDITOR.config.youtube_autoplay = true;

        CKEDITOR.config.extraPlugins = 'embedbase';
        CKEDITOR.config.extraPlugins = 'embed';
        CKEDITOR.config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
        CKEDITOR.config.language = 'ar';
        $(".descrption_editor").each(function(){
            CKEDITOR.replace( this, {filebrowserImageBrowseUrl: 'laravel-filemanager'});
        });
        $('.kt_select2_1').select2({
            width: '100%',

        });
        var uploadedDocumentMap = {}
        Dropzone.options.dpzMultipleFiles = {
            paramName: "dzfile", // The name that will be used to transfer the file
            //autoProcessQueue: false,
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
            dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
            dictCancelUpload: "الغاء الرفع ",
            dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
            dictRemoveFile: "حذف الصوره",
            dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            }
            ,
            url: "{{ route('admin.products.images.store') }}", // Set the url
            success:
                function (file, response) {
                    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                }
            ,
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            }
            ,
            // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
            init: function () {
                @if(isset($event) && $event->document)
                var files =
                    {!! json_encode($event->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }



        $(function() {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='add_product']").validate({
                // Specify validation rules
                rules: {

                    name_ar: "required",
                    name_he: "required",
                    category_id:"required",
                    ignore: 'input[type=hidden], .kt_select2_1',
                    short_note_he:"required",
                    short_note_ar:"required",
                    brand_id:"required",
                    description_ar:"required",
                    description_he:"required",
                    regular_price: {
                        required: true,
                        number: true
                    },
                    trader_regular_price:{
                        required: true,
                        number: true,
                    },
                    quantity:"required",
                    SKU: "required",
                    'tags_id': {
                        required: true
                    },





                },
                // Specify validation error messages
                messages: {
                    name_ar:'@lang('admin.name_ar')',
                    name_he:'@lang('admin.name_ar')',
                    category_id:'@lang('admin.category_name')',
                    brand_id:'@lang('admin.barnd_name')',
                    short_note_ar:'@lang('admin.short_note_ar')',
                    description_ar:'@lang('admin.description_ar')',
                    description_he:'@lang('admin.description_he')',
                    trader_regular_price:'@lang('admin.trader_regular_price')'
                    ,regular_price:'@lang('admin.regular_price')',
                    quantity:'@lang('admin.quantity')',
                    SKU:'@lang('admin.SKU')',
                    short_note_he:'@lang('admin.short_note_he')',

                    attribute_id:'@lang('admin.attribute')',
                    option_id:'@lang('admin.option')',

                    tags_id:'@lang('admin.tags')',


                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        const el=$(".remove-image")
        el.click(function() {
            var element = $(this);
            var parent_div = $(this).closest(".screen_image_attachment");
            var parent_img = $(this).attr('url');
            var image_id = $(this).attr('id');
            var token = '{{csrf_token()}}';
            var result = confirm("Want to delete?");
            if (result) {
                //Logic to delete the item
                $.ajax({
                    url: "{{route('admin.product.image.delete')}}",
                    type: 'post',
                    data: {
                        "id": image_id,
                        "_token": token,
                    },
                    success: function () {
                        parent_div.hide('slow');
                        console.log("it Works");
                    }
                });
            }
        });
    </script>
@endsection
