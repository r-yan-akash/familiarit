@extends('Backend.layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">Name</th>
                                        <th width="15%">Email</th>
                                        <th width="15%">Mobile</th>
                                        <th width="20%">Location</th>
                                        <th width="10%">Added On</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vendors as $key=> $vendor)
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td>{{ $vendor->name }}</td>
                                            <td>{{ $vendor->email }}</td>
                                            <td>{{ $vendor->phone }}</td>
                                            <td>{{ $vendor->location }}</td>
                                            <td>{{ date('d-m-Y',strtotime($vendor->created_at)) }}</td>
                                            <td>
                                                @if($vendor->status !='rejected')

                                                    <a href="{{ url('admin/vendor/change_to_reject/'.$vendor->id) }}" class="btn btn-warning btn-sm">Reject</a> @endif

                                                <a href="{{ route('admin.vendor.edit',$vendor->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                                <a class="" href="{{ route('admin.vendor.destroy',$vendor->id) }}" onclick="event.preventDefault();
                                                    document.getElementById('vendor-delete-form{{ $vendor->id }}').submit();">
                                                    <i class="fa fa-trash btn btn-danger btn-sm"></i>
                                                </a>
                                                <form id="vendor-delete-form{{ $vendor->id }}" action="{{ route('admin.vendor.destroy',$vendor->id) }}" method="post" style="display: none;">
                                                    {{ csrf_field() }} @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

        </div>
    </section>
@endsection
