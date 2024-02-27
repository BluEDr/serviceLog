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
        Schema::create('service_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['Change','Check','Clean','Adjust']);
            $table->timestamps();
        });

        $this->firstRun();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_procedure');
    }

    private function firstRun() {
        DB::table('service_procedures')->insert(['name'=>'oil','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'oil filter','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'air filter','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'spark plug','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'cabin filter','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'transmission oil','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'brake fluid','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'coolant','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'timing belt','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('service_procedures')->insert(['name'=>'cvt belt','status'=>'Change', 'created_at' => now(), 'updated_at' => now()]);
    }
};
