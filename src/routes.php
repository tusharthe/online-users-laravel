<?php


Route::get('/onlineuser',function (){
    return 'route';
});


Route::get('/onlineuserget','tusharthe\OnlineUsers\Controllers\OnlineUsersController@index')->middleware(['web','auth']);

