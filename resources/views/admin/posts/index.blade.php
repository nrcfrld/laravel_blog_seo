@extends('backend.home')

@section('title', 'Posts')

@section('content')
    <div class="section-header">
      <h1>Posts</h1>
    </div>

    <div class="section-body">
        <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">Add Post</a>
        @if(Session::has('success'))
                <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Creator</th>
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
                            <span class="badge badge-primary badge-pill mb-1">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>
                        {{$post->user->name}}
                    </td>
                    <td>
                        <img src="{{asset($post->gambar)}}" width="100px">
                    </td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary my-1" style="height: 2.2rem; width: 4.1rem;line-height:2.2rem; padding: 0;">Edit</a>
                        <form action="{{route('posts.destroy',$post->id)}}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" style="height: 2.2rem; width: 4.1rem;line-height:2.2rem; padding: 0;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection