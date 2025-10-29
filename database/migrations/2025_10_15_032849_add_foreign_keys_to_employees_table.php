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
        Schema::table('employees', function (Blueprint $table) {
            // Tambah kolom kalau belum ada
            if (!Schema::hasColumn('employees', 'department_id')) {
                $table->unsignedBigInteger('department_id')->nullable()->after('tanggal_masuk');
            }

            if (!Schema::hasColumn('employees', 'position_id')) {
                $table->unsignedBigInteger('position_id')->nullable()->after('department_id');
            }

            // Foreign key baru dengan nama unik (biar gak tabrakan)
            $table->foreign('department_id', 'fk_employees_department')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');

            $table->foreign('position_id', 'fk_employees_position')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            if (Schema::hasColumn('employees', 'department_id')) {
                $table->dropForeign('fk_employees_department');
                $table->dropColumn('department_id');
            }

            if (Schema::hasColumn('employees', 'position_id')) {
                $table->dropForeign('fk_employees_position');
                $table->dropColumn('position_id');
            }
        });
    }
};
