@extends('layouts.app')

@section('content')
<div class="col-md-7 m-auto">
    <div class="card">
        <div class="card-header">{{ __('Update Article') }}</div>
        <div class="card-body">
            <form method="POST" action="{{route('article.update', $article->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                    @error('title')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" value="{{ $article->image }}">
                    <span><i>{{$article->image}}</i></span>
                    @error('image')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content *</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{$article->content}}</textarea>
                    @error('content')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic">Topic</label>
                    <select name="topic" class="form-control">
                        <option value="1" {{ $article->topic == 1 ? 'selected="selected"' : '' }}>Reuse and Recycling</option>
                        <option value="2" {{ $article->topic == 2 ? 'selected="selected"' : '' }}>Valuing Ecosystem Service</option>
                        <option value="3" {{ $article->topic == 3 ? 'selected="selected"' : '' }}>REDD+</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('article.index') }}" class="btn btn-outline-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection