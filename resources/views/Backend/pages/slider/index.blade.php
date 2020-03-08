
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
        <div class="add_btn text-right pr-5">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#addSlider">Add service</button>
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
                <tbody id="all_slider">
                @foreach($sliders as $key=>$slider)
                    <tr class="slider-row-{{$slider->id}}">
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{++$key}}</td>
                        <td class="title-row-{{$slider->id}}">{!!  substr(strip_tags($slider->title), 0, 10) !!}...</td>
                        <td>{{$slider->motion}}</td>
                        <td class="desc-row-{{$slider->id}}">{!!  substr(strip_tags($slider->description), 0, 10) !!}...</td>
                        <td>{!!  substr(strip_tags($slider->link1), 0, 10) !!}...</td>
                        <td>{!!  substr(strip_tags($slider->link1), 0, 10) !!}...</td>
                        <td><img class="img-row-{{$slider->id}}" style="width: 80px; height: 80px; object-fit: cover" src="{{asset($slider->image)}}" alt=""></td>
                        <td>
                            <button style="cursor:pointer;" slider-id="{{$slider->id}}" class="btn btn-default btn-xs m-r-5 view_slider" onclick="viewSlider({{$slider->id}})"><i class="fa fa-eye"></i></button>
                            <button style="cursor:pointer;" class="btn btn-default btn-xs m-r-5 edit_slider" slider-id="{{$slider->id}}" onclick="editSlider({{$slider->id}})"><i class="fa fa-edit"></i></button>
                            <button  class="btn btn-default btn-xs m-r-5 delete_slider" delete-id="{{$slider->id}}"><i style="cursor: pointer" class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--- add-slider-Modal-show -->
    <div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <form class="form-horizontal" enctype="multipart/form-data" id="addForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="addTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Motion</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="motion" id="addMotion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">link-1</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="link1" id="addLink1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">link-2</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="link2" id="addLink2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" maxlength="300" rows="4" placeholder="Description..." class="form-control" id="addDesc"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">link-2</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="addImage">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info text-right" type="submit" id="addSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end-add-Modal-show -->

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
                                <button class="btn btn-info text-right" id="editSubmit">Submit</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Preview</label>
                            <div class="col-sm-10">
                                <img style="width: 150px; height: 150px; object-fit: cover" src="" alt="" id="oldImg" >
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        {{--    add-slider--}}
            $('#addForm').on('submit',function (e) {
            e.preventDefault();
            let sliderTitle= $('#addTitle').val();
            let sliderMotion= $('#addMotion').val();
            let sliderLink1= $('#addLink1').val();
            let sliderLink2= $('#addLink2').val();
            let sliderDesc= $('#addDesc').val();
            let sliderImg = document.getElementById('addImage').files[0];


            let data=new FormData();
            data.append('title',sliderTitle);
            data.append('motion',sliderMotion);
            data.append('link1',sliderLink1);
            data.append('title2',sliderLink2);
            data.append('description',sliderDesc);
            data.append('image',sliderImg);
            data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                type:"POST",
                url:"slider/add/",
                processData: false, contentType: false,
                data:data,

                success:function (response) {
                    let newSlider = `<tr class="slider-row-${response}">
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td> ${response} </td>
                        <td class="title-row-${response}"> ${sliderTitle} </td>
                        <td class="icon-row-${response}"> ${sliderMotion} </td>
                        <td class="desc-row-${response}"> ${sliderDesc} </td>
                        <td class="link1-row-${response}"> ${sliderLink1} </td>
                        <td class="link2-row${response}"> ${sliderLink2} </td>
                        <td> <img class="img-row-${response}" style="width: 80px; height: 80px; object-fit: cover" src="${window.URL.createObjectURL(sliderImg)}" alt=""> </td>
                        <td>
                            <button slider-id="${response}" onclick="viewSlider(${response})"
                                    class="btn btn-default btn-xs m-r-5 view_services"><i class="fa fa-eye"></i></button>
                            <button slid-id="${response}" class="btn btn-default btn-xs m-r-5 edit_service"
                                    onclick="editSlider(${response})"><i class="fa fa-edit"></i></button>
                            <button  data-toggle="modal" onclick="deleteSlider(${response})"
                                     class="btn btn-default btn-xs m-r-5 delete_services">
                                <i style="cursor: pointer" class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>`;
                    $('#all_slider').append(newSlider);
                    $('#addSlider').modal('hide');
                    $('#addForm')[0].reset()

                    toastr["success"]("New Slider added!")
                }
            });
        });
        {{--   end-add-slider--}}

        <!--end-Modal-show -->
        $('.view_slider').on('click', function () {
            let id = this.getAttribute('slider-id');
            // console.log(id);

        });

        function  viewSlider(id) {
            $.ajax({
                url: '/single-slider',
                type: "post",
                data: { _token: "{{ csrf_token() }}", id:id},
                success: function(response){
                    $('#showModal').modal('show');
                    $('#slider_body').html("<img style='width: 100%; height: 350px; object-fit: cover' src='"+ response.image+"' /> <h3 class='mt-2'>"+response.title+"</h3> <p class='mt-1'> "+response.description+"</p> ")
                }
            });
        }

        function editSlider(id){
            $.ajax({
                type:"GET",
                cache:false,
                url:"/slider/edit/",
                data:{id : id},
                success: function (response) {
                    $('#editModal').modal('show');
                    $('#editTitle').val(response.title);

                    // check if html
                    let desc = response.description;
                    if ( desc.search('<') !== -1){
                        $('#editDesc').val($(desc).text());
                    }
                    else{
                        $('#editDesc').val(desc);
                    }
                    $('#oldImg').attr('src', response.image);
                    document.getElementById('editSubmit').setAttribute('onclick', 'updateSlider('+id+')');
                }
            });
        }

//      update slider
        function updateSlider(id){

            let editTitle = $('#editTitle').val();
            let editDesc = $('#editDesc').val();
            let data = new FormData();
            data.append('id', id);
            data.append('title', editTitle);
            data.append('description', editDesc);
            let img = document.getElementById('editImage').files[0];

            if (img){
                data.append('image', img);
            }
            data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                type:"POST",
                url:"/slider/update/",
                processData: false, contentType: false,
                data:data,
                success: function (response) {
                    toastr["success"]("Data has been Updated!");
                    //change real data in table
                    $('.title-row-'+id).text(editTitle);
                    $('.desc-row-'+id).text(editDesc);
                    if (img){
                        $('.img-row-'+id).attr('src', window.URL.createObjectURL(img));
                    }

                    $('#editModal').modal('hide');


                }
            });
        }
        // delete slider
        $('.delete_slider').on('click', function(){
            let id = $(this).attr("delete-id");
            $.ajax({
                type:"GET",
                cache:false,
                url:"slider/delete/",
                data:{id:id},
                success: function (response) {
                    console.log(response);
                    // slider remove
                    $('.slider-row-'+id).remove();
                    // notification
                    toastr["success"]("Data has been deleted!")
                }
            });
        })
    </script>


@endsection
