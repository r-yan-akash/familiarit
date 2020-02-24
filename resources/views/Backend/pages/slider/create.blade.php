@extends('Backend.layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-top: 10px;">Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Services</a></li>

                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <div class="ibox-body">
        <form class="form-horizontal" action="{{route('sliders.store')}}" method="post"
              enctype="multipart/form-data" id="form-sample-1">
            @csrf
            @method('POST')
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="form-control-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" maxlength="300" id="editor1" rows="4" placeholder="Description..." class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    <small style="color: indianred">*Text all most 300 char...</small>
                    @error('description')
                    <div class="form-control-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link 1</label>
                <div class="col-sm-10">
                    <input class="form-control @error('link1') is-invalid @enderror" type="text" name="link1" value="{{ old('link1') }}">
                    @error('link1')
                    <div class="form-control-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link 2</label>
                <div class="col-sm-10">
                    <input class="form-control @error('link2') is-invalid @enderror" type="text" name="link2" value="{{ old('link2') }}">
                    @error('link2')
                    <div class="form-control-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                    @error('image')
                    <div class="form-control-feedback">{{$message}}</div>
                    @enderror
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
