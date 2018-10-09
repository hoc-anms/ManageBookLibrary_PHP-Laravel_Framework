$('#add').on('click',function () {
    // Fix error 419
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'admin/book/addBook',
        data:{
            _token: $('input[name=_token]').val(),
            b_name:$('input[name=b_name]').val(),
            c_id:$('select[name= c_name]').val(),
            a_id:$('select[name=a_name]').val(),
        },
        success:function (data) {
            console.log(data);
            $('#dataTables-example').append(
                "<tr class='book" + data.b_id + "'>"+
                "<td>" +data.b_id + "</td>"+
                "<td>" + data.b_name + "</td>"+
                "<td>" + data.b_cid+ "</td>"+
                "<td>" + data.b_aid + "</td>"+
                "<td>" + data.created_at + "</td>"+
                "<td><a href='#' class='btn btn-success btn-sm'>Active</a></td>"+
                "<td> <button class='edit-book btn btn-info btn-sm' value='" + data.b_id+ "' ><i class='fa fa-pencil fa-fw'></i>Edit</button> <button class='delete-book btn btn-danger btn-sm' value='" + data.b_id + "' ><i class='fa fa-trash-o  fa-fw'></i>Delete</button></td>"+
                "</tr>"
            );
        }
    })
});

//Process Edit Modal Book
$(document).on('click','.edit-book',function () {
    $('#id').val($(this).data('b_id'));
    $('#update_book').val($(this).data('b_name'));
    $('#cate_update').val($(this).data('b_cid'));
    $('#author_update').val($(this).data('b_aid'));
    $('#edit_book').modal('show');
});
$(document).on('click','#updateBook',function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url: 'admin/book/editBook',
        data:{
            _token: $('input[name=_token]').val(),
            b_id: $('#id').val(),
            b_name:$('#update_book').val(),
            c_id: $('#cate_update').val(),
            a_id:$('#author_update').val(),
        },
        success: function (data) {
            console.log(data);
            $('.book'+data.b_id).replaceWith("" +
                "<tr class='book" + data.b_id + "'>"+
                "<td>" +data.b_id + "</td>"+
                "<td>" + data.b_name + "</td>"+
                "<td>" + data.b_cid+ "</td>"+
                "<td>" + data.b_aid + "</td>"+
                "<td>" + data.created_at + "</td>"+
                "<td><a href='#' class='btn btn-success btn-sm'>Active</a></td>"+
                "<td> <button class='edit-book btn btn-info btn-sm' value='" + data.b_id+ "' ><i class='fa fa-pencil fa-fw'></i>Edit</button> <button class='delete-book btn btn-danger btn-sm' value='" + data.b_id + "' ><i class='fa fa-trash-o  fa-fw'></i>Delete</button></td>"+
                "</tr>"
            );
        },
    });
});


$(document).on('click','.delete-book',function () {
    $('.id_delete').text($(this).data('b_id'));
    $('.id_delete').addClass('hidden');
    $('.book').html($(this).data('b_name'));
    $('#delete_book').modal('show');
});
$(document).on('click','#deleteBook',function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'admin/book/deleteBook',
        data: {
            '_token':$('input[name=_token]').val(),
            'b_id':$('.id_delete').text(),
        },
        success: function (data) {
            console.log('b_id');
            $('.book'+$('.id').text()).remove();
        }
    });
});