@extends('backend.home')

@section('title', 'Deleted Posts')

@section('content')
    <div class="section-header">
      <h1>Deleted Posts</h1>
    </div>

    <div class="section-body">
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                <tr>
                    <td>
                        {{ $index + $posts->firstitem() }}
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        {{$post->category->name}}
                    </td>   
                    <td>
                        @foreach($post->tag as $tag)
                            <span class="badge badge-primary badge-pill">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>
                        <img src="{{asset($post->gambar)}}" width="100px">
                    </td>
                    <td>
                        <a href="{{route('posts.restore', $post->id)}}" class="btn btn-primary">Restore</a>
                        <form action="{{route('posts.forceDelete', $post->id)}}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection