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
    'prefix' => 'posts',
    'as' => 'posts.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'PostsController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'PostsController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'PostsController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'PostsController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'PostsController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'PostsController@delete'
    ]);
});

/**
 * Site Starter
 */
Route::group([
    'prefix' => 'site-starter',
    'as' => 'site_starter.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'SiteStarterController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'SiteStarterController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'SiteStarterController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'SiteStarterController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'SiteStarterController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'SiteStarterController@delete'
    ]);
});

Route::group([
    'prefix' => 'site-styler',
    'as' => 'site_styler.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'SiteStylerController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'SiteStylerController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'SiteStylerController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'SiteStylerController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'SiteStylerController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'SiteStylerController@delete'
    ]);
});

Route::group([
    'prefix' => 'site-killer',
    'as' => 'site_killer.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'SiteKillerController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'SiteKillerController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'SiteKillerController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'SiteKillerController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'SiteKillerController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'SiteKillerController@delete'
    ]);
});

Route::group([
    'prefix' => 'starter',
    'as' => 'starter.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'StarterController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'StarterController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'StarterController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'StarterController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'StarterController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'StarterController@delete'
    ]);
});

Route::group([
    'prefix' => 'love',
    'as' => 'love.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'LoveController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'LoveController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'LoveController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'LoveController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'LoveController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'LoveController@delete'
    ]);
});

Route::group([
    'prefix' => 'strange',
    'as' => 'strange.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'StrangeController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'StrangeController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'StrangeController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'StrangeController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'StrangeController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'StrangeController@delete'
    ]);
});

Route::group([
    'prefix' => 'kite',
    'as' => 'kite.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'KiteController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'KiteController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'KiteController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'KiteController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'KiteController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'KiteController@delete'
    ]);
});

Route::group([
    'prefix' => 'lite',
    'as' => 'lite.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'LiteController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'LiteController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'LiteController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'LiteController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'LiteController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'LiteController@delete'
    ]);
});

Route::group([
    'prefix' => 'rider',
    'as' => 'rider.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RiderController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RiderController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RiderController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RiderController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RiderController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RiderController@delete'
    ]);
});

Route::group([
    'prefix' => 'dusk',
    'as' => 'dusk.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'DuskController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'DuskController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'DuskController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'DuskController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'DuskController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'DuskController@delete'
    ]);
});

Route::group([
    'prefix' => 'reality',
    'as' => 'reality.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RealityController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RealityController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RealityController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RealityController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RealityController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RealityController@delete'
    ]);
});

Route::group([
    'prefix' => 'product',
    'as' => 'product.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'ProductController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'ProductController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'ProductController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'ProductController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'ProductController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'ProductController@delete'
    ]);
});

Route::group([
    'prefix' => 'product',
    'as' => 'product.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'ProductController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'ProductController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'ProductController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'ProductController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'ProductController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'ProductController@delete'
    ]);
});

Route::group([
    'prefix' => 'edit',
    'as' => 'edit.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'EditController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'EditController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'EditController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'EditController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'EditController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'EditController@delete'
    ]);
});

Route::group([
    'prefix' => 'react',
    'as' => 'react.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'ReactController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'ReactController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'ReactController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'ReactController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'ReactController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'ReactController@delete'
    ]);
});

Route::group([
    'prefix' => 'react',
    'as' => 'react.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'ReactController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'ReactController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'ReactController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'ReactController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'ReactController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'ReactController@delete'
    ]);
});

Route::group([
    'prefix' => 'text',
    'as' => 'text.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'TextController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'TextController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'TextController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'TextController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'TextController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'TextController@delete'
    ]);
});

Route::group([
    'prefix' => 'straight',
    'as' => 'straight.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'StraightController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'StraightController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'StraightController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'StraightController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'StraightController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'StraightController@delete'
    ]);
});

Route::group([
    'prefix' => 'sagar',
    'as' => 'sagar.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'SagarController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'SagarController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'SagarController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'SagarController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'SagarController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'SagarController@delete'
    ]);
});

Route::group([
    'prefix' => 'hero',
    'as' => 'hero.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'HeroController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'HeroController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'HeroController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'HeroController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'HeroController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'HeroController@delete'
    ]);
});

Route::group([
    'prefix' => 'strike',
    'as' => 'strike.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'StrikeController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'StrikeController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'StrikeController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'StrikeController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'StrikeController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'StrikeController@delete'
    ]);
});

Route::group([
    'prefix' => 'rest',
    'as' => 'rest.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RestController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RestController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RestController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RestController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RestController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RestController@delete'
    ]);
});

Route::group([
    'prefix' => 'range',
    'as' => 'range.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RangeController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RangeController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RangeController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RangeController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RangeController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RangeController@delete'
    ]);
});

