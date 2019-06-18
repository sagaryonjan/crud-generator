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

function sagar($inputType, $value,  $attributes) {
    $tag = '<';
    $tag .= $inputType.' ';

    if($inputType != 'textarea') {
        $attributes['value'] = $value;
    }
    $dataAttributes = array_map(function ($value, $key) {
        return $key . '="' . $value . '"';
    }, array_values($attributes), array_keys($attributes));

    $tag .= implode(' ', $dataAttributes);
    $tag .= '>';
    if($inputType == 'textarea') {
        if($value) {
            $tag .= $value;
        }
       $tag .='</textarea>';
    }


    //

    return $tag;



}



Route::get('/', function () {

    App\Form::text(null,[
        'name' => 'sagar',
        'id' => 'sagar'
    ]);

    dd(sagar('input', 'sagar', [
        'name' => 'sagar',
        'id' => 'sagar'
    ]));


    return view('master.layout');
});

Route::group([
    'prefix' => 'beg',
    'as' => 'beg.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BegController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BegController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BegController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BegController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BegController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BegController@delete'
    ]);
});

Route::group([
    'prefix' => 'big',
    'as' => 'big.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BigController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BigController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BigController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BigController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BigController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BigController@delete'
    ]);
});

Route::group([
    'prefix' => 'pant',
    'as' => 'pant.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'PantController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'PantController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'PantController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'PantController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'PantController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'PantController@delete'
    ]);
});

Route::group([
    'prefix' => 'beast',
    'as' => 'beast.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BeastController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BeastController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BeastController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BeastController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BeastController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BeastController@delete'
    ]);
});

Route::group([
    'prefix' => 'best',
    'as' => 'best.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BestController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BestController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BestController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BestController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BestController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BestController@delete'
    ]);
});

Route::group([
    'prefix' => 'bait',
    'as' => 'bait.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BaitController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BaitController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BaitController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BaitController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BaitController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BaitController@delete'
    ]);
});
