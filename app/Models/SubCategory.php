<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasTranslations;
    public $translatable = ['subcategory_name'];
    protected $fillable = ['subcategory_name','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function products(){
        return $this->hasMany('App\Models\Product','subcategory_id');
    }
}
