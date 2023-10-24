<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategorySearch extends Component
{
    public $search,$category,$error;
    public function searchCategory()
    {
       // return dd();
        try{

        $this->category = Category::where('category_name', 'like', '%' . $this->search . '%')->get();
        }catch (\Exception $e)
        {
            $this->error = "Category Not found";
        }
    }
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    //,[
    //            'categorying' =>  Category::where('category_name', 'like', '%'.$this->search.'%')->get()
    //        ]
    public function render()
    {
        return view('livewire.category-search',['play'=> Category::where('category_name',$this->search)->get()]);
    }
}
