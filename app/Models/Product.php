<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];

    public function sub_category(){
        return $this->belongsTo('App\Models\SubCategory','subcategory_id');
    }
    public function sub_filters()
    {
        return $this->belongsToMany(SubFilter::class);
        //return $this->belongsToMany('App\Models\SubFilter','product_sub_filters','sub_filter_id');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
