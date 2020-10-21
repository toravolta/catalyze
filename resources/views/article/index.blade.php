@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('Article') }}</div>
        @include('layouts.flash-message')
        <div class="card-body">
            <div class="pull-right mb-2"><a href="{{ route('article.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Create Article</a></div>
            <table class="table table-bordered table-responsive">
                <colgroup>
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 25%;">
                    <col span="1" style="width: 25%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 20%;">
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Article Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $key => $article)
                    <tr>
                        <td>{{$articles->firstItem() + $key }}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->user->name}}</td>
                        <td><?php $topic = [1 => 'Reuse and Recycling', 2 => 'Valuing Ecosystem Service', 3 => 'REDD++'];
                            $label = $topic[$article->topic] ?> {{$label}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mr-1" href="{{ url('article/'.$article->id.'/edit') }}">Edit</a>
                                <a class="btn btn-secondary btn-sm mr-1" href="{{ route('show-article', $article->id) }}">Show</a>
                                <button type="button" onClick="handleDelete({{$article->id}})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $articles->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to delete this article?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('article.destroy', 'id') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id" name="id" hidden />
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptcode')
<script>
    function handleDelete(id) {
        document.getElementById("id").value = id;
    }
</script>
@endsection