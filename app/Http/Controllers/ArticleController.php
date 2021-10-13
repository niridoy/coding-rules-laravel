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
    protected $articleRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->articleService->all();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slugGenerateService = new SlugGenerateService ;

        return $this->articleRepo->store([
            'title' => "what is code rules",
            'slug' => $slugGenerateService->slugGenerate("what is code rules"),
            'description' => 'What  is new form afsdfasdf  wefasdfasdfasdf asasdfsdasdf',
            'short_desc' => $slugGenerateService->shortDesGenerate('What  is new form afsdfasdf  wefasdfasdfasdf asasdfsdasdf'),
            'user_id' => 1,
            'is_published' => 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $data)
    {
        $user = $this->articleRepo->store($data->only('name','email','Address','chartNo',''));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->articleRepository->store($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
