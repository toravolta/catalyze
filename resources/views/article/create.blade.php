@extends('layouts.app')

@section('content')
<div class="col-md-7 m-auto">
    <div class="card">
        <div class="card-header">{{ __('Create Article') }}</div>
        <div class="card-body">
            <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content *</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    @error('content')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic">Topic</label>
                    <select name="topic" class="form-control">
                        <option value="1">Reuse and Recycling</option>
                        <option value="2">Valuing Ecosystem Service</option>
                        <option value="3">REDD+</option>
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