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
        <h2>Author manage</h2>
        <div></div>
        <table class="table table-hover table-striped table-bordered table-sm" style="background-color: white" id="dataTables-example">
            <thead>
            <tr>
                <td colspan="7"> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#create_author"><i
                                class="fa fa-plus">&nbsp;</i>Add Author</a></td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            {{ csrf_field() }}
            <?php $n=1; ?>
            <tbody id="get_author">
                @foreach($author as $value)
                    <tr class="author{{$value->a_id}}">
                        <td>{{$n++}}</td>
                        <td>{{$value->a_name}}</td>
                        <td>{{$value->created_at}}</td>
                        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                        <td>
                            <button   class="edit-modal btn  btn-info btn-sm" data-a_id="{{$value->a_id}}" data-a_name="{{$value->a_name}}" ><i class="fa fa-pencil fa-fw"></i>Edit</button>
                            <button   class="delete-modal btn  btn-danger btn-sm" data-a_id="{{$value->a_id}}" data-a_name="{{$value->a_name}}"><i class="fa fa-trash-o  fa-fw"></i>Delete</button>
                        </td>
                    </tr>

                 @endforeach
            <!--        <tr>-->
            <!--            <td>1</td>-->
            <!--            <td>Truyện Ngắn</td>-->
            <!--            <td>Root</td>-->
            <!--            <td><a href="#" class="btn btn-success btn-sm">Active</a></td>-->
            <!--            <td>-->
            <!--                <a href="#" class="btn btn-info btn-sm">Edit</a>-->
            <!--                <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
            <!--            </td>-->
            <!---->
            <!--        </tr>-->
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="create_author" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Authors</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="author-form" onsubmit="return false">
                        <div class="form-group">
                            <label>Authors Name</label>
                            <input type="text" class="form-control" name="a_name" id="a_name"  placeholder="Enter Author name" >
                            <small id="author_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_author">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    {{--modal edit --}}

    <div class="modal fade" id="edit_author" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Author Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="id">ID</label><br>
                            <input type="text" class="form-control" name="id" id="id" disabled/><br>
                            <label for="a_name">Author Name</label>
                            <input type="text" class="form-control" name="update_author" id="update_author" aria-describedby="emailHelp" placeholder="Edit Author">
                            <small id="updateErrorAuthor" class="form-text text-muted"></small>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success " id="updateAuthor" name="updateAuthor">Update Author</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{--Modal delete author name--}}
    <div class="modal fade" id="delete_author" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            Are You sure want to delete <span class="a_name"></span>?
                          <span class=" id hidden"></span>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success " id="deleteAuthor" name="deleteAuthor">Delete Author</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
