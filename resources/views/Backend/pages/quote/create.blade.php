@extends('Backend.layouts.master')

@section('content')
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
{{--            @if(Session::has('success'))--}}
{{--                <p class="alert alert-success">{{Session::get('success')}}</p>--}}
{{--            @endif--}}
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-top: 10px;">Quote</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Quote</a></li>

                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <div class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <form role="form" action="{{route('quote.store')}}" method="post" enctype="multipart/form-data">
                            @method('POST') @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Document</label>
                                <input type="text" name="document" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reference</label>
                                <input type="text" name="reference1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reference-2</label>
                                <input type="text" name="reference2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reference-3</label>
                                <input type="text" name="reference3" class="form-control">
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" maxlength="300" id="editor1" rows="4" placeholder="Description..." class="form-control"></textarea>
                            <small style="color: indianred">*Text all most 300 char...</small>
                            @error('description')
                            <div class="form-control-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        //                 javascript for text editor
        CKEDITOR.replace( 'editor1' );
        //                    end for text editor
    </script>
@endsection
