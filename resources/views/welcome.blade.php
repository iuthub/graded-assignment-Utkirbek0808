@extends('layouts.initial')

@section('content')
		@if(session()->has('middlewared'))
			<div class="container">
				<div class="text-center">
					<div class="alert alert-warning">
					<h6>{{session()->get('middlewared')}}</h6>
					</div>
				</div>
			</div>
		@endif
		@if(session()->has('success'))
			<div class="container">
				<div class="text-center">
					<div class="alert alert-success">
					<h6>{{session()->get('success')}}</h6>
					</div>
				</div>
			</div>
		@endif
		@if($errors->any())
			<div class="container">
				<div class="alert alert-danger">
					<ul class="list-group text-center">
						@foreach($errors->all() as $error)
							<li class="list-group-item">
								{{ $error }}
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
		        @if(!Auth::check())
            	<a href="/register"><button type="button" class="addBtn3 float-right mx-3 my-3">Register</button></a>
            	<a href="/login"><button type="button" class="addBtn2 float-right my-3">Login</button></a>
            	@else
				<form action="{{ route('logout') }}" method="POST">
                     @csrf
                <button class="addBtn2 float-right mx-5 my-3">Logout</button>
                </form>
                <div class="float-left mx-5 my-3 ">
                	Logged in: {{Auth::user()->name}}
                </div>
            	@endif
       <form action="store-tasks" method="POST">
       	@csrf
            <div id="myDIV" class="header">
              <h2>My To Do List</h2>
              <input type="text" name="name" placeholder="Title...">
              <button type="submit" class="addBtn">Add</button>
            </div>
        </form>


         @if(!Auth::check())  
        <ul id="myUL">
        	@foreach($datas as $data)
            <li>
              <div class="task">
                  {{ $data->name }}
              </div>
              <div class="action">
                  <a href="{{$data->id}}/edit"><i class="fa fa-edit"></i></a>
              </div>
              <div class="action">
              	<a href="{{$data->id}}/delete"><i class="fa fa-trash-alt"></i></a>
              </div>
            </li>
          @endforeach
        </ul>
        @endif
        @if(Auth::check())
        <ul id="myUL">
          @foreach($userdatas as $userdata)
            <li>
              <div class="task">
                  {{ $userdata->name }}
              </div>
              <div class="action">
                  <a href="{{$userdata->id}}/edit"><i class="fa fa-edit"></i></a>
              </div>
              <div class="action">
                <a href="{{$userdata->id}}/delete"><i class="fa fa-trash-alt"></i></a>
              </div>
            </li>
          @endforeach
        </ul>
        @endif

@endsection