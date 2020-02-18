@extends('Backend.layouts.master')

@section('content')
    <!-- Main content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="margin-top: 10px;">Setting</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>

                            <li class="breadcrumb-item active">Setting</li>
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
                            <form role="form" action="{{route('setting')}}" method="post" enctype="multipart/form-data">
                                @method('POST') @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Day</label>
                                    <input type="text" name="day" value="{{$setting->day}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact</label>
                                    <input type="text" name="contact_1" value="{{$setting->contact_1}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact-2</label>
                                    <input type="text" name="contact_2" value="{{$setting->contact_2}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" value="{!! $setting->address !!}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email_1" value="{!! $setting->email_1 !!}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email-2</label>
                                    <input type="text" name="email_2" value="{!! $setting->email_1 !!}" class="form-control">
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta</label>
                                <input type="text" name="meta" value="{!! $setting->meta !!}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input type="text" name="fb_id" value="{!! $setting->fb_id !!}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google Analysis</label>
                                <input type="text" name="google_analytics" value="{!! $setting->google_analytics !!}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Pinterest</label>
                                <input type="text" name="pinterest" value="{!! $setting->pinterest !!}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Instragram</label>
                                <input type="text" name="instagram" value="{!! $setting->instagram !!}" class="form-control">
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
@endsection
