$('#add').on('click',function () {
    // Fix error 419
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'admin/categories/addCategories',
        data:{
            _token: $('input[name=_token]').val(),
            category:$('input[name=category]').val(),
            id:$('select[name=c_parent]').val(),
        },
        success: function (data) {
            $('#dataTables-example').append(
                "<tr class='categories" + data.c_id + "'>"+
                "<td>" +data.c_id + "</td>"+
                "<td>" + data.c_name + "</td>"+
                "<td>" + data.c_parent + "</td>"+
                "<td>" + data.created_at + "</td>"+
                "<td><a href='#' class='btn btn-success btn-sm'>Active</a></td>"+
                "<td> <button class='edit-categories btn btn-info btn-sm' value='" + data.c_id+ "' ><i class='fa fa-pencil fa-fw'></i>Edit</button> <button class='delete-categories btn btn-danger btn-sm' value='" + data.c_id + "' ><i class='fa fa-trash-o  fa-fw'></i>Delete</button></td>"+
                "</tr>"
            );
        },
    });
    $('#category').val('');
    $('#c_parent').val('0');
});

//process edit modal categories
$(document).on('click','.edit-categories',function () {
    $('#id').val($(this).data('id'));
    $('#update_categories').val($(this).data('category'));


    $('#edit_categories').modal('show');
});
$(document).on('click','#updateCategories',function () {
    var status=false;
    if($('#update_categories').val()==""||$('#update_categories').val().length<5){
        $('#update_categories').addClass('border-danger');
        $('#updateErrorCategories').html('<span class="text-danger">Please re-enter categories name, general categories name more than 5 char</span>');
        status=false;
    }else if($('#edit_parent').val()==""){
        $('#edit_parent').addClass('border-danger');
        $('#parentErrorCategories').html('<span class="text-danger">Please re-enter parent</span>');
        status=false;
    }else {
        $('#update_categories').removeClass('border-danger');
        $('#updateErrorCategories').html('<span class="text-success">Update Categories Name Success</span>');
        $('#edit_parent').removeClass('border-danger');
        $('#parentErrorCategories').html('<span class="text-success">Update Parent Success</span>');
        status = true;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'admin/categories/editCategories',
            data: {
                _token: $('input[name=_token]').val(),
                id: $('#id').val(),
                category: $('#update_categories').val(),
                c_id: $('#edit_parent').val(),
            },
            success: function (data) {
                console.log(data);
                $('.categories' + data.c_id).replaceWith("" +
                    "<tr class='categories" + data.c_id + "'>" +
                    "<td>" + data.c_id + "</td>" +
                    "<td>" + data.c_name + "</td>" +
                    "<td>" + data.c_parent + "</td>" +
                    "<td>" + data.created_at + "</td>" +
                    "<td><a href='#' class='btn btn-success btn-sm'>Active</a></td>" +
                    "<td> <button class='edit-categories btn btn-info btn-sm' value='" + data.c_id + "' ><i class='fa fa-pencil fa-fw'></i>Edit</button> <button class='delete-categories btn btn-danger btn-sm' value='" + data.c_id + "' ><i class='fa fa-trash-o  fa-fw'></i>Delete</button></td>" +
                    "</tr>"
                );
            },
        });
    }
});
//Process delete modal categories

$(document).on('click','.delete-categories',function () {
    $('.id').text($(this).data('id'));
    $('.id').addClass('hidden');
    $('.category').html($(this).data('category'));
    $('#delete_categories').modal('show');
});
$(document).on('click','#deleteCategories',function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'admin/categories/deleteCategories',
        data: {
            '_token':$('input[name=_token]').val(),
            'id':$('.id').text(),
        },
        success: function (data) {
            console.log('id');
            $('.categories'+$('.id').text()).remove();
        }
    });
});
