<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstnameAndLastnameToUsersTable extends Migration
{
public function up()
{
Schema::table('users', function (Blueprint $table) {
$table->string('firstName')->nullable(); // Add 'firstName' column
$table->string('lastName')->nullable(); // Add 'lastName' column
});
}

public function down()
{
Schema::table('users', function (Blueprint $table) {
$table->dropColumn(['firstName', 'lastName']);
});
}
}