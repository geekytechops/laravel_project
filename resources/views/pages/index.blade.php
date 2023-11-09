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
         <form action="{{route('store')}}" method="post">
         @csrf
            <div class="mb-2">
            <input type="text" name='name' class="form-control" placeholder="Name">
            </div>
            <div class="mb-2">
            <input type="email" name='email' class="form-control" placeholder="Email Address">
            </div>
            <div class="mb-2">
            <input type="password" name='password' class="form-control" placeholder="Password">
            </div>
            <div class="mb-2">
            <input type="submit" name='submit' class="btn btn-primary w-100" value="Submit" >
            </div>
         </form>
      </div>
   </div>
@stop