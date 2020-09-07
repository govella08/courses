@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('All Users') }}</div>

                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                  @endif

                  @if (count($users) > 0)
                    <table class="table table-hover table-borderless">
                      <tr style="border-bottom: 1px solid #333;">
                        <th>#</th>
                        <th><i class="fas fa-user"></i> User Name</th>
                        <th><i class="far fa-envelope"></i> Email</th>
                        <th><i class="fas fa-user-tag"></i> Roles</th>
                        <th><i class="fas fa-cogs"></i> Actions</th>
                      </tr>

                      @foreach ($users as $key=>$user)
                        <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                          <td>
                            <a title="Edit user roles" href="{{ route('users.edit_roles', $user) }}" class="btn btn-outline-primary btn-sm">Edit Roles</a>
                            <a title="Edit user" href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a title="Delete user" href="{{ route('users.destroy', $user->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </table>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
