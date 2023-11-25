<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 상세보기</title>

    {{-- 자바스크립트 내용 --}}
    <script type="text/javascript">
        function send_delete(num) {

            return confirm("니 진짜 지울래?");

        }
    </script>
</head>

<body>  
    <div><a href="/posts">목록보기로 돌아가기</a></div>
    {{-- 모델객체를 손도 안 댓는데 이란다 대박 --}}  
    <h1 style="text-align: center">상세 보기 페이지</h1>

    <div> 제목: {{$post->title}} </div>
    <div> 내용: {{$post->content}}</div>
    <div> 작성자: {{$post->user_id}}</div>
    <div> 생성일: {{$post->created_at}}</div>
    <div> 수정일: {{$post->updated_at}}</div>  

    {{-- 🟠 버튼 --}}
    <div >

        {{-- 🚩 수정 버튼  --}} {{-- 그럼 posts 컨트롤러의 edit 메소드가 이 받은 내용을 처리해 줘야 한다 --}}
        <div style="display: flex; width:300px; ">
            <form action="/posts/{{$post->id}}/edit" method="get" style="margin-right: 10px"> {{-- 이거는 앵커 태그로 보내도 된다  --}}
                <input type="submit" value="수정" /> {{-- put , patch 방식으로 보내야 한다 --}}
            </form>
            {{-- 🚩 삭제 버튼 --}}
            <form style="display:inline-block" onsubmit="return confirm('Are you sure to delete?')" action="/posts/{{$post->id}}" method="post">
                @csrf
                @method("delete")
                <input type="submit" value="삭제"/> {{-- delete 방식으로 보내야 한다. --}}
              </form> 
        </div>

        <hr>

        {{-- 🍑댓글 추가  --}}
        <h4>댓글 등록</h4>
        <form action="/posts/{{$post->id}}/comments" method="post">
            @csrf
            <div>
              <textarea rows="1" cols="30" required name="content"></textarea>
            </div>  
            <input type="submit" value="댓글등록">
        </form>

    </div>

    {{-- 댓글 보여주기 --}}
    <div>
        <div class="inner">
            <h2>댓글 리스트 ({{$post->comments->count()}}개) </h2>
            
        </div> 
       <table style=" border : 1px solid black; ">
            {{--
                $posts는 Post 모델의 객체들을 담고 있는 배열 ,
                이 배열은 컨트롤러에서 해당 뷰로 전달되었을 것 
    
                $post 변수에는 한 개의 레코드 정보가 들어있습니다.
    
                위 코드에서 @foreach ($posts as $post) 구문은 
                $posts 배열을 순회하면서 각각의 요소를 $post 변수에 할당합니다. 
                $posts 배열은 Post 모델의 객체들을 담고 있으며, 이 객체들은 각각 데이터베이스 테이블의 한 레코드에 해당합니다.
    
                따라서, 반복문이 실행되는 동안 $post는 매번 다른 Post 객체를 참조하게 되며, 
                이 Post 객체는 데이터베이스 테이블에서 가져온 한 레코드의 정보를 담고 있습니다.
    
                즉, $post에는 한 번에 하나의 레코드 정보만 들어있습니다. 
                그러나 반복문을 통해 전체 $posts 배열을 순회하면서 모든 레코드들에 대한 정보를 처리할 수 있습니다
            --}}

            
            <tr>
                <th>연번</th>  <th>제목</th> <th>작성자</th>  <th>작성일</th>
            </tr>
            {{-- @foreach ($post->comments as $comment) --}}
            @foreach($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
                <tr>
                    {{-- 수정 : put --}}
                    <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" 
                        method="post">
                        {{-- index는 loop에서 가져 꺼내야 한다.  --}}
                        <td>{{ $loop->index + 1 }}</td> {{-- //반복에서 뽑아 낼 수 있도록 --}}
                        <td><input type="text" name="content" value="{{ $comment->content }}"></td> {{-- 앵커 태그는 전부 get 방식으로 보낸다 --}}
                        <td>{{ $comment->user_id }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td><input type="submit" value="수정"></td>
                        @csrf
                        @method("put")
                    </form>

                    {{-- 삭제 : delete --}}
                    <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" method="post">
                        <td><input type="submit" onclick="return send_delete()" value="삭제"></td>
                        @csrf
                        @method("delete")
                    </form>

                    </tr>
            @endforeach
        </table>
    </div>
    {{-- <script>
        const send_delete = (id) =>{
            const result = confirm('니 진짜 삭제 할끼가???');
            console.log('니 진짜 지울꺼가??');
            if (result == false) {
                return false;
            } 
            // 이 html 문서에서 이름이 _method 인 DOM 객체를 찾아서
            // 그 객체의 value 값을 "delete"로 변경하고 return true 하면
            // 서버로 요청이 발송된다.
            const formTag = document.getElementById()
            const methodTags =  document.getElementsByName("    ");
            methodTags[0].valuee = "delete";
            return false;
        }
    </script>
     --}}
</body>

</html>
