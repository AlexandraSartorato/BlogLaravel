@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="header" class="crem_blue">
            <div class="container">
                <header class="row">
                    <div id="logo" class="span3"><img src="https://i.pinimg.com/originals/9d/16/87/9d1687fe53247d0da876e4bff2e3ce64.png" height="60" width="70" alt="blog_image"></div>
                    <div class="span6 text-center"><h3>Nothing to say today?</h3></div>
                </header>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12 pb-3">
                    <div class="usermenu">
                        <h1> Resources </h1>
                        <span class="pull-right">
                    <a href="{{route('admin.index')}}" class="btn btn-default"><i class="fas fa-home"></i> Home</a>
                    <a href="{{route('admin.users')}}" class="btn btn-success"><i class="fas fa-users"></i>Subscribers</a>
                    <a href="{{route('admin.articles')}}" class="btn btn-success"><i class="fas fa-newspaper"></i>Articles list</a>
                    <a href="{{route('admin.comments')}}" class="btn btn-success"><i class="far fa-comments"></i>Comments list</a>
                                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">10 Last subscribed</h3>
                        </div>
                        <div class="panel-body">
                        </div>
                        <table class="table table-hover" id="dev-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id_user}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">10 Last articles</h3>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">10 Last comments</h3>
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
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->comment}}</td>
                                        <td>{{$comment->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endsection