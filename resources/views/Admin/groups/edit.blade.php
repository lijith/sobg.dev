@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Edit Group
@stop


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Edit Group
      </header>
      <div class="panel-body">
      	<form method="POST" action="{{ route('sentinel.groups.update', $group->hash) }}" accept-charset="UTF-8">

            <h2>Edit Group</h2>

            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Name" name="name" value="{{ Input::old('name') ? Input::old('name') : $group->name }}" type="text">
                {{ ($errors->has('name') ? $errors->first('name') : '') }}
            </div>

            <label for="Permissions">Permissions</label>
            <div class="form-group">
                <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                @foreach ($defaultPermissions as $permission)
                    <label class="checkbox-inline">
                        <input name="permissions[{{ $permission }}]" value="1" type="checkbox" {{ (isset($permissions[$permission]) ? 'checked' : '') }}>
                        {{ ucwords($permission) }}
                    </label>
                @endforeach
            </div>

            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Save Changes" type="submit">

        </form>
      </div>
    </section>
  </div>

</div> 
 


@stop