Route::group([
    'prefix' => 'pull',
    'as' => 'pull.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'PullController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'PullController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'PullController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'PullController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'PullController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'PullController@delete'
    ]);
});

Route::group([
    'prefix' => 'middle',
    'as' => 'middle.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'MiddleController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'MiddleController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'MiddleController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'MiddleController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'MiddleController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'MiddleController@delete'
    ]);
});

Route::group([
    'prefix' => 'last',
    'as' => 'last.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'LastController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'LastController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'LastController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'LastController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'LastController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'LastController@delete'
    ]);
});

Route::group([
    'prefix' => 'star',
    'as' => 'star.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'StarController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'StarController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'StarController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'StarController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'StarController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'StarController@delete'
    ]);
});

Route::group([
    'prefix' => 'stright',
    'as' => 'stright.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'StrightController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'StrightController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'StrightController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'StrightController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'StrightController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'StrightController@delete'
    ]);
});

Route::group([
    'prefix' => 'right',
    'as' => 'right.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RightController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RightController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RightController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RightController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RightController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RightController@delete'
    ]);
});

Route::group([
    'prefix' => 'change',
    'as' => 'change.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'ChangeController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'ChangeController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'ChangeController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'ChangeController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'ChangeController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'ChangeController@delete'
    ]);
});

Route::group([
    'prefix' => 'song',
    'as' => 'song.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'SongController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'SongController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'SongController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'SongController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'SongController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'SongController@delete'
    ]);
});

Route::group([
    'prefix' => 'sapana',
    'as' => 'sapana.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'SapanaController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'SapanaController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'SapanaController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'SapanaController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'SapanaController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'SapanaController@delete'
    ]);
});

Route::group([
    'prefix' => 'heart',
    'as' => 'heart.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'HeartController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'HeartController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'HeartController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'HeartController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'HeartController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'HeartController@delete'
    ]);
});

Route::group([
    'prefix' => 'maan',
    'as' => 'maan.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'MaanController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'MaanController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'MaanController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'MaanController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'MaanController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'MaanController@delete'
    ]);
});

Route::group([
    'prefix' => 'play',
    'as' => 'play.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'PlayController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'PlayController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'PlayController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'PlayController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'PlayController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'PlayController@delete'
    ]);
});

Route::group([
    'prefix' => 'work',
    'as' => 'work.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'WorkController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'WorkController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'WorkController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'WorkController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'WorkController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'WorkController@delete'
    ]);
});

Route::group([
    'prefix' => 'red',
    'as' => 'red.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RedController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RedController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RedController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RedController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RedController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RedController@delete'
    ]);
});

Route::group([
    'prefix' => 'white',
    'as' => 'white.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'WhiteController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'WhiteController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'WhiteController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'WhiteController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'WhiteController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'WhiteController@delete'
    ]);
});

Route::group([
    'prefix' => 'black',
    'as' => 'black.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BlackController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BlackController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BlackController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BlackController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BlackController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BlackController@delete'
    ]);
});

Route::group([
    'prefix' => 'blue',
    'as' => 'blue.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'BlueController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'BlueController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'BlueController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'BlueController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'BlueController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'BlueController@delete'
    ]);
});

Route::group([
    'prefix' => 'yellow',
    'as' => 'yellow.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'YellowController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'YellowController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'YellowController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'YellowController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'YellowController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'YellowController@delete'
    ]);
});

Route::group([
    'prefix' => 'cat',
    'as' => 'cat.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'CatController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'CatController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'CatController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'CatController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'CatController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'CatController@delete'
    ]);
});

Route::group([
    'prefix' => 'love',
    'as' => 'love.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'LoveController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'LoveController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'LoveController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'LoveController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'LoveController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'LoveController@delete'
    ]);
});

Route::group([
    'prefix' => 'rain',
    'as' => 'rain.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'RainController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'RainController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'RainController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'RainController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'RainController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'RainController@delete'
    ]);
});

Route::group([
    'prefix' => 'egg',
    'as' => 'egg.'
], function ($router) {
    $router->get('/', [
        'as' => 'index',
        'uses' => 'EggController@index'
    ]);
    $router->get('/create', [
        'as' => 'create',
        'uses' => 'EggController@create'
    ]);
    $router->post('/create', [
        'as' => 'store',
        'uses' => 'EggController@store'
    ]);
    $router->get('/edit/{id}', [
        'as' => 'edit',
        'uses' => 'EggController@edit'
    ]);
    $router->post('/edit/{id}', [
        'as' => 'update',
        'uses' => 'EggController@update'
    ]);
    $router->delete('/delete/{id}', [
        'as' => 'delete',
        'uses' => 'EggController@delete'
    ]);
});
