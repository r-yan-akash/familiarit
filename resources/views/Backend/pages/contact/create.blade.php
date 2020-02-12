@extends('Backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-header"><h3>Add Brand</h3></div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea class="form-control" name="description" cols="80" rows="8" placeholder="text here.."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Add brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
