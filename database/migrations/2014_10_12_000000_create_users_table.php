<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_hp')->nullable();
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name'=>'admin',
            'email'=>'admin@toko.id',
            'password'=>bcrypt('admin123'),
            'no_hp'=>'083115340911',
            'role'=>'admin'
        ]);
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
