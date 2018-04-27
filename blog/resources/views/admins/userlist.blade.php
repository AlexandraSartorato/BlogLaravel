@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 pb-3">
                <div class="usermenu">
                    <h1>Subscribers folder</h1>
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
                        <h3 class="panel-title">Users list</h3>
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
        </div>
        {{ $users->links() }}
        </div>
@endsection