<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Session;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $data=[
            'quotes'=>Quote::all()
        ];
        return view('Backend.pages.quote.index')->with($data);
    }

    public function create()
    {
        return view('Backend.pages.quote.create');
    }

    public function store(Request $request)
    {
        $quoteData=$this->validation();
//        dd($quoteData);
//        exit();
        if (Quote::create($quoteData)){
            Session::flash('success','Quote added successfully');
            return redirect()->route('quote.index');
        }else{
            Session::flash('error','Something is wrong---!');
            return redirect()->route('quote.create');
        }
    }

    public function show(quote $quote)
    {
        return $quote;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(quote $quote)
    {
        if ($quote->delete()){
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
            'mobile'=>'required|max:15',
            'email'=>'required',
            'description'=>'required|max:1000',
            'document'=>'required',
            'reference1'=>'required',
            'reference2'=>'required',
            'reference3'=>'required',
        ]);
    }
}
