<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        DB::table('product_categories')->insert([
            ['name' => 'APS/環境・開発'],
            ['name' => 'APS/観光学'],
            ['name' => 'APS/国際関係'],
            ['name' => 'APS/文化・社会・メディア'],
            ['name' => 'APS/その他'],
            ['name' => 'APM/会計・ファイナンス'],
            ['name' => 'APM/マーケティング'],
            ['name' => 'APM/経営戦略と組織'],
            ['name' => 'APM/イノベーション・経済学'],
            ['name' => 'APM/その他'],
            ['name' => '共通教養科目/APUリテラシー'],
            ['name' => '共通教養科目/世界市民基盤'],
            ['name' => '共通教養科目/社会ニーズ対応'],
            ['name' => '言語科目/英語'],
            ['name' => '言語科目/日本語'],
            ['name' => '言語科目/AP言語'],
            ['name' => '資格試験参考書'],
            ['name' => 'その他'], 
        ]);
    }
}
