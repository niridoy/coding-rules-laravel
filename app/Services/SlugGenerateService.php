<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Str;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;

class SlugGenerateService
{
    public function slugGenerate($value)
    {
        return Str::slug($value);
    }

    public function shortDesGenerate($value)
    {
        return Str::slug($value);
    }

}
