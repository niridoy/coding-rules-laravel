<?php

namespace App\Models;

use App\Services\SlugGenerateService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn () => (new SlugGenerateService)->slugGenerate($this->attributes['title']),
        );
    }
}
