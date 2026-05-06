<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('bmi_records', function (Blueprint $table) {
        $table->integer('umur')->after('tinggi');
        $table->string('gender')->after('umur');
    });
}

public function down()
{
    Schema::table('bmi_records', function (Blueprint $table) {
        $table->dropColumn(['umur', 'gender']);
    });
}
};
