@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Create Group
@stop


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Create Group
      </header>
      <div class="panel-body">
      	<form method="POST" action="{{ route('sentinel.groups.store') }}" accept-charset="UTF-8">

            <h2>Create New Group</h2>

            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Name" name="name" type="text"  value="{{ Input::old('email') }}">
                {{ ($errors->has('name') ? $errors->first('name') : '') }}
            </div>

            <label for="Permissions">Access Permissions</label>
            <div class="form-group">
                <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                @foreach ($defaultPermissions as $permission)
                    <label class="checkbox-inline">
                        <input name="permissions[{{ $permission }}]" value="1" type="checkbox"
                        @if (Input::old('permissions[' . $permission .']'))
                           checked
                        @endif        
                        > {{ ucwords($permission) }}
                    </label>
                @endforeach
            </div>

            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create New Group" type="submit">

        </form>
      </div>
    </section>
  </div>

</div> 
 


@stop
