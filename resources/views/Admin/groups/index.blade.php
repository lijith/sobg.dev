@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Groups
@stop


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Create Group
      </header>
      <div class="panel-body">
      	<div class='btn-toolbar'>
            <div class='btn-group'>
                <a class='btn btn-primary' href="{{ route('sentinel.groups.create') }}">Create Group</a>
            </div>
        </div>
      </div>
    </section>
  </div>

</div> 
<hr />
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Groups
      </header>
      <div class="panel-body">
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th>Name</th>
	              <th>Permissions</th>
	              <th>Options</th>
	          </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td><a href="{{ route('sentinel.groups.show', $group->hash) }}">{{ $group->name }}</a></td>
                    <td>
                        <?php
                            $permissions = $group->getPermissions();
                            $keys = array_keys($permissions);
                            $last_key = end($keys);
                        ?>
                        @foreach ($permissions as $key => $value)
                            {{ ucfirst($key) . ($key == $last_key ? '' : ', ') }}
                        @endforeach
                    </td>
                    <td>
                        <button class="btn btn-default" onClick="location.href='{{ route('sentinel.groups.edit', [$group->hash]) }}'">Edit</button>
                        <button class="btn btn-default action_confirm {{ ($group->name == 'Admins') ? 'disabled' : '' }}" type="button" data-token="{{ csrf_token() }}" data-method="delete" href="{{ route('sentinel.groups.destroy', [$group->hash]) }}">Delete</button>
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
