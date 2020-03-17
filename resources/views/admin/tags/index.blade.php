@extends('backend.home')

@section('title', 'Tags')

@section('content')
    <div class="section-header">
      <h1>Tags</h1>
    </div>

    <div class="section-body">
        <a href="{{route('tags.create')}}" class="btn btn-primary mb-3">Add Tag</a>
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
                    <th>Tag Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $index => $tag)
                <tr>
                    <td>
                        {{ $index + $tags->firstitem() }}
                    </td>
                    <td>
                        {{$tag->name}}
                    </td>
                    <td>
                        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('tags.destroy',$tag->id)}}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
@endsection