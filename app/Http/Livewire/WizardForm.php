<?php

namespace App\Http\Livewire;

use App\Models\Filter;
use App\Models\Image;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubFilter;
use Livewire\Component;
use Livewire\WithFileUploads;

class WizardForm extends Component
{
    use WithFileUploads;
    public $currentStep  = 1;
   // public  $amount, $status = 1, $stock,$name;
    public $name_ar,$name_en,$price,$description,$sub_category_id,$quantity,$image,$subfilter_id,$filter_id;
    public $successMessage = '',$filters,$sub_cats,$subfilters=[];
    //public $sub_cats,$filters,$subfilters;

    public function render()
    {
        $this->sub_cats = SubCategory::all();
        $this->filters = Filter::all();
        if(!empty($this->filters))
        {
            $this->subfilters = SubFilter::where('filter_id',$this->filter_id)->get();
        }
        /*$this->sub_cats = SubCategory::all()->toArray();
        $this->filters = Filter::all();
        $this->sub_filter = SubFilter::all();*/

        //return view('livewire.wizard-form',['sub_cats'=>SubCategory::get()]);
        return view('livewire.wizard-form',['sub_cats'=>$this->sub_cats,'filters'=>$this->filters]);
    }
    /*public function subfilter($id)
    {

        $this->subfilters = SubFilter::where('id',3)->first();
        //return $this->subfilters;

    }*/
    public function firstStepSubmit()
    {
       /* $validatedData = $this->validate([
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);*/

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
       /* $validatedData = $this->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);*/

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        $products = new Product();

            $products->name = ['ar'=>$this->name_ar,'en'=>$this->name_en];
            $products->quantity = $this->quantity;
            $products->description = $this->description;
            $products->subcategory_id = $this->sub_category_id;
            $products->price = $this->price;
            $products->save();
            //dd($this->image);
            if(!empty($this->image))
            {
                foreach ($this->image as $img)
                {
                    $img->storeAs('photos/'.$products->id,$img->getClientOriginalName(),'products');
                   // $img->move(public_path('photos/'.$products->id),$img->getClientOriginalName()); //this not work with livewire for now

                    $images = new Image();
                    $images->image_name = $img->getClientOriginalName();
                    $images->product_id = $products->id;
                    $images->save();
                }
            }


            $sub_pro = SubFilter::find([$this->subfilter_id]);
            $products->sub_filters()->attach($sub_pro);

        $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->name_ar = '';
        $this->name_en = '';
        $this->quantity = '';
        $this->price = '';
        $this->description = '';
        $this->sub_category_id = '';
        $this->filter_id = '';
        $this->subfilter_id = '';

    }
}
