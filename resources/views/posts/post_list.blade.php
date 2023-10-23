<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿のリスト</title>
    <style>
        .inner {
            text-align: center;
            margin-bottom: 30px;
            
        }

        table {

            border: 1px solid #444444;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            border-bottom: 1px solid #444444;
            padding: 30px;
            text-align: center;
        }

        tr:nth-child(odd) {
            background-color: #f7f9fc;
        }

        tr:nth-child(eben) {
            background-color: #f7f9fc;
        }
        
      

        button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #87ceeb; /* 하늘색 */
  color: #fff; /* 흰색 */
  border-radius: 4px;
}

.button:hover {
   background-color: #6495ed; /* 더 진한 하늘색 */
}
    </style>
</head>

<body>
    <div class="inner">
        <h2>게시글 리스트 ({{ $count }}개 입니다)</h2>
        <button><a href="/posts/create" style=" text-decoration: none; /* 밑줄 제거 */ color: #fff">게시글 작성하기</a></button>
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
        @foreach ($posts as $post)
            <tr>
                <th>연번</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
            <tr>
                {{-- index는 loop에서 가져 꺼내야 한다.  --}}
                <td>{{ $loop->index + 1 }}</td> {{-- //반복에서 뽑아 낼 수 있도록 --}}
                <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td> {{-- 앵커 태그는 전부 get 방식으로 보낸다 --}}
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
