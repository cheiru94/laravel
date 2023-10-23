<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post" action="/users/{{ $user['id'] }}">
        <div style="border: 3px black solid; padding:10px; width:auto; margin-bottom:30px">
            @csrf
            @method('put')
            {{-- 1 --}}
            <h2>이름 : <input type="text" name="name" value="{{ $user['name'] }}"></h2>

            {{-- 2 --}}
            <h2>email : <input type="text" name="email" value="{{ $user['email'] }}"></h2>

            {{-- 3 --}}
            <h2>생년월일 : <input type="text" name="birthDate" value="{{ $user['birthDate'] }}"></h2>

            <input type="submit" value="수정 완료">
        </div>
    </form>
</body>

</html>
