<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Service\ArticleContent;

class HomeController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(ArticleContent $articleContent) {
    //
    $article = $articleContent->getArticle();
    return view('home')->with('article', $article);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id, ArticleContent $articleContent) {
    //
    $article = $articleContent->getArticleDetail($id);
    return view('articleShow')->with('article', $article);
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id) {
    //
  }
}
