<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("lodgings", function (Blueprint $table) {
            $table->dropColumn("package_id");
            $table->integer("page");
            $table->date("start_range");
            $table->date("end_range");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("lodgings", function(Blueprint $table){
            $table->dropColumn("page");
            $table->dropColumn("start_range");
            $table->dropColumn("end_range");
        });
    }
};
