@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Article</h3>
        <div class="card">
            <div class="card-block">
                {!!$article->content!!}
                <p>{{$article->created_at->format('D-j')}}</p>
            </div>
        </div>
        <h3>Comments</h3>
        <p></p>
        @foreach($article->comments as $comment)
            <div class="card">
                <div class="card-block">
                    {!!$comment->comment!!}
                    <p>{{$comment->created_at->format('D-j')}}</p>
                </div>
            </div>
        @endforeach

        <div class="card">
            <div class="card-block">
            <form method="post" action="/comment/{{$article->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                <textarea name="comment" placeholder="please comment" class="form-control">
                </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-primary">Add comment</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection