<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function update($id,$data)
    {
        $article = Category::findOrFail($id)->udpate($data);
        return $article;
    }

    public function delete($id)
    {
        $article = Category::findOrFail($id)->delete($id);
        return $article;
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function lastPublishedPost()
    {
        return Category::latest()->first();
    }

}
