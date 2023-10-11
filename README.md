 // $('body').on('click', '#up', function(event) {
            //     event.preventDefault();
            //     var action = $(this).data('action');
            //     console.log(action);

            // });

            // $('body').on('click', '#up', function(event) {
            //     event.preventDefault();

            //     var action = $(this).data('action');
            //     $('#example2').hide();
            //     $('#ajaxView').show();
            //     $("#user-list").html('');

            //     if (action == 'asc') {
            //         var orderBy = 1;
            //     } else if (action == 'desc') {
            //         var orderBy = 2;

            //     }


            //     $.ajax({
            //         url: "{{ url('admin/category/orderby-users') }}",
            //         type: "POST",
            //         data: {
            //             order_by: orderBy,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         dataType: 'json',
            //         success: function(result) {
            //             $.each(result.orderby, function(key, value) {
            //                 var content = '';
            //                 for (i = 0; i < 1; i++) {
            //                     content += `
        //                     <tr>
        //                         <td scope="row">${value.id}</td>
        //                         <td>${value.name}</td>
        //                         <td>${value.slug}</td>
        //                         <td>${value.created_at}</td>
        //                         <td>
        //                             <a class="btn btn-danger" id="editCompany" data-toggle="modal"
        //                                 data-target='#practice_modal' data-id="{{ $item->id }}">View</a>
        //                             <a name="" id="" class="btn btn-primary"
        //                                 href="{{ route('editCategory', ['id' => $item->id]) }}"
        //                                 role="button">Edit</a>
        //                             <a name="" id="" onclick="return confirm('Are you sure?')"
        //                                 class="btn btn-success"
        //                                 href="{{ route('deleteCategory', ['id' => $item->id]) }}"
        //                                 role="button">Delete</a>
        //                         </td>
        //                     </tr>
        //                     `
            //                 }


            //                 $('#user-list').append(content);
            //             });
            //         }
            //     });
            // });

            // $("select#form_select").change(function() {
            //     var selectedNumbe = $(this).children("option:selected").val();
            //     alert("You have selected the country - " + selectedNumbe);

            // });


            <!-- vấn đề là thêm bảng role để phân quyền admin cho dễ và chuyên nghiệp -->