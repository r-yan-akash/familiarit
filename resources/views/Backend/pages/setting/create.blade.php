@extends('Backend.layouts.master')

@section('content')
<div class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.setting') }}" method="post" enctype="multipart/form-data">
                            @method('POST') @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input type="text" name="contact" value="{{ $setting->contact }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" value="{{ $setting->address }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" value="{{ $setting->email }}" class="form-control">
                            </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Pinterest</label>
                            <input type="text" name="pinterest" value="{{ $setting->pinterest }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Instragram</label>
                            <input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control">
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>


            </div>
            </form>

        </div>


    </div>
@endsection






