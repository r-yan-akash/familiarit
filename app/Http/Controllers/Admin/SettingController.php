<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index(Request $request)
    {
        if($request->isMethod('post'))
        {
            $settingData=$this->validation();
            $id = 1;
            $setting = Setting::find($id);
            $setting->day = $request->day;
            $setting->contact_1 = $request->contact_1;
            $setting->contact_2 = $request->contact_2;
            $setting->address = $request->address;
            $setting->email_1 = $request->email_1;
            $setting->meta = $request->meta;
            $setting->fb_id = $request->fb_id;
            $setting->google_analytics = $request->google_analytics;
            $setting->pinterest = $request->pinterest;
            $setting->instagram = $request->instagram;

            if ($setting->update()){
                Session::flash('success','Setting Update successfully');
                return redirect('setting');
            }else{
                Session::flash('error','Something is Error...!');
                return redirect('setting');
            }
        }

        $data=[
            'setting'=>Setting::first()
        ];
        return view('Backend.pages.setting.index')->with($data);
    }



    private function validation(){
        return request()->validate([
            'day'=>'required',
            'contact_1'=>'required',
            'contact_2'=>'required',
            'address'=>'required',
            'email_1'=>'required',
            'email_2'=>'required',
            'meta'=>'required',
            'fb_id'=>'required',
            'google_analytics'=>'required',
            'pinterest'=>'required',
            'instagram'=>'required'
        ]);
    }
}
