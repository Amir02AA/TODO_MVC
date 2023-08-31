<?php
namespace database;

include_once "../vendor/autoload.php";
include_once "config.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('tasks',function (Blueprint $table){

    $table->id();
    $table->string('name')->unique();
});

