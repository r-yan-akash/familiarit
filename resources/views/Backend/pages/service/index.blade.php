
@extends('Backend.layouts.master')

@section('content')
    <section class="content-header">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-top: 10px;">Services</h1>
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
                    <th>Icon</th>
                    <th>Description</th>
                    <th>....</th>
                </tr>
                </thead>
                <tbody>
                @foreach($service as $key=>$singleService)
                    <tr class="service-row-{{$singleService->id}}">
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{!!  substr(strip_tags($singleService->title), 0, 10) !!}...</td>
                        <td>{{$singleService->icon}}</td>
                        <td>{!!  substr(strip_tags($singleService->description), 0, 10) !!}...</td>
                        <td>
                            <button data-target="#showModal" data-toggle="modal" service-id="{{$singleService->id}}"
                                    class="btn btn-default btn-xs m-r-5 view_services"><i class="fa fa-eye"></i></button>

                            <button ser-id="{{$singleService->id}}" class="btn btn-default btn-xs m-r-5 edit_service"
                                    data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button  data-toggle="modal" service-id="{{$singleService->id}}"
                                     class="btn btn-default btn-xs m-r-5 delete_services">
                                <i style="cursor: pointer" class="fa fa-trash font-14"></i></button>

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
                            <!--end-edit-Modal-show -->

                            <!---Modal-show -->
                            <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="servicesBody">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-Modal-show -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!---data-Modal-show -->
    <script>
        $('.view_services').on('click',function () {
            let id= this.getAttribute('service-id');
            // console.log(id);

            $.ajax({
                url:'/single-service',
                cache:false,
                type:"post",
                data:{_token:"{{csrf_token()}}",id:id},

                success:function (response) {
                    // console.log(response)

                    $('#servicesBody').html("<h3>"+response.title+"</h3> <p>"+response.description+"</p>")
                }
            });

        });
        <!---end-data-Modal-show -->

        // delete-services

        $('.delete_services').on('click',function () {
           let id =$(this).attr("service-id")
               // console.log(id)
               $.ajax({
                   type:"GET",
                   cache: false,
                   url: "services/delete/",
                   data:{id:id},
                   success:function (response) {
                       console.log(response)
                       $('.service-row-'+id).remove();
                       toastr["success"]("Data has been deleted!")
                   }
               });
        })

        // edit-service

            $('.edit_service').click(function () {
                let id=$(this).attr("ser-id");
                let data={id:id};
                $.ajax({
                    type:"GET",
                    url:"/services/edit",
                    cache:false,
                    data:data,

                    success:function (response) {
                        $('#editModal').modal('show');
                        $('#editTitle').val(response.title);
                    }
                });
            });

    </script>




@endsection
