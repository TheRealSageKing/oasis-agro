<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Packages', function (Blueprint $table) {
            $table->longText('image')->after('roi');
            $table->longText('description')->after('name');
            $table->longText('brochure')->nullable()->after('image');
            $table->longText('brochure_name')->nullable()->after('brochure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Packages', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('description');
            $table->dropColumn('brochure');
            $table->dropColumn('brochure_name');
        });
    }
}
