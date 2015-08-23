@extends('layouts/style')

@section('content')
  @if(Auth::check())
        
    <!-- ONLY LOGO ON HEADER -->
    <div class="only-logo">
      <div class="navbar">
        <div class="navbar-header">
          <img alt="" src="">
        </div>
      </div>
    </div> 
    <!-- /END ONLY LOGO ON HEADER -->
    <header id="" class="jumbotron">
      <div class="media">
        
        {!! Form::open(//array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')
          ) !!}
        <div id="prefetch">
          {!! Form::text('search-breed', null, array('class' => 'typeahead form-group form-control', 'placeholder' => 'Search for most namedroped...')) !!}
        </div>
        {!! Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) !!}
        {!! Form::close() !!}
        
      </div>
    </header>
        @else
        <div class="alert alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <a href="error"></a>
          {{ Session::get('message')}}
      </div>
  @endif

@stop