<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 수정</title>
</head>

<body>
    <form action="/posts/{{ $post->id }}" method="post"> {{-- 앞에 /  안 붙이면 현재 경로에서 붙여서 보낸다. --}}
        @csrf
        @method('put')
        {{-- PUT|PATCH   posts/{post} ........... posts.update › PostConroller@update --}}
        <h1 style="text-align: center">게시글 수정하기 페이지</h1>
        <div style="text-align: center; ">
            <div>
                <label>제목 : </label> <input type="text" name="title" value="{{ $post->title }}">
            </div>
            <div>
                <label>내용 : </label>
                <textarea name="content">
                {{ $post->content }}  {{-- 🟢 post 안의 content를 가져 오는 것 🟢  --}}
            </textarea>
            </div>
            <div>
                <label>작성자 : </label> <input type="text" value="{{ $post->user_id }}" readonly>
            </div>
            <div>
                <label>생성일 : </label> <input type="text" value="{{ $post->created_at }}" readonly>
            </div>
            <div>
                <label>수정일 : </label> <input type="text" value="{{ $post->updated_at }}" readonly>
            </div>
            <input type="submit" value="수정">
        </div>
    </form>
</body>

</html>
