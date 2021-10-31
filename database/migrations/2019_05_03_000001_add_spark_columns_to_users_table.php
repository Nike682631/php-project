<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSparkColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('extra_billing_information')->nullable();
            $table->string('billing_address')->nullable()->after('trial_ends_at');
            $table->string('billing_address_line_2')->nullable()->after('billing_address');
            $table->string('billing_city')->nullable()->after('billing_address_line_2');
            $table->string('billing_state')->nullable()->after('billing_city');
            $table->string('billing_postal_code', 25)->nullable()->after('billing_state');
            $table->string('billing_country', 2)->nullable()->after('billing_postal_code');
            $table->string('vat_id', 50)->nullable()->after('billing_postal_code');
            $table->text('receipt_emails')->nullable()->after('vat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'stripe_id',
                'card_brand',
                'card_last_four',
                'card_expiration',
                'extra_billing_information',
                'trial_ends_at',
            ]);
        });
    }
}
