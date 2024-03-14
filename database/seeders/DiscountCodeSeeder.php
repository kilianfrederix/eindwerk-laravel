<?php

namespace Database\Seeders;

use App\Models\DiscountCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount_codes')->truncate();

        $codes = collect([
            ['code' => 'DISCOUNT20', 'discount' => 20],
            ['code' => 'HAPPY10', 'discount' => 10],
            ['code' => 'JUSTDOIT', 'discount' => 25],
        ]);

        $codes->each(function($i) {
            $code = new DiscountCode;
            $code->code = $i['code'];
            $code->discount = $i['discount'];
            $code->save();
        });
    }
}
