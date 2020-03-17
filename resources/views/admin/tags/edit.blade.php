@extends('backend.home')

@section('title', 'Edit tag')

@section('content')
    <div class="section-header">
      <h1>Edit Tag</h1>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-10">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
                @endif
                <form action="{{route('tags.update', $tag->id)}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" value="{{$tag->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                    <a href="{{route('tags.index')}}" class="btn btn-light mt-3 btn-block text-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection