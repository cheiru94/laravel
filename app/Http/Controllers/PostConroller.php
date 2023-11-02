<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 🟢 리스트를 보여주는 기능을 수행한다.
        // DM의 post 테이블의 레코드들을 읽어 온다. 
        // $posts = Post::all(); //🟠  Post::all();은 'posts' 테이블에 있는 모든 레코드를 가져오라는 의미= 
        //-> select * from post; 이렇게 가져온다., 근데 이건 그냥 레코드 가져 오는 거다
        // post 객체의 collectioni 이라는 집합 자료형으로 반환해준다. 

        // 🟢 내림 차순으로 이렇게 정렬하라고 명시를 해준다.   // all()도 체이닝이 안되는 함수이다. 
        // 컬렉션이 리턴된다. 
        $posts = Post::orderBy("created_at", "desc")->get(); // 🟡 방법 1
        // $posts = Post::orderByDesc("created_at")->get(); // 🟡 방법 2  // 검색 조건을 만족하는 기능을 넣을 때는 where절도 사용한다. 

        /*  이런 내용이 담겨 있다....입력했던 각 레코드들이 한 줄씩 들어있다...!
        한 줄은 하나의 레코드를 나타낸다.
        컬렉션은 Laravel에서 제공하는 유용한 도구로, 
        배열과 비슷한 동작을 하지만 좀 더 다양한 조작을 쉽게 수행할 수 있도록 도와줍니다. 
        $posts 변수에는 여러 개의 레코드가 포함될 수 있으며, 각 레코드는 연관된 속성들을 가지고 있습니다.

        예를 들어, $posts 변수의 첫 번째 레코드에 접근하려면 
        $posts[0]와 같이 인덱스를 사용하여 해당 레코드에 접근할 수 있습니다. 
        또는 foreach 루프를 사용하여 $posts 컬렉션의 
        각 레코드를 순회하며 작업을 수행할 수도 있습니다.


            $posts = [
                            [
                                'id' => 1,
                                'title' => '첫 번째 포스트',
                                'content' => '첫 번째 포스트의 내용입니다.',
                                'created_at' => '2022-01-01 10:00:00',
                                'updated_at' => '2022-01-01 10:00:00',
                                'user_id' => 1,
                            ],
                            [
                                'id' => 2,
                                'title' => '두 번째 포스트',
                                'content' => '두 번째 포스트의 내용입니다.',
                                'created_at' => '2022-01-02 14:30:00',
                                'updated_at' => '2022-01-02 14:30:00',
                                'user_id' => 3,
                            ],
                            // 추가적인 레코드들...
            ];

        */


        // all() 은 종료 함수이다.
        // $count = Post::count(); // count가 전달된다.  , 그런데 이걸 디비에 보낸다는 듯이다. 
        $count = $posts->count();




        /* 관계형 데이터 베이스가 기반으로 하는 이론이, 집합 이론이다. 그래서 순서가 없다. 
            그래서 sql문에 있는 명령어가 orderby 절을 사용하는 것이다. 원래는 순서가 없기 때문에.
        */


        /* 
            Post 클래스는 일반적으로 데이터베이스 내의 'posts'라는 이름의 테이블과 연결됩니다.
            이 클래스의 인스턴스 하나가 'posts' 테이블의 레코드 하나를 나타내며,
             Post::all()과 같은 메서드를 호출함으로써 해당 테이블에서 모든 레코드를 가져올 수 있습니다.
        */




        // 그렇게 읽어온 레코드들을 view로 전달한다   -> 뷰는 전달받은 레코드들을 이용해서 동적으로 페이지를 만들어 준다.
        return view('posts.post_list', ['posts' => $posts, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.register_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;

        // /*    🟢 사용자로 부터 입력 받은 내용을 Eloquent를 사용해 DB에 저장하기 🟢 */
        // /* 🟢 1. 새로운 Post 모델의 인스턴스를 생성 */
        // $post = new Post; //  Post() 해도 됨  

        // /* 🟢 2.만든 인스턴스에 대해 속성들을 설정   */
        // $post->title = $title;
        // $post->content = $content;
        // $post->user_id = 2;  // 로그인한 사용자 id를 가져와야 한다. => 사용자 로그인 기능 추가될 때까지는 하드코딩 ㅇㅇ

        // /* 🟢 3. 데이터 베이스에 인스턴스 저장   */
        // $post->save(); // 호출하면 자동으로 객체의 내용이 하나의 레코드로 저장 된다. 


        

        /* 🟢 create */
        //이렇게 create로 여러개 값을 넣을 때는 작업을 하나 더 해줘야한다.
        // Post::create(['title' => $title, 'content' => $content, 'user_id' => 2]); // 레코드를 이렇게 넣을 수 도 있다
        // $request->input('user_id', '2'); /// 필요 없음

        // $result = [...$request, {user_id = 1 }] // 그냥 병합이라고 보면됨 밑에 있는 함수가 이런 느낌으로 동작한다고 생각하면 됨
        
        $request->merge(['user_id' => 1]);
        // $request->merge(['created_at' => 1994]);

        // dd($request->all());

        Post::create($request->all()); // fillable안의 내용만 뽑을 수 있다.

        return redirect('/posts'); // 🚩redirect는 무조건 get 방식 요청 => posts요청을 다시 보내면 index를 보낸다. 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //  🟢 id로 명시되어 온 자원을 출력해줘라
        // DB의 posts 테이블에서 id 칼럼 값이 $id와 일치하는 레코드를 읽어온다.
        // 읽어온 그 레코드 블레이드 뷰 파일에 전달한다.  

        /* 🟡 방법 1 : find로 찾기   find는 기본적으로 primary키를 기반으로 검색을 해서 객체 하나를 리턴함 */
        // $post = Post::find($id); // select * from posts where id =$id;  , 

        /* 예외 처리를 함께 해보자 */
        $post = Post::findOrfail($id); // 이렇게 해주면 404 | NOT FOUND 페이지가 나온다.

        /* 🟡 방법 2 : where로 찾기 */
        //            id 가  $id 인 값을 찾아라  , 방법 1과 같다.

        // $post = Post::where('id', $id)->get(); // 마지막은 get()으로 끝을 내줘야 한다. 


        /*  ✏️ get() 메소드를 쓰면  왜 컬렉션을 반환하니??

            Laravel의 Eloquent ORM에서 get() 메소드는 데이터베이스로부터 레코드를 조회하여 그 결과를 컬렉션 형태로 반환합니다.

            컬렉션(Collection)은 Laravel에서 제공하는 유용한 도구로, 배열에 대한 다양한 조작을 보다 편리하게 수행할 수 있도록 돕습니다. 
            컬렉션 인스턴스는 배열과 비슷하게 동작하지만,  
            map(), filter(), sort(), reduce() 등의 메소드를 사용하여 각 요소에 대해 다양한 연산을 적용할 수 있습니다.

            get() 메소드가 컬렉션을 반환하는 이유는 이러한 유연성 때문입니다. 
            Eloquent ORM은 데이터베이스와의 상호작용을 추상화하여 
            개발자가 더 직관적인 코드로 데이터를 처리할 수 있도록 돕는데, 이 과정에서 컬렉션이 중요한 역할을 합니다.


        */


        /* 🟢 아래의 이 세가지는 같은 뜻이다 🟢 */
        // $post = Post::find('id', $id); // 프라이머리 키가 무엇인지 알 때 사용
        // $post = Post::where('id', $id)->first(); // 레코드가 1개 밖에 없다는 것을 알떄 이렇게 쓴다. 고로 무조건 프라이머리 키임 
        // $post = Post::firstwhere('id', $id);




        // dd($post->title[0]); // where절을 사용하면 컬렉션을 반환 해주기 때문에 이렇게 몇번째인지 알려줘야 한다. 
        // dd($post); // die & dump 함수 



        // ⭐  get으로 끝나면 반환하는 값은 콜렉션이다!!!  ⭐

        /* 🟡 where절 사용법 */
        // Post::where('id', '>', $id); // select *from posts where id > $id;   이렇게 조건을 주어 연산자를 사용할 수 있다

        /* 🟡 and 사용 법  '->' 로 그냥 붙인다 */
        // select *from posts where id > $id and name = '홍길동';
        // Post::where('id','>'$id')-> where('name','홍길동')->get();

        /* 🟡 or 사용 법  'orWhere'로 이렇게 or을 where에 사용한다. */
        //select*from posts where 'id' > $id or name = '홍길동';
        //Post::where('id','>',$id) ->orWhere('name','홍길동')->get();



        return view('posts.show_post', ['post' => $post ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // DB post 테이블에서 id 칼럼의 값이 $id인 레코드를 인출 
        $post = Post::find($id); // select * from posts where id = $id

        // 그 레코드를 편집 form 페이지를 생성하는 블레이드에게 전달 
        return view('posts.edit_post', ['post' => $post]); // .앞에 나오는 거는 폴더 이름이다.
        // $posts = $id;


    }

    /**
     * Update the specified resource in storage.
     */
    //                   사용자가 입력한 것   ,  어떤것을 입력해야 하는지
    public function update(Request $request, string $id)
    {
        // DB posts 테이블에서 id 칼럼의 값이 $id인 레코드를 찾아서 
        // 사용자가 입력한 title, content로 변경해 준다.
        // update post set title=? , content=? where id=?  이렇게 실행해 줘야 한다.

        //🟢새로운 모델 인스턴스를 생성하고 save 메서드를 호출하면 데이터베이스에 저장됨
        // $post = Post::find($id);
        // $post->title = $request->title;
        // $post->content = $request->content;

        // 새로운거 넣을 떄도 save( ) , 변경할 떄도 save() 메소드를 쓴다.
        // $post->save();
        //  update post set title=? , content=? where id=? 이 동작을 실행할 것이다.



        // 의미 :  update posts set title=? , content=? , where id = ?
        Post::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content
            // '_token' => $request->'werhlfuiwehlfuhwe'
        ]);

        /*  🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢
            update는 모델 클래스의 화이트 리스트와 블랙 리스트를 참조하지 않는다!!!
            연관 배열에 있는 모든 키를 변경할 칼럼 이름으로 간주하고 update문을 생성해 실행한다. 
        */
        // Post::where('id', $id)->update(
        //     [
        //         $request->all()
        //     ]
        // );
        // =>  // '_token' => $request->'werhlfuiwehlfuhwe' 이런거 까지 추가하는 개념이다

        //상세 보기 페이지로 리다이렉트 한다. 
        // return redirect('/posts/' . $post->id); // 무조건 get 요청 
        return redirect('/posts/' . $id); // update메소드 사용시 이렇게 해도 된다. 굳이 $posts를 줄 필요는 없다
    }

    /**
     * Remove the specified resource from storage.ㄴ
     */
    public function destroy(string $id)
    {
        // DB posts 테이블에서 id 칼럼 값이 $id 인 레코드를 삭제한다.
        Post::destroy($id); // delete from posts where id = ?

        // posts 리스트 보기   
        return redirect('/posts');
    }
}
