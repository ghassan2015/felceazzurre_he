<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>    <script>


        $(document).on('click', '.delete', function (e) {
            var $id = $(this).attr('id');
            var product_name = $(this).attr('product_name');
            $('#Delete_id').val($id);
            $('#Name_Delete').val(product_name);
            $('#confirmModal').modal('show')
        });
        table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,

            searching: false,
            ajax: {
                url: "{{route('admin.story.getStory')}}",
                type: 'GET',
                "data": function (d) {
                    // d.name = $('#name').val();
                    // d.category_id = $('#category_id').val();
                    // d.status = $('#status').val();

                },
            },
            columns: [
                {data: 'title', name: 'title'},
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

        $('#btnFiterSubmitSearch').click(function (e) {
            e.preventDefault();
            $('.data-table').DataTable().draw(true);
        });
    </script>
