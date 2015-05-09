@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	All Users
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Users
      </header>
      <div class="panel-body">
			    	<div class="table-responsive">
			        <table class="table table-striped table-hover">
			            <thead>
			                <th>User</th>
			                <th>Status</th>
			                <th>Options</th>
			            </thead>
			            <tbody>
			            @foreach ($users as $user)
			                <tr>
			                  <td><a href="{{ action('\App\Http\Controllers\Admin\UserController@show', array($user->hash)) }}">{{ $user->email }}</a></td>
			                  <td>{{ $user->status }} </td>
			                  <td>
			                      <button class="btn btn-default" type="button" onClick="location.href='{{ action('\App\Http\Controllers\Admin\UserController@edit', array($user->hash)) }}'">Edit</button>
			                      @if ($user->status != 'Suspended')
			                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('\App\Http\Controllers\Admin\UserController@suspend', array($user->hash)) }}'">Suspend</button>
			                      @else
			                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('\App\Http\Controllers\Admin\UserController@unsuspend', array($user->hash)) }}'">Un-Suspend</button>
			                      @endif
			                      @if ($user->status != 'Banned')
			                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('\App\Http\Controllers\Admin\UserController@ban', array($user->hash)) }}'">Ban</button>
			                      @else
			                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('\App\Http\Controllers\Admin\UserController@unban', array($user->hash)) }}'">Un-Ban</button>
			                      @endif
			                      <button class="btn btn-default action_confirm" href="{{ action('\App\Http\Controllers\Admin\UserController@destroy', array($user->hash)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
			                  </td>
			              </tr>
			          @endforeach
			          </tbody>
			      </table>
			  </div>
      </div>
    </section>
	</div>
</div>
@stop
