<?php

namespace App\Repositories;

use App\Models\Article;
use App\Services\ArticleService;

class ArticleRepository extends ArticleService
{
    public function all()
    {
        return Article::all();
    }

    public function store($data)
    {
        return Article::create($data);
    }

    public function update($id,$data)
    {
        $article = Article::findOrFail($id)->udpate($data);
        return $article;
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id)->delete($id);
        return $article;
    }

    public function show($id)
    {
        return Article::findOrFail($id);
    }

    public function lastPublishedPost()
    {
        return Article::latest()->first();
    }

}
