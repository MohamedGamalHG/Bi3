<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Filter extends Model
{
    use HasTranslations;
    public $translatable = ['filter_name'];
    public $fillable = ['filter_name'];
}
