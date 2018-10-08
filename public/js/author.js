//Process modal add author name
$('#add_author').click(function () {
    var status=false;
    if($('#a_name').val()==""||$('#a_name').val().length<5){
        $('#a_name').addClass('border-danger');
        $('#author_error').html('<span class="text-danger">Please re-enter author name, general author name more than 5 char</span>');
        status=false;
    }else{
        $('#a_name').removeClass('border-danger');
        $('#author_error').html('<span class="text-success">Add Author Name Success</span>');
        status=true;
        $.ajax({
            type: 'POST',
            url: 'admin/author/addAuthor',
            data:{
                '_token':$('input[name=_token]').val(),
                'a_name':$('input[name=a_name]').val()
            },
            success:function (data) {
                $('#dataTables-example').append(
                    "<tr class='author" + data.a_id + "'>"+
                    "<td>" +data.a_id + "</td>"+
                    "<td>" + data.a_name + "</td>"+
                    "<td>" + data.created_at + "</td>"+
                    "<td><a href='#' class='btn btn-success btn-sm'>Active</a></td>"+
                    "<td> <button class='btn btn-info btn-sm' data-a_id='" + data.a_id + "' data-a_name='" + data.a_name + "' ><i class='fa fa-pencil fa-fw'></i>Edit</button> <button class='btn btn-danger btn-sm' data-a_id='" + data.a_id + "' data-a_name='" + data.a_name + "'><i class='fa fa-trash-o  fa-fw'></i>Delete</button></td>"+
                    "</tr>");
            },
        });
        $('#a_name').val('');
    }

});

//Process Modal Edit Author
$(document).on('click','.edit-modal',function () {

    $('#id').val($(this).data('a_id'));
    $('#update_author').val($(this).data('a_name'));
    $('#edit_author').modal('show');
});
$(document).on('click','#updateAuthor',function () {
    var status=false;
    if($('#update_author').val()==""||$('#update_author').val().length<5){
        $('#update_author').addClass('border-danger');
        $('#updateErrorAuthor').html('<span class="text-danger">Please re-enter author name, general author name more than 5 char</span>');
        status=false;
    }else {
        $('#update_author').removeClass('border-danger');
        $('#updateErrorAuthor').html('<span class="text-success">Update Author Name Success</span>');
        status = true;
        $.ajax({
            type: 'POST',
            url: 'admin/author/editAuthor',
            data: {
                '_token': $('input[name=_token]').val(),
                'a_id': $('#id').val(),
                'a_name': $('#update_author').val()
            },
            success: function (data) {
                $('.author' + data.a_id).replaceWith("" +
                    "<tr class='author" + data.a_id + "'>" +
                    "<td>" + data.a_id + "</td>" +
                    "<td>" + data.a_name + "</td>" +
                    "<td>" + data.created_at + "</td>" +
                    "<td><a href='#' class='btn btn-success btn-sm'>Active</a></td>" +
                    "<td> <button class='btn btn-info btn-sm' data-a_id='" + data.a_id + "' data-a_name='" + data.a_name + "' ><i class='fa fa-pencil fa-fw'></i>Edit</button> <button class='btn btn-danger btn-sm' data-a_id='" + data.a_id + "' data-a_name='" + data.a_name + "'><i class='fa fa-trash-o  fa-fw'></i>Delete</button></td>" +
                    "</tr>"
                );

            }
        });
    }
});
//Process Modal Delete Author Name
$(document).on('click','.delete-modal',function () {
    $('.id').text($(this).data('a_id'));
    $('.id').addClass('hidden');
    $('.a_name').html($(this).data('a_name'));
    $('#delete_author').modal('show');
});
$(document).on('click','#deleteAuthor',function () {
   $.ajax({
     type: 'POST',
     url: 'admin/author/deleteAuthor',
     data: {
         '_token':$('input[name=_token]').val(),
         'a_id':$('.id').text(),
     },
     success: function (data) {
         console.log('a_id');
         $('.author'+$('.id').text()).remove();
     }
   });
});