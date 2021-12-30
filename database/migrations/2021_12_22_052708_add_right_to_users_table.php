<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRightToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('right');
        });

        DB::table('users')->insert([
            ['name' => 'root', 'email' => 'root@gmail.com', 'password' => '$2y$10$8OzKzQ1re9O24r8oTk6T8.ce80xBUF71O7nWph./p5EOouKzMa2r2', 'username' => 'root', 'right' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('right');
        });
    }
}
