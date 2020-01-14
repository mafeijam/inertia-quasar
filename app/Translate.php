<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Translate extends Model
{
    use HasTranslations;

    public $translatable = ['data'];

    protected $guarded = [];
}
