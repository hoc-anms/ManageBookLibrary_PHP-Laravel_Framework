<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/13/2018
 * Time: 5:32 PM
 */
?>

@extends('admin.layouts.header')
@section('content')
    {{--Page Content--}}
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <img class="card-img-top mx-auto" style="width: 40%;" src="" alt="Profile Icon">
                    <div class="card-body">
                        <h4 class="card-title">Profile Info</h4>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Pham Hoc</p>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                        <p class="card-text">Last Login: xxxx-xx-xx</p>
                        <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron" style="width:100%; height: 100%">
                    <h4>Welcome Admin,</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p> Have a nice day!</p>
                            <iframe src="http://free.timeanddate.com/clock/i6e8aau0/n95/szw110/szh110/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98"
                                    frameborder="0" width="110" height="110"></iframe>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mx-auto">
                                <div class="card-body">
                                    <h5 class="card-title">New Orders</h5>
                                    <p class="card-text">Here you can make invoices and create new orders</p>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Here you can manage your categories and you add new parent and sub
                            categories.</p>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#form_categories"><i
                                    class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="" class="btn btn-success"><i class="fa fa-user-edit">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Author</h5>
                        <p class="card-text">Here you can manage your book author style and you add new book author
                            style.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_author"><i
                                    class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="" class="btn btn-success"><i
                                    class="fa fa-user-edit">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Book</h5>
                        <p class="card-text">Here you can manage your book and you add new book .</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_book"><i
                                    class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="" class="btn btn-success"><i
                                    class="fa fa-user-edit">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--/#Page Content--}}

    {{--Form Modal Add Categories--}}

   {{--@include('admin.categories.add');--}}
   @include('admin.author.add');
   @include('admin.book.add');
@endsection

