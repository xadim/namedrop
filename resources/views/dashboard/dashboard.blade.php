@extends('layouts/style')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <a href="' .  . '"></a>
		  {{ Session::get('message')}}
		</div>
	@endif

	@if (!empty($data))
	    <div class="media">
	      <a class="pull-left" href="#">
	        <img class="media-object" src="{{ $data['photo']}}" alt="Profile image">
	      </a>
	      <div class="media-body">
	        <h4 class="media-heading">{{{ $data['name'] }}} </h4>
	        Your email is {{ $data['email']}}
	      </div>
	    </div>
	    <hr>
	    <a href="{{url('logout')}}">Logout</a>
	@else
		<div class="jumbotron">
		    <h5>{!! Auth::user()->name !!}
		        <img class="media-object" src="{!! $user->photo !!}" alt="{!! $user->name !!}">
		    </h5>
		</div>
	@endif



@stop
