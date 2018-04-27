@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 pb-3">
                <div class="usermenu">
                    <h1> Articles folder </h1>
                    <span class="pull-right">
                    <a href="{{route('admin.index')}}" class="btn btn-default"><i class="fas fa-home"></i> Home</a>
                    <a href="{{route('admin.users')}}" class="btn btn-success"><i class="fas fa-users"></i>Subscribers</a>
                    <a href="{{route('admin.articles')}}" class="btn btn-success"><i class="fas fa-newspaper"></i>Articles list</a>
                    <a href="{{route('admin.comments')}}" class="btn btn-success"><i class="far fa-comments"></i>Comments list</a>
                                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Articles</h3>
                        <div class="pull-right">
                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                </span>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                    <table class="table table-hover" id="task-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->title}}</td>
                                <td>{{$article->tags}}</td>
                                <td>{{$article->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        {{ $articles->links() }}
    </div>
@endsection