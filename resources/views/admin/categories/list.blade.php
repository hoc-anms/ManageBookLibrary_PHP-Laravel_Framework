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
        <h2>Categories manage</h2>
        <br>
        <div>
            <table class="table table-hover table-striped table-bordered table-sm" style="background-color: white" id="dataTables-example">
                <thead>
                <tr>
                    <th colspan="6"><a href="#" class="btn btn-success " data-toggle="modal" data-target="#add_categories"><i
                                    class="fa fa-plus">&nbsp;</i>Add Categories</a></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Categories</th>
                    <th>Parent</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="get_categories">
                <?php $n=1; ?>
                @foreach($cate as $value)
                    <tr class="categories{{$value->id}}">
                        <td>{{$n++}}</td>
                        <td>{{$value->category}}</td>
                        <td>{{$value->parent}}</td>
                        <td>{{$value->date}}</td>
                        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                        <td>
                            <button  class="edit-categories btn btn-info btn-sm" data-id="{{$value->id}}" data-category="{{$value->category}}" data-parent="{{$value->parent}}"><i class="fa fa-pencil fa-fw"></i>Edit</button>
                            <button  class="delete-categories btn btn-danger btn-sm" data-id="{{$value->id}}" data-category="{{$value->category}}" data-parent="{{$value->parent}}"><i class="fa fa-trash-o  fa-fw"></i>Delete</button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{--Form Modal Add Categories--}}

    <div class="modal fade" id="add_categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categories-form" onsubmit="return false">
                        <div class="form-group">
                            <label>Categories Name</label>
                            <input type="text" class="form-control" name="category" id="category" aria-describedby="emailHelp" placeholder="Enter Categories name" required>
                            <small id="cat_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label >Parent Categories</label>
                            <select class="form-control" id="c_parent" name="c_parent" required>
                                <option value="0">Choose Categories</option>
                                <option value="0">Root</option>
                                @foreach($cate as $value)
                                    <option value="{{$value->id}} ">{{$value->category}}</option>
                                @endforeach
                            </select>
                            <small id="cat_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add" name="add">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    {{--modal edit --}}

    <div class="modal fade" id="edit_categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Categories Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="id">ID</label><br>
                            <input type="text" class="form-control" name="id" id="id"  disabled/><br>
                            <label for="c_name">Edit Categories</label>
                            <input type="text" class="form-control" name="update_categories" id="update_categories" aria-describedby="emailHelp" placeholder="Edit Categories"  required>
                            <small id="updateErrorCategories" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label >Parent Categories</label>
                            <select class="form-control" id="edit_parent" name="edit_parent" required>
                                <option value="">Choose Categories</option>
                                <option value="0">Root</option>
                                @foreach($categories as $value)
                                    <option value=" {{$value->c_id}}">{{$value->c_name}}</option>
                                @endforeach
                            </select>
                            <small id="parentErrorCategories" class="form-text text-muted"></small>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success " id="updateCategories" name="updateCategories">Update Categories</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{--Process Delete Modal Categories--}}
    <div class="modal fade" id="delete_categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            Are You sure want to delete <span class="category"></span>?
                            <span class=" id hidden"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success " id="deleteCategories" name="deleteCategories">Delete Categories</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/categories.js"></script>

@endsection
