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

    public function edit(Request $request)
    {
        $services=Services::where('id',$request->id)->first();
        return $services;
    }

    public function update(Request $request)
    {
//        return $request->id;
        Services::where('id', $request->id)->update([
           'title' => $request->title,
           'icon' => $request->icon,
           'description' => $request->description,
        ]);

        return 'update successfull';
    }

    public function destroy(Request $request)
    {
        $delete=Services::where('id',$request->id)->delete();
        if ($delete){
            return "Delete successfully";
        }else{
            return "Delete Failed---!";
        }
    }

    public function singleService(Request $request){
        $service=Services::where('id',$request->id)->first();
        return $service;
    }

    private function validation(){
        return request()->validate([
            'title'=>'required|max:50',
            'icon'=>'required',
            'description'=>'required|max:300',
        ]);
    }

    function add(Request $request){
       $service = Services::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ])->id;


        return $service;
    }

}
