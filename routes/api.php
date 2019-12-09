<?php

Route::namespace('Api')->name('api.')->prefix('v2')->middleware('api')->group(function () {
    Route::post('register', 'Auth\RegisterController')->name('register');
    Route::post('login', 'Auth\LoginController')->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'Auth\LogoutController')->name('logout');
        Route::get('profile', 'Auth\ProfileController')->name('profile');

        // Global Access Market
        Route::get('market', 'MarketController@index')->name('market.index');
        Route::get('market/{market}', 'MarketController@show')->name('market.show');

        // Admin Access role:admin
        Route::post('market', 'MarketController@store')->name('market.store');
        Route::put('market/{market}', 'MarketController@update')->name('market.update');
        Route::delete('market/{market}', 'MarketController@destroy')->name('market.destroy');
    });
});
