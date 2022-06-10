<?php

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
        //
        DB::table('categories')->insert([
            ['name' => 'Rau củ quả', 'parent_id' => '0', 'slug' => 'rau-cu-qua'],
            ['name' => 'Trái cây', 'parent_id' => '0', 'slug' => 'trai-cay'],
            ['name' => 'Thức uống', 'parent_id' => '0', 'slug' => 'thuc-uong'],
            ['name' => 'Ngũ cốc, Đậu & Hạt', 'parent_id' => '0', 'slug' => 'ngu-coc-dau-hat'],

            ['name' => 'Rau ăn lá', 'parent_id' => '1', 'slug' => 'rau-an-la'],
            ['name' => 'Rau ăn củ', 'parent_id' => '1', 'slug' => 'rau-an-cu'],
            ['name' => 'Rau ăn quả', 'parent_id' => '1', 'slug' => 'rau-an-cu'],
            ['name' => 'Rau ăn hoa', 'parent_id' => '1', 'slug' => 'rau-an-hoa'],
            ['name' => 'Rau gia vị', 'parent_id' => '1', 'slug' => 'rau-gia-vi'],
            ['name' => 'Nấm', 'parent_id' => '1', 'slug' => 'nam'],

            ['name' => 'Trái cây trong nước', 'parent_id' => '2', 'slug' => 'trai-cay-trong-nuoc'],
            ['name' => 'Trái cây nhập khẩu', 'parent_id' => '2', 'slug' => 'trai-cay-nhap-khau'],
            ['name' => 'Trái cây đông lạnh', 'parent_id' => '2', 'slug' => 'trai-cay-dong-lanh'],
            ['name' => 'Trái cây sấy', 'parent_id' => '2', 'slug' => 'trai-cay-say'],

            ['name' => 'Sữa thực vật', 'parent_id' => '3', 'slug' => 'sua-thuc-vat'],
            ['name' => 'Trà, Cà phê & Cacao', 'parent_id' => '3', 'slug' => 'tra-ca-phe-ca-cao'],
            ['name' => 'Thức uống khác', 'parent_id' => '3', 'slug' => 'nuoc-ep-sinh-to'],
            ['name' => 'Trái cây sấy', 'parent_id' => '3', 'slug' => 'thuc-uong-khac'],

            ['name' => 'Gạo & Ngũ cốc', 'parent_id' => '4', 'slug' => 'gao-ngu-coc'],
            ['name' => 'Đậu', 'parent_id' => '4', 'slug' => 'dau'],
            ['name' => 'Hạt', 'parent_id' => '4', 'slug' => 'hat'],
            ['name' => 'Ngũ cốc', 'parent_id' => '4', 'slug' => 'ngu-coc'],
           
        ]);
    }
}
