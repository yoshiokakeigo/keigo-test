<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\ArticleContent;
use App\Http\Requests\Admin\ArticleRequest;

class ArticleController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(ArticleContent $articleContent) {
    //
    $article = $articleContent->getArticle();
    return view('admin.dashboard')->with('article', $article);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    //
    return view('admin.article.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ArticleRequest $request, ArticleContent $articleContent) {
    //
    $articleContent->saveArticle(
      $request->title(),
      $request->content(),
      $request->images()
    );
    return redirect()->route('dashboard');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id, ArticleContent $articleContent) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id, ArticleContent $articleContent) {
    //
    $article = $articleContent->getArticleDetail($id);
    return view('admin.article.edit')->with('article', $article);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id, ArticleContent $articleContent) {
    //
    $article = $articleContent->getArticleDetail($id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->save();
    return redirect()->route('dashboard');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id, ArticleContent $articleContent) {
    //
    $articleContent->articledelete($id);
    return redirect()->route('dashboard');
  }
}
