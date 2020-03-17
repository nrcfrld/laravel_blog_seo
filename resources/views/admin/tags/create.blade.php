@extends('backend.home')

@section('title', 'Add Tag')

@section('content')
    <div class="section-header">
      <h1>Add Tag</h1>
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
                <form action="{{route('tags.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Tag</button>
                    <a href="{{route('tags.index')}}" class="btn btn-light mt-3 btn-block text-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection