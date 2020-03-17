@extends('backend.home')

@section('title', 'Add Category')

@section('content')
    <div class="section-header">
      <h1>Edit Category</h1>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-10">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
                @endif
                <form action="{{route('categories.update', $category->id)}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" value="{{$category->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                    <a href="{{route('categories.index')}}" class="btn btn-light mt-3 btn-block text-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection