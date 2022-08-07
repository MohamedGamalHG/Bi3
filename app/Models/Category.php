<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Category extends Model
{
    use HasTranslations;
    public $translatable = ['category_name'];
    protected $fillable = ['category_name'];

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
