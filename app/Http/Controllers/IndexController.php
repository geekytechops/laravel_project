<?php

namespace App\Http\Controllers;
use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        Index::createRecord($request->all());

        return redirect()->route('index')->with('success','Student Created Successfully Yaar');

    }
}
