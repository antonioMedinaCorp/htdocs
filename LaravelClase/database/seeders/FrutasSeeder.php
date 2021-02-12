<?php

namespace Database\Seeders;

use App\Models\Fruit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('frutas')->delete();

        $f = new Fruit();
        $f->nombre_fruta="sandia";
        $f->temporada="1";
        $f->save();


        $f = new Fruit();
        $f->nombre_fruta="naranja";
        $f->temporada="1";
        $f->save();


        $f = new Fruit();
        $f->nombre_fruta="pera";
        $f->temporada="1";
        $f->save();
    }
}
