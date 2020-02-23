
@extends('Backend.layouts.master')

@section('content')
    <section class="content-header">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-top: 10px;">Quote</h1>
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
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>reference</th>
                    <th>reference2</th>
                    <th>reference3</th>
                    <th>....</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quotes as $key=>$quote)
                    <tr>
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{!!  substr(strip_tags($quote->title), 0, 10) !!}...</td>
                        <td>{{$quote->mobile}}</td>
                        <td>{!!  substr(strip_tags($quote->email), 0, 10) !!}...</td>
                        <td>{!!  substr(strip_tags($quote->description), 0, 10) !!}...</td>
                        <td>{!!  substr(strip_tags($quote->document), 0, 10) !!}...</td>
                        <td>{{$quote->reference1}}</td>
                        <td>{{$quote->reference2}}</td>
                        <td>{{$quote->reference3}}</td>
                        <td>
                            <!--button-show -->
                            <button data-toggle="modal" data-target="#showModal{{$quote->id}}"
                                    data-title="{{$quote->title}}"
                                    data-mobile="{{$quote->mobile}}"
                                    data-email="{{$quote->email}}"
                                    data-description="{!! $quote->description !!}"
                                    data-document="{!! $quote->document !!}"
                                    data-reference1="{!! $quote->reference1 !!}"
                                    data-reference2="{!! $quote->reference2 !!}"
                                    data-reference3="{!! $quote->reference3 !!}"
                                    class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button>
                            <!--end-button-show -->
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i style="cursor: pointer" class="fa fa-pencil font-14"></i></button>
                            <a href="#deleteModal{{$quote->id}}" data-toggle="modal" class="btn btn-default btn-xs m-r-5"><i style="cursor: pointer" class="fa fa-trash font-14"></i></a>
                            <!-- Modal delete-->
                            <div class="modal fade" id="deleteModal{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{!! route('quote.destroy',$quote->id) !!}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-Modal-delete -->

                            <!-- Modal show-->
                            <div class="modal fade" id="showModal{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 style="color: #0b0b0b" id="title"></h4><br>
                                            <p id="email"></p>
                                            <p id="mobile"></p>
                                            <b id="description"></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-Modal-show -->

                            <!--script-for-show -->
                            <script>
                                $('#showModal{{$quote->id}}').on('show.bs.modal', function (event) {
                                    var button = $(event.relatedTarget) ;
                                    var title = button.data('title');
                                    var mobile = button.data('mobile');
                                    var email = button.data('email');
                                    var description = button.data('description');
                                    var document = button.data('document');
                                    var reference1 = button.data('reference1');
                                    var reference2 = button.data('reference2');
                                    var reference3 = button.data('reference3');
                                    // alert(title);
                                    var modal = $(this);
                                    // modal.find('.modal-title').text(title1);
                                    modal.find('.modal-body #title' ).text(title);
                                    modal.find('.modal-body #mobile').text(mobile);
                                    modal.find('.modal-body #email').text(email);
                                    modal.find('.modal-body #description').text(description);
                                    modal.find('.modal-body #document').text(document);
                                    modal.find('.modal-body #reference1').text(reference1);
                                    modal.find('.modal-body #reference2').text(reference2);
                                    modal.find('.modal-body #reference3').text(reference3);
                                })
                            </script>
                            <!--end-script-for-show -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection

