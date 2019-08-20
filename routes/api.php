<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::post('/login', 'Api\AuthController@login')->name('login.api');
    // Route::post('/register', 'Api\AuthController@register')->name('register.api');
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');
    Route::get('logout', 'API\AuthController@logout');

    Route::get('slidePhoto/{name}','API\PhotoController@slidePhoto');
    Route::get('profilePhoto/{name}','API\PhotoController@profilePhoto');
    Route::get('productPhoto/{name}','API\PhotoController@productPhoto');

    Route::apiResources(['photo'=>'API\PhotoController']);

    Route::apiResources(['user'=>'API\UserController']);
    Route::get('mechanic', 'API\UserController@mechanic');
    Route::post('rateMechanic/{id}', 'API\UserController@rateMechanic');
    Route::get('mechanicRatings', 'API\UserController@mechanicRatings');
    Route::post('updateRateMechanic/{id}', 'API\UserController@updateRateMechanic');
    Route::get('profile', 'API\UserController@profile');
    Route::get('findUser', 'API\UserController@search');
    Route::put('profile', 'API\UserController@updateProfile');

    Route::apiResources(['service'=>'API\ServiceController']);

    Route::apiResources(['product'=>'API\ProductController']);
    Route::get('findProduct', 'API\ProductController@search');
    Route::get('myProducts', 'API\ProductController@myProducts');
    Route::get('brandsItem', 'API\ProductController@brandsItem');
    Route::get('allProducts', 'API\ProductController@allProducts');

    Route::apiResources(['category'=>'API\CategoryController']);
    Route::get('allCategories', 'API\CategoryController@allCategories');

    Route::apiResources(['subcategory'=>'API\SubCategoryController']);
    Route::get('allSubCategories', 'API\SubCategoryController@allSubCategories');

    Route::apiResources(['brand'=>'API\BrandController']);
    Route::get('findBrand', 'API\BrandController@search');
    Route::get('allBrands', 'API\BrandController@allBrands');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\AuthController@logout')->name('logout');
    });

    // SLide image

});

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', 'API\AuthController@login')->name('login');
//     Route::post('register', 'API\AuthController@register');
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'API\AuthController@logout');
//         Route::get('user', 'API\AuthController@user');
//         Route::apiResources(['user'=>'API\UserController']);
//         Route::get('mechanic', 'API\UserController@mechanic');
//         Route::post('rateMechanic/{id}', 'API\UserController@rateMechanic');
//         Route::get('mechanicRatings', 'API\UserController@mechanicRatings');
//         Route::post('updateRateMechanic/{id}', 'API\UserController@updateRateMechanic');
//         Route::get('profile', 'API\UserController@profile');
//         Route::get('findUser', 'API\UserController@search');
//         Route::put('profile', 'API\UserController@updateProfile');

//         Route::apiResources(['service'=>'API\ServiceController']);

//         Route::apiResources(['product'=>'API\ProductController']);
//         Route::get('findProduct', 'API\ProductController@search');
//         Route::get('myProducts', 'API\ProductController@myProducts');
//         Route::get('brandsItem', 'API\ProductController@brandsItem');

//         Route::apiResources(['category'=>'API\CategoryController']);
//         Route::get('allCategories', 'API\CategoryController@allCategories');

//         Route::apiResources(['subcategory'=>'API\SubCategoryController']);
//         Route::get('allSubCategories', 'API\SubCategoryController@allSubCategories');

//         Route::apiResources(['brand'=>'API\BrandController']);
//         Route::get('findBrand', 'API\BrandController@search');
//         Route::get('allBrands', 'API\BrandController@allBrands');
//     });
// });


