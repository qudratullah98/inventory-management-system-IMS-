<?php

use App\Models\catagory;
use App\Models\depot\Depot;
use App\Models\unit;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("total_quntity");
            $table->foreignIdFor(unit::class)->constrained();
            $table->foreignIdFor(Depot::class)->constrained();
            $table->foreignIdFor(catagory::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
