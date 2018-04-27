@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(\Auth::user()->role == '1')
                    You are logged in as a <strong>Admin</strong>
                            <div class="col-md-12">
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
                        @else
                            You are logged in as a <strong>User</strong>
                            <div class="col-md-12">
                                <div class="usermenu">
                                    <h1> Welcome, {{ Auth::user()->name }}</h1>
                                    <span class="pull-right">
                    <a href="{{route('article.index')}}" class="btn  btn-md btn-success"><i class="fas fa-newspaper"></i>Articles</a>
                    <a href="{{route('article.create')}}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Create new</a>
                                    </span>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
