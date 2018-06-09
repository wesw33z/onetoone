<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

// insert information into db

Route::get('/insert', function(){

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'5518 Luke Brown Road']);

    $user->address()->save($address);

});

// update field in db

Route::get('/update', function(){

    $address = Address::whereUserId(1)->first();

    $address->name = "6969 Updated Address Lane";

    $address->save();

});


Route::get('/read', function(){

    $user = User::findOrFail(1);

//    return $user->email;
    return $user->address->name;


});

Route::get('/delete', function(){

   $user = User::findOrFail(2);

   $user->address()->delete();

   return "done";


});




