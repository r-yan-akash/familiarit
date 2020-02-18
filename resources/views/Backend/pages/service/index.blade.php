
@extends('Backend.layouts.master')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Responsive Table</div>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
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
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                  @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
