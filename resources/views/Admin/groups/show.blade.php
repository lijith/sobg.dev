@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ $group['name'] }} Group
@stop


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          {{ $group['name'] }} Group
      </header>
      <div class="panel-body">
      	<div class="row">
					<div class="col-md-8">
					    <strong>Permissions:</strong>
					    <ul>
					    	@foreach ($group->getPermissions() as $key => $value)
					    		<li>{{ ucfirst($key) }}</li>
					    	@endforeach
					    </ul>
					</div>
					<div class="col-md-4">
						<a class="btn btn-primary" href="{{ route('sentinel.groups.edit', array($group->hash)) }}">Edit Group</a>
					</div> 
				</div><!-- /.row -->

      </div>
    </section>
  </div>

</div> 
 


@stop
