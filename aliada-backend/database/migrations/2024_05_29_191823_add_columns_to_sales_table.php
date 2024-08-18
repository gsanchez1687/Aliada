<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('status_sales_id')->nullable()->after('user_id');
            $table->foreign('status_sales_id')->references('id')->on('status_sales');
            $table->string('client_name')->nullable()->after('status_sales_id');
            $table->unsignedBigInteger('associated_salesman_id')->nullable()->after('client_name');
            $table->bigInteger('sale_amount')->nullable()->after('associated_salesman_id');
            $table->string('currency')->nullable()->after('sale_amount');
            $table->integer('commission_percentage')->nullable()->after('currency');
            $table->boolean('includes_vat')->default(false)->after('commission_percentage');
            $table->string('lead_type')->nullable()->after('includes_vat');
            $table->string('lead_source')->nullable()->after('lead_type');
            $table->string('marketing_campaign')->nullable()->after('lead_source');
            $table->boolean('property_acquisition')->default(false)->after('marketing_campaign');
            $table->boolean('referred')->default(false)->after('property_acquisition');
            $table->boolean('shared_commission')->default(false)->after('referred');
            $table->string('commission_payer')->nullable()->after('shared_commission');
            $table->boolean('shared_commission_payer')->default(false)->after('commission_payer');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['status_sales_id']);
            $table->dropColumn('status_sales_id');
            $table->dropColumn('client_name');
            $table->dropColumn('associated_salesman_id');
            $table->dropColumn('sale_amount');
            $table->dropColumn('currency');
            $table->dropColumn('commission_percentage');
            $table->dropColumn('includes_vat');
            $table->dropColumn('lead_type');
            $table->dropColumn('lead_source');
            $table->dropColumn('marketing_campaign');
            $table->dropColumn('property_acquisition');
            $table->dropColumn('referred');
            $table->dropColumn('shared_commission');
            $table->dropColumn('commission_payer');
            $table->dropColumn('shared_commission_payer');  
        });
    }
};
