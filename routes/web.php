<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@home')->name('home_page');

Route::group(['prefix' => '/wallets'], function () {
    Route::get('', 'WalletController@index')->name('wallets');
    Route::get('/add-new', 'WalletController@create')->name('wallets_create');
    Route::post('/add-new', 'WalletController@store')->name('wallets_store');
    Route::get('/{id}/edit', 'WalletController@edit')->name('wallets_edit');
    Route::put('/{id}/update', 'WalletController@update')->name('wallets_update');
    Route::delete('/{id}/delete', 'WalletController@destroy')->name('wallets_delete');

    Route::get('/{id}/transactions', 'TransactionController@index')->name('wallet_transactions');
    Route::get('/{id}/transactions/create', 'TransactionController@create')->name('wallet_transaction_create');
    Route::post('/{id}/transactions/create', 'TransactionController@store')->name('wallet_transaction_store');
    Route::delete('/{walletId}/transactions/{transactionId}/delete', 'TransactionController@destroy')->name('wallet_transaction_delete');
});
