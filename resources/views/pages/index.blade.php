@extends('layouts.default')
@section('content')
<div class="row form-div">
    <div class="col-md-12">
      @if(Session::has('success'))
      <div class="alert alert-success">
         {{Session::get('success')}}
      </div>
      @endif
    </div>     
      <div class="col-md-3">
         @if( isset($loginpage) && $loginpage==0)         

         @if(isset($success) && $success==1)
         @section('scripts')
         <script>
            redirectLogin();
         </script>
         @endif

         <form action="{{route('register')}}" method="post">
         @csrf
            <div class="mb-2">
            <input type="text" name='name' class="form-control" placeholder="Name" value="{{$name}}">
            @if( ($formSubmitted) && empty($name))
            <div class="alert alert-danger mt-2">
               Please Enter the Name
               </div>
               @else
               @endif
            </div>
            <div class="mb-2">
            <input type="email" name='email' class="form-control" placeholder="Email Address" value="{{$email}}">
            @if(($formSubmitted) && empty($email))
            <div class="alert alert-danger mt-2">
               Please Enter the Email
               </div>
               @else
               @endif
            </div>
            <div class="mb-2">
            <input type="password" name='password' class="form-control" placeholder="Password" value="{{$password}}">
            @if(($formSubmitted) && empty($password))
            <div class="alert alert-danger mt-2">
               Please Enter the Password
               </div>
               @else
               @endif
            </div>
            <div class="mb-2">
            <input type="submit" name='submit' class="btn btn-primary w-100" value="Submit" >
            </div>
         </form>
         <div class="col-md-12 d-flex justify-content-center">
            <p>Already have a account? </p><b class="ms-2"><a href="/login">Login</a></b>
         </div>
         @else
          <form action="{{route('logincheck')}}" method="post">
         @csrf
            <div class="mb-2">
            <input type="email" name='email' class="form-control" placeholder="Email Address">            
            @if(isset($response) && $response['email_error']==0)
            <div class="alert alert-danger mt-2">
               Email Not Found
               </div>
            @else
            @endif      
            </div>            
            <div class="mb-2">
            <input type="password" name='password' class="form-control" placeholder="Password">            
            @if( isset($response) && $response['email_error']==1 && $response['pass_error']==0)
            <div class="alert alert-danger mt-2">
               Please enter correct Password
               </div>
               @else
            @endif
            </div>
            <div class="mb-2">
            <input type="submit" name='submit' class="btn btn-primary w-100" value="Submit" >
            </div>
         </form>
         <div class="col-md-12 d-flex justify-content-center">
            <p>Don`t have a account? </p><b class="ms-2"><a href="/">Register</a></b>
         </div>
         @endif
      </div>
   </div>
@stop