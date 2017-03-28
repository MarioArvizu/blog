<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Category;
use App\Tag;
use App\Image;
use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::Search($request->title)->orderBy('id', 'ASC')->paginate(5);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');;
        return view('admin.articles.create')
        ->with('categories', $categories)
        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
   
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'imagen_' .time().'.' . $file->getClientOriginalExtension();
            $path = public_path(). '/images/articles';
            $file->move($path,$name);
        }
        
      $article = new Article($request->all());
      $article->user_id = \Auth::user()->id;
      $article->save();

      $article->tags()->sync($request->tags);

      $image = new Image();
      $image->name = $name;
      $image->article()->associate($article);
      $image->save();

      Flash('El articulo '.$article->title.' se ha creado', 'success')->important();
      return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     $article    =  Article::find($id);
     $categories =  Category::orderBy('name','ASC')->pluck('name', 'id');
     $tags =        Tag::orderBy('name','ASC')->pluck('name', 'id');
    
     $my_tags = $article->tags->pluck('id')->toArray();
     
     return view('admin.articles.edit')
     ->with('categories', $categories)
     ->with('article', $article)
     ->with('tags', $tags)
     ->with('my_tags', $my_tags);
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
        $article = Article::find($id);
        $article->fill($request->all());
        $article->tags()->sync($request->tags);
        $article->save();

        Flash("El articulo ".$article->title." ha sido modificado", 'warning')->important();
        return redirect()->route('articles.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        Flash('El Articulo '.$article->title.' ha sido eliminado exitosamente', 'danger')->important();
        return redirect()->route('articles.index');
    }
}
