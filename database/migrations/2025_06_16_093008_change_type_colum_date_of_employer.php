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
        Schema::table('employees_specific', function (Blueprint $table) {
            $table->string('date_from_1',100)->nullable()->change();
            $table->string('date_to_1',100)->nullable()->change();
            $table->string('date_from_2',100)->nullable()->change();
            $table->string('date_to_2',100)->nullable()->change();
            $table->string('date_from_3',100)->nullable()->change();
            $table->string('date_to_3',100)->nullable()->change();
            $table->string('date_from_4',100)->nullable()->change();
            $table->string('date_to_4',100)->nullable()->change();
        });
        Schema::table('delete_specific', function (Blueprint $table) {
            $table->string('date_from_1',100)->nullable()->change();
            $table->string('date_to_1',100)->nullable()->change();
            $table->string('date_from_2',100)->nullable()->change();
            $table->string('date_to_2',100)->nullable()->change();
            $table->string('date_from_3',100)->nullable()->change();
            $table->string('date_to_3',100)->nullable()->change();
            $table->string('date_from_4',100)->nullable()->change();
            $table->string('date_to_4',100)->nullable()->change();
        });
        Schema::table('employees_postpone', function (Blueprint $table) {
            $table->string('date_from_1',100)->nullable()->change();
            $table->string('date_to_1',100)->nullable()->change();
            $table->string('date_from_2',100)->nullable()->change();
            $table->string('date_to_2',100)->nullable()->change();
            $table->string('date_from_3',100)->nullable()->change();
            $table->string('date_to_3',100)->nullable()->change();
            $table->string('date_from_4',100)->nullable()->change();
            $table->string('date_to_4',100)->nullable()->change();
        });
        Schema::table('delete_postpone', function (Blueprint $table) {
            $table->string('date_from_1',100)->nullable()->change();
            $table->string('date_to_1',100)->nullable()->change();
            $table->string('date_from_2',100)->nullable()->change();
            $table->string('date_to_2',100)->nullable()->change();
            $table->string('date_from_3',100)->nullable()->change();
            $table->string('date_to_3',100)->nullable()->change();
            $table->string('date_from_4',100)->nullable()->change();
            $table->string('date_to_4',100)->nullable()->change();
        });
        Schema::table('employees_appointed', function (Blueprint $table) {
            $table->string('date_from_1',100)->nullable()->change();
            $table->string('date_to_1',100)->nullable()->change();
            $table->string('date_from_2',100)->nullable()->change();
            $table->string('date_to_2',100)->nullable()->change();
            $table->string('date_from_3',100)->nullable()->change();
            $table->string('date_to_3',100)->nullable()->change();
            $table->string('date_from_4',100)->nullable()->change();
            $table->string('date_to_4',100)->nullable()->change();
        });
        Schema::table('delete_appointed', function (Blueprint $table) {
            $table->string('date_from_1',100)->nullable()->change();
            $table->string('date_to_1',100)->nullable()->change();
            $table->string('date_from_2',100)->nullable()->change();
            $table->string('date_to_2',100)->nullable()->change();
            $table->string('date_from_3',100)->nullable()->change();
            $table->string('date_to_3',100)->nullable()->change();
            $table->string('date_from_4',100)->nullable()->change();
            $table->string('date_to_4',100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
