<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|여기에서 애플리케이션의 웹 경로를 등록할 수 있습니다. 이러한
| 경로는 RouteServiceProvider에 의해 로드되며 모든 경로는
| "웹" 미들웨어 그룹에 할당됩니다. 멋진 것을 만들어 보세요!
|
*/


Route::get('/', function () {
    return view('welcome');
});


/* 
   Route::메소드('URL요청 경로' . [컨트롤러이름::class , '컨트롤러 안 메소드'])  
*/


/* 🚩 get 요청  */
Route::get('/register',[UserController::class, 'create']);
Route::get('/update',[UserController::class, 'edit']);
Route::get('/players',[UserController::class, 'index']);



/* 🚩 post 요청 */
Route::post('/register',[UserController::class, 'store']);



/* 🚩 put 요청 */
Route::put('/players',[UserController::class, 'update']);


/* 🚩 delete 요청 */
Route::delete('/remove',[UserController::class, 'destroy']);


// 연습
Route::delete('/removeupup',[UserController::class, 'test']);


// Route::get('photos',[PhotoController::class,'index']);
// Route::post('photos',[PhotoController::class,'store']);

