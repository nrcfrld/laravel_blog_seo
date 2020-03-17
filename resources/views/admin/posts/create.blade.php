@extends('backend.home')

@section('title', 'Add Post')

@section('content')
    <div class="section-header">
      <h1>Add Post</h1>
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
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title" value="{{old('title')}}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id')is-invalid @enderror">
                            <option value="" holder>--Choose Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                @if($category->id == old('category_id'))
                                    selected
                                @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select name="tags[]" class="form-control select2" multiple="">
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}"
                                @if($tag->id == old('tag'))
                                selected
                                @endif()>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags[]')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <label for="gambar" style="font-weight: 600;color: #34395e;font-size: 12px;letter-spacing: .5px;">Gambar</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input @error('gambar')is-invalid @enderror" id="validatedCustomFile" name="gambar" id="gambar">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Post</button>
                    <a href="{{route('posts.index')}}" class="btn btn-light mt-3 btn-block text-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-styles')
    <link rel="stylesheet" href="{{ asset('public/assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('public/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"> </script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@endpush