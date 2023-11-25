<?php

namespace App\Repositories;

use App\Models\Article;
use App\Contracts\ArticleInterface;

class ArticleRepository implements ArticleInterface
{
    public function create($data): Article
    {
        return Article::create($data);
    }

    public function update($article, $data): Article
    {
        return $article->udpate($data);
    }

    public function delete($id): void
    {
       Article::findOrFail($id)->delete($id);
    }

}
