@extends('backend.home')

@section('title', 'Register User')

@section('content')
    <div class="section-header">
      <h1>Register User</h1>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-10">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{route('users.update', $user->id)}}" method="post">
                    @csrf
                    @method('PATCH');
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" id="email" value="{{$user->email}}" readonly>
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control @error('role')is-invalid @enderror">
                            <option value="1" @if($user->role)selected @endif>Administrator</option>
                            <option value="0" @if(!$user->role)selected @endif>Author</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control @error('password')is-invalid @enderror">
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-block">Save User</button>
                    <a href="{{route('users.index')}}" class="btn btn-light mt-3 btn-block text-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection