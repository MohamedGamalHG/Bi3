<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubFilter extends Model
{
    use HasTranslations;
    public $translatable = ['subfilter_name'];
    public $fillable = ['subfilter_name','filter_id'];


    public function filters()
    {
        return $this->belongsTo('App\Models\Filter','filter_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
        //return $this->belongsToMany('App\Models\Product','product_sub_filters','product_id');
    }

}
