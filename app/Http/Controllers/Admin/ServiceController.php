<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data=[
            'service'=>Services::all()
        ];
        return view('Backend.pages.service.index')->with($data);
    }

    public function create()
    {
        return view('Backend.pages.service.create');
    }

    public function store(Request $request)
    {
        $servicesData=$this->validation();
        if (Services::create($servicesData)){
            Session::flash('success','Services added successfully');
            return redirect()->route('service.index');
        }else{
            Session::flash('error','Something is wrong---!');
            return redirect()->route('service.create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(service $service)
    {
        if ($service->delete()){
            Session::flash('success','Delete Successfully');
            return back();
        }else{
            Session::flash('error','Something is Error--!');
            return back();
        }
    }

    private function validation(){
        return request()->validate([
            'title'=>'required|max:50',
            'icon'=>'required',
            'description'=>'required|max:300',
        ]);
    }
}
