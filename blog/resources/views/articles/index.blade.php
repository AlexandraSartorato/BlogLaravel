@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="header" class="crem_blue">
            <div class="container">
                <header class="row">
                    <div id="logo" class="span3"><img src="https://i.pinimg.com/originals/9d/16/87/9d1687fe53247d0da876e4bff2e3ce64.png" height="60" width="70" alt="blog_image"></div>
                    <div class="span6 text-center"><h3>Nothing to say today?</h3></div>
                    <span class="pull-right">
                    <a href="{{route('article.index')}}" class="btn  btn-md btn-success"><i class="fas fa-newspaper"></i>Articles</a>
                    <a href="{{route('article.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create new</a>
                    </span>
                </header>
            </div>
        </div>
        <div class ="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
    @foreach($articles as $article)
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$article->title}}</h3>
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-success pull-right" type="button">
                            Comments <span class="badge">{{$article->comments->count()}}</span>
                        </button>
                        <h5 class="card-title">Tags: {{$article->tags}}</h5>
                        {!! $article->content !!}
                    </div>
                    <div class="panel-footer">
                        <ul class="nav nav-pills">
                            @if(Auth::id() == $article->id_user)
                            <li><a href="{{route('article.edit', $article->id)}}" class="btn btn-success">Edit</a></li>
                            @endif
                            <li><a href="{{route('article.show', $article->id)}}" class="btn btn-success">Comment</a></li>
                                @if(Auth::id() == $article->id_user)
                            <li><form method="post" action="{{ route('article.destroy', $article->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-lg btn-default">Delete</button>
                                </form></li>
                                @endif
                        </ul>
                    </div>
                </div>
    @endforeach
    {{ $articles->links() }}
        </div>
    </div>
@endsection