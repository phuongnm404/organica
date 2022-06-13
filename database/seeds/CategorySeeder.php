<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            ['name' => 'Rau củ quả', 'parent_id' => '0', 'slug' => 'rau-cu-qua', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Trái cây', 'parent_id' => '0', 'slug' => 'trai-cay', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Thức uống', 'parent_id' => '0', 'slug' => 'thuc-uong', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Ngũ cốc, Đậu & Hạt', 'parent_id' => '0', 'slug' => 'ngu-coc-dau-hat', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['name' => 'Rau ăn lá', 'parent_id' => '1', 'slug' => 'rau-an-la', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Rau ăn củ', 'parent_id' => '1', 'slug' => 'rau-an-cu', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Rau ăn quả', 'parent_id' => '1', 'slug' => 'rau-an-cu', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Rau ăn hoa', 'parent_id' => '1', 'slug' => 'rau-an-hoa', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Rau gia vị', 'parent_id' => '1', 'slug' => 'rau-gia-vi', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Nấm', 'parent_id' => '1', 'slug' => 'nam', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['name' => 'Trái cây trong nước', 'parent_id' => '2', 'slug' => 'trai-cay-trong-nuoc', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Trái cây nhập khẩu', 'parent_id' => '2', 'slug' => 'trai-cay-nhap-khau', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Trái cây đông lạnh', 'parent_id' => '2', 'slug' => 'trai-cay-dong-lanh', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Trái cây sấy', 'parent_id' => '2', 'slug' => 'trai-cay-say', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['name' => 'Sữa thực vật', 'parent_id' => '3', 'slug' => 'sua-thuc-vat', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Trà, Cà phê & Cacao', 'parent_id' => '3', 'slug' => 'tra-ca-phe-ca-cao', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Thức uống khác', 'parent_id' => '3', 'slug' => 'nuoc-ep-sinh-to', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Trái cây sấy', 'parent_id' => '3', 'slug' => 'thuc-uong-khac', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['name' => 'Gạo & Ngũ cốc', 'parent_id' => '4', 'slug' => 'gao-ngu-coc', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Đậu', 'parent_id' => '4', 'slug' => 'dau', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Hạt', 'parent_id' => '4', 'slug' => 'hat', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Ngũ cốc', 'parent_id' => '4', 'slug' => 'ngu-coc', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
           
        ]);
    }
}
