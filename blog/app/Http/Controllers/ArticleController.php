<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests\CreateArticleRequest;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   $input = Request::all();
        $input['id_user'] = \Auth::user()->id;
        Article :: create($input);
        \Session :: flash('flash_message', 'Your article has been addeed !');
        return redirect('billet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrfail($id);
        return view('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        if(\Auth::id() !== $article->id_user) {
            return view('home')->withErrors('You cannot do that');
        } else {
            return view('articles.edit', compact('article'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrfail($id);
        $input = Request::all();
        $article->update($input);
        \Session :: flash('flash_message', 'Your article has been updated !');
        return redirect('billet');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrfail($id);
        if(\Auth::id() !== $article->id_user) {
            return view('home')->withErrors('You cannot do that');
        } else {
            $article->delete();
            \Session:: flash('flash_message', 'Your article has been deleted !');
            return redirect('billet');
        }
    }
}
