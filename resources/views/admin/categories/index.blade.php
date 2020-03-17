@extends('backend.home')

@section('title', 'Categories')

@section('content')
    <div class="section-header">
      <h1>Categories</h1>
    </div>

    <div class="section-body">
        <a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Add Category</a>
        @if(Session::has('success'))
                <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                <tr>
                    <td>
                        {{ $index + $categories->firstitem() }}
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('categories.destroy',$category->id)}}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection