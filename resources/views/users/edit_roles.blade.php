@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (count($roles) > 0)                          
                      <form action="{{ route('users.update_roles', $user) }}" method="post">
                        @csrf
                        @method('PATCH')

                        @foreach ($roles as $role)
                          <div class="form-group">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            {{ $user->hasAnyRole($role->name)?'checked':''}}>
                            <label>{{ $role->name }}</label>
                          </div>                          
                        @endforeach
                          <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Update Roles</button>
                          </div>
                        </form>
                    @else
                        <div class="alert alert-warning text-danger">No roles were found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
