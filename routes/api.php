<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::fallback(function(){
    return response()->json([
        'message' => 'This url not Found'], 404);
});

            // Public Api
Route::get('brands', [App\Http\Controllers\Api\BrandController::class,'index']);
Route::get('brands/{id}', [App\Http\Controllers\Api\BrandController::class,'show']);



