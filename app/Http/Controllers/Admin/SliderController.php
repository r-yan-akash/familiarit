<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $data=[
            'sliders'=>Slider::all()
        ];
        return view('Backend.pages.slider.index')->with($data);
    }
    public function create()
    {
        return view('Backend.pages.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|min:5|max:25',
           'description' => 'required|min:5|max:255',
           'link1' => 'required',
           'link2' => 'required',
           'image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        $file = $request->image;
        $path = '/backend/uploads/slider/';

        $image = $path.time().'.'.$file->getClientOriginalExtension();
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'link1' =>$request->link1,
            'link2' =>$request->link1,
            'image' =>$image
        ];

        $notification = '';
        $insert = Slider::create($data);
        if ($insert){
            $file->move(public_path().($path), $image);
            $notification = array(
                'message' => 'insert successfully',
                'status' => 'success',
            );
        }
        else{
            $notification = array(
                'message' => 'insert fail',
                'status' => 'warning',
            );
        }
        return back()->with($notification);
    }

    public function show($id)
    {

    }

    public function edit(Request $request)
    {
        //return $request;
        $slider = Slider::where('id', $request->id)->first();
        return $slider;
    }


    public function update(Request $request)
    {

      $oldImg = Slider::where('id', $request->id)->first();


        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
//        if image found
        $file = $request->image;

        if ($file){
            $path = '/backend/uploads/slider/';
            $image = $path.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().($path), $image);
            $data = [
                'image' =>$image
            ];
            if ($oldImg){
                unlink(public_path().$oldImg->image);
            }
        }
        return Slider::where('id', $request->id)->update($data);

    }

    public function destroy($id)
    {
        //
    }

    public function singleSlider(Request $request){
        $slider = Slider::where('id', $request->id)->first();
        return $slider;
    }

    public function delete(Request $request){

//        $delete = Slider::where('id', $request->id)->first();
//        $file=$request->image;
//        if($file){
//            unlink('/backend/uploads/slider/'.$delete->image);
//            return Slider::where('id', $request->id)->delete();
//
//        }else{
//
//            dd('File does not exists.');
//
//        }
//
//        if ($delete){
//            return 'delete successful';
//        }
//        else{
//            return 'delete failed';
//        }
        $old = Slider::where('id', $request->id)->first();
//        Storage::delete( public_path('/backend/uploads/slider/' . $old->image));

//        if image found
        $file = $request->image;

        if ($file){
            $path = '/backend/uploads/slider/';
            $image = $path.time().'.'.$file->getClientOriginalExtension();
            $data = [
                'image' =>$image
            ];
            if ($old){
                unlink(public_path().$old->image);
            }
        }
        return Slider::where('id', $request->id)->delete();
    }

    function add(Request $request){

        $file = $request->image;
        $path = '/backend/uploads/slider/';


        $image = $path.time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().($path), $image);

        $slider = Slider::create([
            'title' => $request->title,
            'motion' => $request->motion,
            'description' => $request->description,
            'link1' =>$request->link1,
            'link2' =>$request->link1,
            'image' =>$image
        ])->id;
        return $slider;

    }

}
