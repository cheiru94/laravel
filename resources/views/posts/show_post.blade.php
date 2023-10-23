<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 상세보기</title>
</head>

<body>
    {{-- 모델객체를 손도 안 댓는데 이란다 대박 --}}
    <h1 style="text-align: center">상세 보기 페이지</h1>

    <div style="">
        <h2>제목 : {{ $post->title }}</h2>
        <h2>내용 : {{ $post->content }}</h2>
        <h2>작성자 : {{ $post->user_id }}</h2>
        <h2>생성일 : {{ $post->created_at }}</h2>
        <h2>수정일 : {{ $post->updated_at }}</h2>
    </div>

    {{-- 🟠 버튼 --}}
    <div>
        {{-- 🚩 수정 버튼  --}} {{-- 그럼 posts 컨트롤러의 edit 메소드가 이 받은 내용을 처리해 줘야 한다 --}}
        <form action="/posts/{{ $post->id }}/edit" method="get"> {{-- 이거는 앵커 태그로 보내도 된다  --}}
            <input type="submit" value="수정" /> {{-- put , patch 방식으로 보내야 한다 --}}
        </form>
        {{-- 🚩 삭제 버튼 --}}
        <form action="" method="post" onsubmit="return confirm('정말로 삭제하시겠습니까?');">
            @csrf
            @method('delete')
            <input type="submit" value="삭제" /> {{-- delete 방식으로 보내야 한다  --}}

        </form>
    </div>
    @livewireScripts
</body>

</html>
