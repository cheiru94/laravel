<?php

namespace App\Http\Controllers;   // 자바의 패키지 같은 것

use Illuminate\Http\Request;   // 자바의 import 같은 것 
use Illuminate\View\View;

class UserController extends Controller  // controller로 부터 상속 받음 
{

    /* 🟢 register  */
    public function create() : View {
        return view('/registerPage/register_form');  // 🚩 도우미 함수는 import가 필요 없다
    }
    
    /* 🟢 register */
    public function store(Request $req) : View {
        $name = $req->input("name");
        $birthday = $req->input("birthday");
        $email = $req->input("email");
        $affiliation = $req->input("affiliation");

        return view('/registerPage/register' ,
        [
            'name' => $name,
            'bth' => $birthday,
            'email' => $email,
            'aff' => $affiliation
        ]
    
    );  // 🚩 도우미 함수는 import가 필요 없다
    }
    
     
    /* 🔵 update */
    public function edit() : View {
        return view('/registerPage/update_form');  // 🚩 도우미 함수는 import가 필요 없다
    }

    /* 🔵 update */
    public function update(Request $req) : View {
        $name = $req->input("name");
        $birthday = $req->input("birthday");
        $email = $req->input("email");
        $affiliation = $req->input("affiliation");

        return view('/registerPage/update' ,
        [
            'name' => $name,
            'bth' => $birthday,
            'email' => $email,
            'aff' => $affiliation
        ]
    
    );  
    }


     /* 🟡 players */
     public function index() : View {
        return view('/registerPage/remove_form');  // 🚩 도우미 함수는 import가 필요 없다
    }

     public function destroy(Request $req) : View {
        $name =  $req->input("sensyu"); 

        return view('/registerPage/remove',
            [
                'keyValue'=> $name 
            ]
        );  
    }
}
