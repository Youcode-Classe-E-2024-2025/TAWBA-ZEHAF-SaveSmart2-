<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountIdToUsersTable extends Migration
{
public function up()
{
Schema::table('users', function (Blueprint $table) {
$table->unsignedBigInteger('account_id')->nullable(); // Add 'account_id' column
$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade'); // Add foreign key constraint
});
}

public function down()
{
Schema::table('users', function (Blueprint $table) {
$table->dropForeign(['account_id']); // Drop foreign key constraint
$table->dropColumn('account_id'); // Drop 'account_id' column
});
}
}