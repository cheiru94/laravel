<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (count($user) == 0)
        <h2> 사용자를 찾을 수 없습니다. </h2>
    @else
        <h2> 사용자 상세 정보</h2>
        {{-- form  --}}
        <form method="post" action="/users/{{ $user['id'] }}">
            <div style="width:800px;  position:relative;">
                <div style="border: 3px black solid; padding:10px; width:auto; margin-bottom:30px">
                    {{-- 1 --}}
                    <h2>이름 : <span style="color: blue">{{ $user['name'] }}</span> </h2>

                    {{-- 2 --}}
                    <h2>email :{{ $user['email'] }} </h2>

                    {{-- 3 --}}
                    <h2> 생년월일 :{{ $user['birthDate'] }}</h2>

                </div>

                @csrf
                @method('delete')
                <div style="right: 5px; position: absolute;; display:inline-block;">
                    {{-- 삭제는 get 방식으로 사용할 수 없다 a태그 못쓴다는 뜻 --}}
                    <input type="submit" value="삭제버튼">
                    &nbsp;&nbsp;
                </div>
            </div>

        </form>

        <a href="/users/{{ $user['id'] }}/edit">
            <input type="submit" value="수정버튼">
        </a>
        {{-- 수정태그는 get 방식이라 a태그로 사용 가능하다 --}}
    @endif
</body>

</html>
