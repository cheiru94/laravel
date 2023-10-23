<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use App\Http\Controllers\UserController;


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


/* 🟢 get */
// 요청 url( 클로저[무명함수 = 함수 정의] ) ,
Route::get('/test', function () {
    return view('/registerPage/test_form');
});

Route::get('/register', function () {
    return view('/registerPage/register_form');
});

Route::get('/update', function () {
    return view('/registerPage/update_form');
});


Route::get('/remove', function () {
    return view('/registerPage/remove_form');
});


// 🟡 라우타터 파라미터
Route::get('/user/{id?}', function (string $id = "100") {
    return "User =" . $id; // 
});

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    return '게시글' . $postId . '번 글의 댓글' . $commentId . '번을 인출 했습니다.';
});




/* 🔵 post */
Route::post('/register', function (Request $req) {
    $name = $req->input("name"); // key 값 입력 
    $birthday = $req->input("birthday");
    $email = $req->input("email");
    $affiliation = $req->input("affiliation");

    return view(
        '/registerPage/register',
        [
            'name' => $name,
            'bth' => $birthday,
            'email' => $email,
            'aff' => $affiliation
        ]
    );
});

Route::post('/test', function(Request $req){
    $name = $req->input("name"); 

    return view ('/registerPage/test' , [
        'name' => $name
    ]);
});


/* 🟠 put */
Route::put('/update', function (Request $req) {

    $name = $req->input("name");
    $birthday = $req->input("birthday");
    $email = $req->input("email");
    $affiliation = $req->input("affiliation");

    return view(
        '/registerPage/update',
        [
            'name' => $name,
            'bth' => $birthday,
            'email' => $email,
            'aff' => $affiliation
        ]
    );

});

/* 🔴 delete */
Route::delete('/remove', function (Request $req) {

    $sensyu = $req->input("sensyu"); // 우측에서 뺴온 것을 좌 측에 넣어 줌

    return view(
        /* blade.php 는 생략 */
        '/registerPage/remove',
        [
            'keyValue' => $sensyu
        ]
    );

});


/* 컨트롤러로 구현  */