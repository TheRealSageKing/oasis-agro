<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->integer('qty')->default(1)->after('package_id');
            $table->decimal('pkg_amt', 32,2)->default(0)->after('qty');
            $table->date('maturity_date')->after('is_open');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->dropColumn('qty');
            $table->dropColumn('pkg_amt');
            $table->dropColumn('maturity_date');
        });
    }
}
