<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>축하합니다, <span style="color: pink">{{$name}}</span> 님 정보는 아래와 같이 <span style="color: rgb(14, 14, 255)">변경</span>되었습니다 !</h1>

  {{-- 1 --}}
  <h2><span style="color: pink">{{$name}}</span> 의 등록정보는 이와 같습니다</h2>
 
  {{-- 2 --}}
  <h2>email :{{$email}} </h2>
 
  {{-- 3 --}}
  <h2> 생년월일 :{{$bth}}</h2>
 
  {{-- 4 --}}
  <h2>소속 : {{$aff}}</h2>


</body>
</html>