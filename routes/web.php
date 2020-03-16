<?php

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

Route::get('/','StandardRouting\NavController@welcome');

Route::get('/esercizi', 'StandardRouting\EsercizioController@esercizi');
Route::get('/unita-misura', 'StandardRouting\UnitaMisuraController@unitaMisura');
Route::get('/worklogs-raw', 'StandardRouting\WorklogController@elencoWorklog');
Route::get('/worklogs-view', 'StandardRouting\WorklogController@elencoWorklogView');
Route::get('worklogs','StandardRouting\NavController@worklogs');
Route::get('insert-worklog','StandardRouting\NavController@insertWorklog');
Route::post('insert-worklog','StandardRouting\NavController@performInsertWorklog');
Route::post('delete-worklog','StandardRouting\NavController@performDeleteWorklog');
Route::get('edit-worklog','StandardRouting\NavController@editWorklog');
Route::post('edit-worklog','StandardRouting\NavController@performEditWorklog');
Route::get('redis-send-email','StandardRouting\RedisEmailController@sendMail');
Route::get('query-worklogs','StandardRouting\QueryWorklogsController@queryWorklogs');
Route::post('query-worklogs','StandardRouting\QueryWorklogsController@performQueryWorklogs');