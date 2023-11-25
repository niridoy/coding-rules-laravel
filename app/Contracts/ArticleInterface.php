<?php

namespace App\Contracts;

use App\Models\Article;

interface ArticleInterface {
    public function create($data): Article;
    public function update($id, $data): Article;
    public function delete($id): void;
}
