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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function(){
        return view('home');
})->name('home');


Route::get('/container_type/create','ContainerTypeController@create')->name('container_type.create');
Route::get('/container_type/index','ContainerTypeController@index')->name('container_type');
Route::post('/container_type/store','ContainerTypeController@store')->name('container_type.store');
Route::get('/container_type/edit/{id}','ContainerTypeController@edit')->name('container_type.edit');
Route::post('/container_type/update/{id}','ContainerTypeController@update')->name('container_type.update');



Route::get('/container_line/create','ContainerLineController@create')->name('container_line.create');
Route::get('/container_line/index','ContainerLineController@index')->name('container_lines');
Route::post('/container_line/store','ContainerLineController@store')->name('container_line.store');
Route::get('/container_line/edit/{id}','ContainerLineController@edit')->name('container_line.edit');
Route::post('/container_line/update/{id}','ContainerLineController@update')->name('container_line.update');

Route::get('/shipper/create','ShipperController@create')->name('shipper.create');
Route::get('/shipper/index','ShipperController@index')->name('shipper');
Route::post('/shipper/store','ShipperController@store')->name('shipper.store');
Route::get('/shipper/edit/{id}','ShipperController@edit')->name('shipper.edit');
Route::post('/shipper/update/{id}','ShipperController@update')->name('shipper.update');

Route::get('/consignee/create','ConsigneeController@create')->name('consignee.create');
Route::get('/consignee/index','ConsigneeController@index')->name('consignee');
Route::post('/consignee/store','ConsigneeController@store')->name('consignee.store');
Route::get('/consignee/edit/{id}','ConsigneeController@edit')->name('consignee.edit');
Route::post('/consignee/update/{id}','ConsigneeController@update')->name('consignee.update');

Route::get('/charges/create','ChargesController@create')->name('charges.create');
Route::get('/charges/index','ChargesController@index')->name('charges');
Route::post('/charges/store','ChargesController@store')->name('charges.store');
Route::get('/charges/edit/{id}','ChargesController@edit')->name('charges.edit');
Route::post('/charges/update/{id}','ChargesController@update')->name('charges.update');


Route::get('/port/create','PortController@create')->name('port.create');
Route::get('/port/index','PortController@index')->name('port');
Route::post('/port/store','PortController@store')->name('port.store');
Route::get('/port/edit/{id}','PortController@edit')->name('port.edit');
Route::post('/port/update/{id}','PortController@update')->name('port.update');
Route::get('/port/view/{id}','PortController@port_view')->name('port_view');

Route::get('/agent/create','AgentController@create')->name('agent.create');
Route::get('/agent/index','AgentController@index')->name('agent');
Route::post('/agent/store','AgentController@store')->name('agent.store');
Route::get('/agent/edit/{id}','AgentController@edit')->name('agent.edit');
Route::post('/agent/update/{id}','AgentController@update')->name('agent.update');
Route::get('/agent/view/{id}','AgentController@agent_view')->name('agent_view');


Route::get('/forwarder/create','ForwarderController@create')->name('forwarder.create');
Route::get('/forwarder/index','ForwarderController@index')->name('forwarder');
Route::post('/forwarder/store','ForwarderController@store')->name('forwarder.store');
Route::get('/forwarder/edit/{id}','ForwarderController@edit')->name('forwarder.edit');
Route::post('/forwarder/update/{id}','ForwarderController@update')->name('forwarder.update');

Route::get('/depot/create','DepotController@create')->name('depot.create');
Route::get('/depot/index','DepotController@index')->name('depot');
Route::post('/depot/store','DepotController@store')->name('depot.store');
Route::get('/depot/edit/{id}','DepotController@edit')->name('depot.edit');
Route::post('/depot/update/{id}','DepotController@update')->name('depot.update');

Route::get('/container/create','ContainerController@create')->name('container.create');
Route::get('/container/index','ContainerController@index')->name('container');
Route::post('/container/store','ContainerController@store')->name('container.store');
Route::get('/container/edit/{id}','ContainerController@edit')->name('container.edit');
Route::post('/container/update/{id}','ContainerController@update')->name('container.update');



Route::get('/vessel/create','VesselController@create')->name('vessel.create');
Route::get('/vessel/index','VesselController@index')->name('vessel');
Route::post('/vessel/store','VesselController@store')->name('vessel.store');
Route::get('/vessel/edit/{id}','VesselController@edit')->name('vessel.edit');
Route::post('/vessel/update/{id}','VesselController@update')->name('vessel.update');


Route::get('/simple', function () {
    return view('setup.simple');
});
