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
            return redirect()->route('services.index');
        }else{
            Session::flash('error','Something is wrong---!');
            return redirect()->route('services.create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(services $service)
    {
        $data=[
            'service'=>$service
        ];
        return view('Backend.pages.service.edit')->with($data);
    }

    public function update(Request $request, services $service)
    {
        if ($this->validation()==true){
            $service->title=$request->title;
            $service->icon=$request->icon;
            $service->description=$request->description;
            if($service->save()){
                Session::flash('success','Update successfully');
                return redirect()->route('services.index');
            }else{
                Session::flash('error','Something is wrong');
                return redirect()->route('services.index');
            }
        }
    }

    public function destroy(services $service)
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
