<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->string('seen_by')->nullable()->after('consultation_date'); // Con quién se vio
            $table->string('visit_type')->nullable()->after('seen_by'); // Tipo de visita (llamada/visita/fundación)
        });
    }

    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn(['seen_by', 'visit_type']);
        });
    }
};
