
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
                            <button slider-id="{{$slider->id}}" data-toggle="modal" data-target="#showModal" class="btn btn-default btn-xs m-r-5 view_slider" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                            <a href="#deleteModal{{$slider->id}}" data-toggle="modal" class="btn btn-default btn-xs m-r-5"><i style="cursor: pointer" class="fa fa-trash font-14"></i></a>



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


    <!---Modal-show -->
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
        })
    </script>


@endsection
