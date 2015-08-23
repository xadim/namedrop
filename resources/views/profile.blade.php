@extends('layouts/style')

@section('content')
  @if(Auth::check())
    <div class="row">
      <div class="col-md-5">
        Projects
      </div>

      <div class="col-md-2">
        Namedrops
      </div>

      <div class="col-md-5">
        Timeline
      </div>
    </div>


  @else
      <div class="alert alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="error"></a>
        {{ Session::get('message')}}
    </div>
  @endif

@stop
