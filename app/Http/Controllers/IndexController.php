<?php

namespace App\Http\Controllers;
use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data=[
            'loginpage'=>0
        ];
        return view('pages.index',$data);
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
    public function login(){

        $data=[
            'loginpage'=>1
        ];
        return view('pages.index',$data);

    }

    public function logincheck(Request $request){
        Index::loginCheck($request->all());
        return view('pages.index',$data);
    }
}
