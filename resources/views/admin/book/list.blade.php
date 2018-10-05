<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/14/2018
 * Time: 9:07 AM
 */
?>

@extends('admin.layouts.header')
@section('content')
    <div class="container">
        <h2>Information book manage</h2>

        <table class="table table-hover table-striped table-bordered table-sm" style="background-color: white" id="dataTables-example">

            <thead>
            <tr>
                <td colspan="7"> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#form_book"><i
                                class="fa fa-plus">&nbsp;</i>Add Book</a></td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Categories</th>
                <th>Author</th>
                <th>Added Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="get_book">
            <?php $n=1; ?>
            @foreach($book as $value)
                <tr >
                    <td>{{$n++}}</td>
                    <td>{{$value->b_name}}</td>
                    <td>{{$value->c_name}}</td>
                    <td>{{$value->a_name}}</td>
                    <td>{{$value->created_at}}</td>
                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                    <td>
                        <button  class="edit-book btn btn-info btn-sm" data-b_id="{{$value->b_id}}" data-b_name="{{$value->b_name}}" data-b_cid="{{$value->b_cid}}" data-b_aid="{{$value->b_aid}}"><i class="fa fa-pencil fa-fw"></i>Edit</button>
                        <button  class="delete-book btn btn-danger btn-sm"  data-b_id="{{$value->b_id}}" data-b_name="{{$value->b_name}}" data-b_cid="{{$value->b_cid}}" data-b_aid="{{$value->b_aid}}"><i class="fa fa-trash-o  fa-fw"></i>Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--Process Modal Add Book--}}

    <div class="modal fade" id="form_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date</label>
                                <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Book Name</label>
                                <input type="text" class="form-control" name="b_name" id="b_name" placeholder="Enter Book Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="c_name" name="c_name" required/>
                            <option value="0">Choose Categories</option>
                            @foreach($cate as $value)
                                <option value="{{$value->c_id}}">{{$value->c_name}}</option>
                                @endforeach

                                </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select class="form-control" id="a_name" name="a_name" required/>
                            <option value="0">Choose Author</option>
                            @foreach($author as $value)
                                <option value="{{$value->a_id}}">{{$value->a_name}}</option>
                                @endforeach
                                </select>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add" name="add">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Processing Book Edit Modal--}}
    <div class="modal fade" id="edit_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id">ID</label><br>
                                <input type="text" class="form-control" name="id" id="id"  disabled/><br>
                                <label>Date</label>
                                <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Book Name</label>
                                <input type="text" class="form-control" name="update_book" id="update_book" placeholder="Enter Book Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="cate_update" name="cate_update" required/>
                            <option value="0">Choose Categories</option>
                            @foreach($cate as $value)
                                <option value="{{$value->c_id}}">{{$value->c_name}}</option>
                                @endforeach

                                </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select class="form-control" id="author_update" name="author_update" required/>
                            <option value="0">Choose Author</option>
                            @foreach($author as $value)
                                <option value="{{$value->a_id}}">{{$value->a_name}}</option>
                                @endforeach
                                </select>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="updateBook" name="updateBook">Update Book</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Process Delete Modal Book--}}
    <div class="modal fade" id="delete_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            Are You sure want to delete <span class="book"></span>?
                            <span class=" id_delete hidden"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success " id="deleteBook" name="deleteBook">Delete Book</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="js/book.js"></script>
@endsection
