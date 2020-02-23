
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
                    <tr>
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
                            <button data-toggle="modal" data-target="#showModal{{$singleService->id}}"
                                    data-title="{{$singleService->title}}"
                                    data-icon="{!! $singleService->icon !!}"
                                    data-description="{!! $singleService->description !!}"
                                    class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button>

                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                            <a href="#deleteModal{{$singleService->id}}" data-toggle="modal" class="btn btn-default btn-xs m-r-5"><i style="cursor: pointer" class="fa fa-trash font-14"></i></a>


                            <!---Modal-show -->
                            <div class="modal fade" id="showModal{{$singleService->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <h4 id="title_id"></h4><br>
                                          <p id="icon"></p>
                                          <spen id="description"></spen>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-Modal-show -->

                            <script>
                                $('#showModal{{$singleService->id}}').on('show.bs.modal', function (event) {
                                    var button = $(event.relatedTarget) ;
                                    var title1 = button.data('title');
                                    var icon1 = button.data('icon');
                                    var description = button.data('description');
                                    // alert(title);
                                    // alert(icon);
                                    // alert(description);
                                    var modal = $(this);
                                    // modal.find('.modal-title').text(title1);
                                    modal.find('.modal-body #title_id' ).text(title1);
                                    modal.find('.modal-body #icon').text(icon1);
                                    modal.find('.modal-body #description').text(description);
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


@endsection
