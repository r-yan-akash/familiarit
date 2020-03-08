
@extends('Backend.layouts.master')

@section('content')
    <section class="content-header">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mr-3" style="margin-top: 10px;">Services</h1>

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
                <button class="btn btn-secondary" data-toggle="modal" data-target="#addservice">Add service</button>
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
                <tbody id="all_services">
                @foreach($service as $key=>$singleService)
                    <tr class="service-row-{{$singleService->id}}">
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{++$key}}</td>
                        <td class="row-title-{{$singleService->id}}">{!!  substr(strip_tags($singleService->title), 0, 10) !!}...</td>
                        <td class="row-icon-{{$singleService->id}}">{{$singleService->icon}}</td>
                        <td class="row-desc-{{$singleService->id}}">{!!  substr(strip_tags($singleService->description), 0, 10) !!}...</td>
                        <td>
                            <button data-target="#showModal" data-toggle="modal" service-id="{{$singleService->id}}"
                                    class="btn btn-default btn-xs m-r-5 view_services"><i class="fa fa-eye"></i></button>

                            <button ser-id="{{$singleService->id}}" class="btn btn-default btn-xs m-r-5 edit_service"
                                    data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button  data-toggle="modal" service-id="{{$singleService->id}}" onclick="deleteService({{$singleService->id}})"
                                     class="btn btn-default btn-xs m-r-5 delete_services">
                                <i style="cursor: pointer" class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--- edit view Modal-show -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" id="editForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="editTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="icon" id="editIcon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" maxlength="300" rows="4" placeholder="Description..." class="form-control" id="editDesc"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info text-right" type="submit" id="editSubmit">Submit</button>
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

    {{--    service add model--}}
    <div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" id="addForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="addTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="icon" id="addIcon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" maxlength="300" rows="4" placeholder="Description..." class="form-control" id="addDesc"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info text-right" type="submit"  id="addSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--    end-service add model--}}


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

        function deleteService(id){
            // console.log(id)
            if (confirm('are you sure')){
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
            }
        }

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
                    console.log(response)
                    $('#editModal').modal('show');
                    $('#editTitle').val(response.title);
                    $('#editIcon').val(response.icon);
                    // check if html
                    let desc = response.description;
                    if ( desc.search('<') !== -1){
                        $('#editDesc').val($(desc).text());
                    }
                    else{
                        $('#editDesc').val(desc);
                    }
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
            data.append('icon', $('#editIcon').val());

            data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                type:"POST",
                url:"services/update/",
                processData: false, contentType: false,
                data:data,
                success: function (response) {

                    //change real data in table
                    $('.row-title-'+id).text($('#editTitle').val());
                    $('.row-icon-'+id).text($('#editIcon').val());
                    $('.row-desc-'+id).text($('#editDesc').val());
                    $('#editModal').modal('hide');
                    toastr["success"]("Data has been Updated!")
                }
            });
        });

        // add service
        $('#addForm').on('submit', function (e) {
            e.preventDefault();
            // all data
            let servTitle = $('#addTitle').val();
            let servDesc = $('#addDesc').val();
            let servIcon = $('#addIcon').val();
            let data = new FormData();
            data.append('title', servTitle);
            data.append('icon', servIcon);
            data.append('description', servDesc);
            data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                type:"POST",
                url:"services/add/",
                processData: false, contentType: false,
                data:data,
                success: function (response) {
                    //add real data in table
                    let newService = `<tr class="service-row-${response}">
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td> ${response} </td>
                        <td class="row-title-${response}"> ${servTitle} </td>
                        <td class="row-icon-${response}"> ${servIcon} </td>
                        <td class="row-desc-${response}"> ${servDesc} </td>
                        <td>
                            <button data-target="#showModal" data-toggle="modal" service-id="${response}"
                                    class="btn btn-default btn-xs m-r-5 view_services"><i class="fa fa-eye"></i></button>
                            <button ser-id="${response}" class="btn btn-default btn-xs m-r-5 edit_service"
                                    data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                            <button  data-toggle="modal" onclick="deleteService(${response})"
                                     class="btn btn-default btn-xs m-r-5 delete_services">
                                <i style="cursor: pointer" class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>`;
                    $('#all_services').append(newService);
                    $('#addservice').modal('hide');
                    toastr["success"]("New Service added!")
                }
            });

        })
    </script>




@endsection
