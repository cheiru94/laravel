<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        
        .form-container {
            width: 500px;
            margin: 0 auto; /* 가로 중앙 정렬 */
            margin-top: 30px;
        }

        .form-container h1 {
            font-size: 24px; /* 제목 크기 조정 */
            text-align: center;
        }

        .form-container label {
            font-size: 18px; /* 라벨 글씨 크기 조정 */
        }

        .form-container input[type=text],
        .form-container textarea {
            width: 100%; /* 입력 필드 가로폭 확보 */
            font-size: 16px; /* 입력 필드 글씨 크기 조정 */
            padding: 8px; /* 입력 필드 내부 여백 설정 */
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .text-center {
          text-align:center;
          margin-top:30px;
       }
       
       .text-center input[type=submit]{
           padding :10px 20 px ;
           background-color:#87ceeb ;
           color:#fff ;
           border:none ;
           border-radius :4 px ;
           font-weight:bold ;

       }
       
       .text-center input[type=submit]:hover{
         background-color:#6495ed ; 
         cursor:pointer ;

       }
    </style>
</head>

<body>

    <div class="form-container" style="width: 500px; margin-left:30px; margin-top:30px; ">
        <h1>게시글 작성</h1>

        {{-- 폼 태그로 전달 --}}
        <form action="/posts" method="post">
            @csrf
            {{-- 제목 , 내용 --}}
            <label>제목: <input type="text" name="title"></label><br>
            <label>내용 :
                <textarea name="content" rows="5"></textarea>
            </label>
           
            {{-- 버튼 --}}
            <div class="text-center" style="margin-top:30px;">
                <input type="submit"value="등록">
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
