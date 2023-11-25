<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Services\ArticleService;
use App\Services\SlugGenerateService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $articleRepo;
    public function __construct()
    {
        $this->articleRepo = app('ArticleInterface');
    }

    public function index()
    {
        return Article::get();
    }

    public function create()
    {
        //
    }

    public function store(ArticleRequest $request)
    {
        $this->articleRepo->create($request->validated());
    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        //
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $this->articleRepo->update($article, $request->validated());
    }

    public function destroy(Article $article)
    {
        //
    }
}
