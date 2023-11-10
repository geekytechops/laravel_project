<?php

namespace App\Http\Controllers;
use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $formSubmitted=false;
        $data=[
            'name' => '',
            'email' => '',
            'password' => '',
            'loginpage'=>0,
            'formSubmitted'=>$formSubmitted
            
        ];
        return view('pages.index',$data);
    }

    public function store(Request $request)
    {
        $formSubmitted=false;
        if ( empty($request['name']) || empty($request['email']) || empty($request['password'])) {
            $formSubmitted=true;
            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'loginpage' => 0,
                'formSubmitted'=>$formSubmitted
            ];
            return view('pages.index', $data);
        } else {
            Index::createRecord($request->all());
            $data=[
                'name' => '',
                'email' => '',
                'password' => '',
                'loginpage'=>0,
                'formSubmitted'=>$formSubmitted,
                'success'=>1
            ];
            return view('pages.index', $data);
        }
    }


    public function login(){

        $data=[
            'loginpage'=>1
        ];
        return view('pages.index',$data);

    }

    public function logincheck(Request $request){
        $indexModel=new Index();
        $data=['email'=>$request['email'],'password'=>$request['password']];
        $response=$indexModel->loginCheckUser($data);
        return view('pages.index',compact('response'));
    }
}
