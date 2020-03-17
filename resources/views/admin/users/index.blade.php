@extends('backend.home')

@section('title', 'Users Management')

@section('content')
    <div class="section-header">
      <h1>Users Management</h1>
    </div>

    <div class="section-body">
        <a href="{{route('users.create')}}" class="btn btn-primary mb-3">Add User</a>
        @if(Session::has('success'))
                <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
        <table class="table table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>
                        {{ $index + $users->firstitem() }}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        @if ($user->role)
                            <span class="badge badge-pill" style="background:#809ac4;color:#fff">Administrator</span>
                        @else
                            <span class="badge badge-pill badge-secondary">Author</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary my-1">Edit</a>
                        <form action="{{route('users.destroy',$user->id)}}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger my-1">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection