
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* viewport height */
      }
      .form-container {
        width: 500px;
      }
    </style>
  </head>
  <body>

    <div class="form-container" style="width: 500px; margin-left:30px; margin-top:30px; ">
      <h1>박성철 교수님과 함게하는 Laravel 실습 강좌 신청</h1>


      <form action="/update" method="post">

        @method("put")

        @csrf
        {{-- 1 --}}
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">이름</label>
          <input type="text" class="form-control" id="exampleFormControlInput1"  value="이재일" name="name" readonly> 
        </div>
        {{-- 2 --}}
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">생년월일(YYYY/MM/DD)</label>
          <input type="text" class="form-control" id="exampleFormControlInput1"  value="19941001" name="birthday" readonly>
        </div>
        {{-- 3 --}}
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="lji941001@naver.com" name="email">
        </div>
        {{-- 4 --}}
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">소속</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" value="SoftBank" name="affiliation">
        </div>

        {{-- 버튼 --}}
        <div class="text-center" style="margin-top:30px;">
          <button type="submit" class="btn btn-primary">수정</button>
        </div>

      </form>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>