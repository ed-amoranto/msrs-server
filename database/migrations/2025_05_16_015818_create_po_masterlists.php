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
        Schema::create('po_masterlists', function (Blueprint $table) {
            $table->id();
            $table->string('po_status', 10);
            $table->date('posting_date');
            $table->date('delv_date');
            $table->string('order_no', 50);
            $table->string('work_week', 20);
            $table->unsignedBigInteger('item_price_id');
            $table->foreign('item_price_id')->references('id')->on('item_prices')->onDelete('cascade');
            $table->string('reference_po', 100);
            $table->integer('po_qty');
            $table->integer('delv_qty');
            $table->integer('open_qty');
            $table->double('exchange_rate');
            $table->double('po_amount');
            $table->double('delv_amount');
            $table->double('balance_amount');
            $table->date('date_closed');
            $table->string('mo_no', 50);
            $table->integer('mo_qty');
            $table->string('mo_status', 50);
            $table->string('cancelled', 50);
            $table->date('new_mo_due_date');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_masterlists');
    }
};
