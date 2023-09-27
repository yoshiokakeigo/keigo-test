<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
  use HasFactory;
  protected $table = 'articles';
  protected $fillable = [
    'title',
    'content'
  ];
  public function images() {
    return $this->belongsToMany(Image::class, 'article_images')
      ->using(ArticleImage::class);
  }
}
