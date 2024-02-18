<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $this->seedInitialData();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gas_type');
    }

    private function seedInitialData()
    {
        DB::table('gas_types')->insert([
            ['name' => 'Gasoline'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Diesel'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Ethanol'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Biodiesel'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Compressed Natural Gas (CNG)'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Liquefied Petroleum Gas (LPG)'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Hydrogen'],
        ]);
        DB::table('gas_types')->insert([
            ['name' => 'Electric'],
        ]);
    }
};
