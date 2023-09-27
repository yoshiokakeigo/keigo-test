<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ArticleContent {
  public function getArticle() {
    return Article::with('images')->orderBy('created_at', 'DESC')->paginate(3);
  }
  public function saveArticle(string $title, string $content, array $images) {
    DB::transaction(function () use ($title, $content, $images) {
      $article = new Article();
      $article->title = $title;
      $article->content = $content;
      $article->save();
      foreach ($images as $image) {
        Storage::putFile('public/images', $image);
        $imageModel = new Image();
        $imageModel->name = $image->hashName();
        $imageModel->save();
        $article->images()->attach($imageModel->id);
      }
    });
  }
  public function getArticleDetail($id) {
    return Article::where('id', $id)->with('images')->firstOrFail();
  }
  public function articledelete(int $id) {
    DB::transaction(function () use ($id) {
      $article = Article::where('id', $id)->firstOrFail();
      $article->images()->each(function ($image) use ($article) {
        $filePath = 'public/images/' . $image->name;
        if (Storage::exists($filePath)) {
          Storage::delete($filePath);
        }
        $article->images()->detach($image->id);
        $image->delete();
      });
      $article->delete();
    });
  }
}
