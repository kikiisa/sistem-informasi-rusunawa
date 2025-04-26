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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("kamar_id")->constrained()->onDelete("cascade");
            $table->enum("waktu_kontrak",["1 bulan","3 bulan","6 bulan","1 tahun"]);
            $table->dateTime("tanggal_order")->nullable();
            $table->dateTime("waktu_berakhir")->nullable();
            $table->enum("status_order",["pending","approved","rejected"])->default("pending");
            $table->string("file")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
