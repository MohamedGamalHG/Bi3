<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('categories')->delete();
        $cat = [
            ['ar' => 'موبيلات & تابلت','en'=>'Phones & Tablets'],
            ['ar' => 'المنزل & المكتب','en'=>'Home & Office'],
            ['ar' => 'الكترونيات','en'=>'Electronics'],
            ['ar' => 'كوبيوتر','en'=>'Computing'],
            ['ar' => 'السيارات','en'=>'Automobile'],
            ['ar' => 'أشياء اخري','en'=>'others'],
        ];
        /*foreach ($cat as $cats)
        Db::table('categories')->insert(['category_name'=>$cats]);*/
      foreach ($cat as $cats)
          Category::create(['category_name'=>$cats]);
    }
}
