<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Article;
use App\Comment;


class AdminController extends Controller
{
    public function index ()
    {
        return view('admins.index')
            ->with('users', User::orderBy('created_at', 'desc')->take(10)->get())
            ->with('articles', Article::orderBy('created_at', 'desc')->take(10)->get())
            ->with('comments', Comment::orderBy('created_at', 'desc')->take(10)->get());
    }

    public function showUser()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.userlist', compact('users'));
    }

    public function showArticle()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.articlelist', compact('articles'));
    }
    public function showComment()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.commentlist', compact('comments'));
    }
}
