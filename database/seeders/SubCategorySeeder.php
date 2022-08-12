<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ٍSubCategory;

class SubCategorySeeder extends Seeder
{
   public function run()
    {
    Db::table('sub_categories')->delete();
    $cat = [
        ['ar' => 'موبيلات','en'=>'Mobiles'],
        ['ar' => 'عربيات','en'=>'Cars'],
    ];
    /*foreach ($cat as $cats)
    Db::table('categories')->insert(['category_name'=>$cats]);*/
    $i = 1;
  foreach ($cat as $cats)
      Category::create(['subcategory_name'=>$cats,'category_id'=>$i++]);
}

}
