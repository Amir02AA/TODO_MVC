<?php
namespace database;

include_once "../vendor/autoload.php";
include_once "config.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('users',function (Blueprint $table){

    $table->id();
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->string('password');

});

