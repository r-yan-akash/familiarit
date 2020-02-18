@extends('Backend.layouts.master')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Services</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>

        <div class="ibox-body">
                <form class="form-horizontal" action="{{route('service.store')}}" method="post"
                      enctype="multipart/form-data" id="form-sample-1">
                    @csrf
                    @method('POST')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="icon">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" maxlength="300" id="editor1" rows="4" placeholder="Description..." class="form-control"></textarea>
                        <small style="color: indianred">*Text all most 300 char...</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-info text-right" type="submit">Submit</button>
                    </div>
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
