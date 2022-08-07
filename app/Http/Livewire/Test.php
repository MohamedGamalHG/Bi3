<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Test extends Component
{
    public $name,$martial_status,$fruits,$message,$color= [],$searchTerm,$cats;
    /*public function srtsearch()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        //return dd($searchTerm);
        $this->cats = Category::select('category_name')->where('category_name','LIKE',$searchTerm)->first();
        $this->cats = $this->cats->getTranslation('category_name',App()->getLocale());

    }*/
    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        $categorys = Category::where('category_name','LIKE',$searchTerm)->get();
        //$categorys = Category::all();
        //return dd($categorys);
        return view('livewire.test',['testcategorys'=>$categorys]);
    }
}
