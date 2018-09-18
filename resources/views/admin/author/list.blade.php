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
        <table class="table table-hover table-bordered table-sm white">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php $n=1; ?>
            <tbody id="get_author">
                @foreach($author as $value)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$value->a_name}}</td>
                        <td>{{$value->created_at}}</td>
                        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                        <td>
                            <a href="admin/author/edit/" class="btn btn-info btn-sm"><i class="fa fa-pencil fa-fw"></i>Edit</a>
                            <a href="admin/author/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o  fa-fw"></i>Delete</a>
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
@endsection
