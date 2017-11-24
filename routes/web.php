<?php

use Illuminate\Support\Facades\Redis;
use App\Events\UserSignUp;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // 1 => publish Event using redis

    // $data = [
    //     'event' => 'UserSignUp',
    //     'data' => [
    //         'username' => 'alaaDragneel'
    //     ]
    // ];
    //
    // $test = Redis::publish('test-channel', json_encode($data));
    // 2 => node.js + Redis subscribes to the event => socket.js
    // 3 => use  socket.io to emit to all clients => welcome.blade.php
    // 4 => use laravel events
    event(new UserSignUp(Request::query('name')));
    return view('welcome');


});
