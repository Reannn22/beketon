<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('logs', 'amount')) {
            Schema::table('logs', function (Blueprint $table) {
                $table->integer('amount')->default(1)->after('action');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('logs', 'amount')) {
            Schema::table('logs', function (Blueprint $table) {
                $table->dropColumn('amount');
            });
        }
    }
};
