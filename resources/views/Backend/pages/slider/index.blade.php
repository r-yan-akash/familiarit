
@extends('Backend.layouts.master')

@section('content')
    <section class="content-header">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-top: 10px;">Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Services</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <div class="ibox-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50px"></th>
                    <th>#</th>
                    <th>Title</th>
                    <th>Motion</th>
                    <th>Description</th>
                    <th>link1</th>
                    <th>link2</th>
                    <th>Image</th>
                    <th>....</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $key=>$slider)
                    <tr>
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{!!  substr(strip_tags($slider->title), 0, 10) !!}...</td>
                        <td>{{$slider->motion}}</td>
                        <td>{!!  substr(strip_tags($slider->description), 0, 10) !!}...</td>
                        <td>{!!  substr(strip_tags($slider->link1), 0, 10) !!}...</td>
                        <td>{!!  substr(strip_tags($slider->link1), 0, 10) !!}...</td>
                        <td><img style="width: 80px; height: 80px; object-fit: cover" src="{{asset($slider->image)}}" alt=""></td>
                        <td>
                            <button style="cursor:pointer;" slider-id="{{$slider->id}}" data-toggle="modal" data-target="#showModal" class="btn btn-default btn-xs m-r-5 view_slider" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button>
                            <button style="cursor:pointer;" class="btn btn-default btn-xs m-r-5 edit_slider" slider-id="{{$slider->id}}"><i class="fa fa-edit"></i></button>
                            <a href="{{url('/slider/delete/'.$slider->id)}}" class="btn btn-default btn-xs m-r-5"><i style="cursor: pointer" class="fa fa-trash font-14"></i></a>



                            <script>
                                $('#showModal{{$slider->id}}').on('show.bs.modal', function (event) {
                                    var button = $(event.relatedTarget) ;
                                    var title = button.data('title');
                                    var motion = button.data('motion');
                                    var description = button.data('description');
                                    var link1 = button.data('link1');
                                    var link2 = button.data('link2');
                                    var image = button.data('image');
                                    // alert(title);
                                    // alert(icon);
                                    // alert(description);
                                    var modal = $(this);
                                    // modal.find('.modal-title').text(title1);
                                    modal.find('.modal-body #title' ).text(title);
                                    modal.find('.modal-body #motion').text(motion);
                                    modal.find('.modal-body #description').text(description);
                                    modal.find('.modal-body #link1').text(link1);
                                    modal.find('.modal-body #link2').text(link2);
                                    modal.find('.modal-body #image').text(image);
                                })
                            </script>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>


    <!--- single view Modal-show -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="slider_body">

                </div>
            </div>
        </div>
    </div>
    <!--end-Modal-show -->

    <!--- edit view Modal-show -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="slider_body">
                    <form class="form-horizontal" enctype="multipart/form-data" id="editForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="editTitle">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" maxlength="300" rows="4" placeholder="Description..." class="form-control" id="editDesc"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="editImage" onchange="document.getElementById('oldImg').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info text-right" type="submit" id="editSubmit">Submit</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Preview</label>
                            <div class="col-sm-10">
                                <img style="width: 150px; height: 150px; object-fit: cover" src="" alt="" id="oldImg" >
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end-Modal-show -->

    <script>
        $('.view_slider').on('click', function () {
            let id = this.getAttribute('slider-id');

            $.ajax({
                url: '/single-slider',
                type: "post",
                data: { _token: "{{ csrf_token() }}", id:id},
                success: function(response){
                    // console.log(response)
                    $('#slider_body').html("<img style='width: 100%; height: 350px; object-fit: cover' src='"+ response.image+"' /> <h3 class='mt-2'>"+response.title+"</h3> <p class='mt-1'> "+response.description+"</p> ")
                }
            });
        });

        // eidt view
        $('.edit_slider').click(function () {
            let id = $(this).attr("slider-id");
            let data = {id : id}; //$_POST['id'] = id(slider-id)
            $.ajax({
                type:"GET",
                cache:false,
                url:"/slider/edit/",
                data:data,
                success: function (response) {
                    console.log(response);
                    $('#editModal').modal('show');
                    $('#editTitle').val(response.title);

                    // remove html tag
                    let desc = $(response.description).text();
                    $('#editDesc').val(desc);
                    $('#oldImg').attr('src', response.image);
                    document.getElementById('editSubmit').setAttribute('update-id', id);
                }
            });
        });

        // edit form submit
        $('#editSubmit').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr("update-id");
            let data = new FormData();
            data.append('id', id);
            data.append('title', $('#editTitle').val());
            data.append('description', $('#editDesc').val());
            data.append('image', document.getElementById('editImage').files[0]);
            data.append('_token', '{{ csrf_token() }}');
            // let data = {
            //     title : $('#editTitle').val(),
            //     description : $('#editDesc').val(),
            //     image : $('#editDesc').val(),
            // };

            $.ajax({
                type:"POST",
                cache:false,
                url:"/slider/update/",
                processData: false, contentType: false,
                data:data,
                success: function (response) {
                    console.log(response);
                    //change real data in table
                }
            });
        })
    </script>


@endsection
