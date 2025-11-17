<?php
class HomeController
{
    public $courses;
    public $instructor;
    public $users;
    public $admin;
    public $courses_registration;
    public $comment;
    public $article;
    function __construct(){
        $this->courses= new Courses();

        $this->instructor = new Instructor();

        $this->users = new Users();

        $this->admin = new Admin();

        $this->courses_registration= new Course_registration();

        $this->comment = new Comment();

        $this->article = new Article();
    }
    // hiển thị danh sách khóa học
    public function index() 
    {
        $category = $this->courses->getAll_category();
        if(!isset($_SESSION['user'])){
            $_SESSION['user']='';
        }
        $data = $this->courses->getAll();
        $title='Danh sách khóa học';
        $view="course/user/list";
        require_once PATH_VIEW_MAIN;
    }
    //chi tiết khóa học
    public function detail() 
    {
        if(isset($_GET['id'])){
            $course_comment = $_GET['id'];
            $data = $this->courses->get($course_comment);

            $comment = $this->comment->get_comment($course_comment);

            //xử chuyển sang trang video nêu đã đăng khý khóa học
            //truy vấn tất cả các khóa học mà mình đã đăng ký sau đó so sánh id của cái get['id'] nấu có thì để chuyển sang trang video để học còn không thì để im
            //nhưng nếu mình để ở đây thì bình luận sẽ vô nghĩa hay mình để trong hàm takecourse nhỉ hoặc là chuyển phần bình luận vào trong bài viết nhỉ người cần học thì cứ đăng ký thôi dù gì cũng chưa có gì
            if(empty($comment)){
                $_SESSION['msg']="không có bình luận nào";
                $data_comment=[];
            }else{
                foreach($comment as $v){
                    $data_user=$this->users->get($v['commenter_id']);
                    $data_admin=$this->admin->get($v['commenter_id']);
                    if (!isset($data_comment)) {
                        $data_comment = [];
                    }
                    //debug($data_user);
                    if($v['commenter_type']=='admin'){
                        $data_comment[]=[
                            'avatar_url'=> 'admin/1.jpg' ?? '',
                            'username'=>$data_admin['adminname'] ?? '',
                            'commenter_type'=> $v['commenter_type'] ?? '',
                            'content'=> $v['content'] ?? '',
                            'isMine' => false,
                        ];                        
                    }else{
                        // Dòng tính toán $ismine (nên sửa để logic rõ ràng hơn)
                        $ismine = isset($_SESSION['id_user']) && ($_SESSION['id_user'] == ($data_user['id'] ?? null));
                        $data_comment[]=[
                            'avatar_url'=> $data_user['avatar_url'] ?? '',
                            'username'=>$data_user['username'] ?? '',
                            'commenter_type'=> $v['commenter_type'] ?? '',
                            'content'=> $v['content'] ?? '',
                            'isMine' => $ismine
                        ];                     
                    }
                }
            }   
            if(!isset($_SESSION['user'])){
                $message = "<p style='color: red;'>Bạn hãy đăng nhập để đăng ký khóa học.</p>";
            }
            $title='Chi tiết khóa học';
            $view="course/user/detail";
            require_once PATH_VIEW_MAIN;
        }
    }
    //comment khóa học
    function comment(){
        if(!isset($_SESSION['user'])){
            $_SESSION['msg'] = "bạn cần đăng nhập để bình luận";
            $_SESSION['status'] = false;
            header('location:'.BASE_URL.'?action=login');
            exit; 
        }else{
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy thông tin từ POST
                $course_id = $_POST['course_id'] ?? null;
                $commenter_type = $_POST['commenter_type'] ?? null;
                $content = $_POST['content'] ?? null;
                $commenter_id = $_SESSION['id_user'] ?? null; 

                // Kiểm tra dữ liệu
                if ($course_id && $commenter_type && $content && $commenter_id) {
                    $data = [
                        'course_id' => $course_id,
                        'commenter_type' => $commenter_type,
                        'commenter_id' => $commenter_id,
                        'content' => $content,
                    ];
                    
                    $this->comment->add($data);
                    $_SESSION['msg'] = "Bình luận của bạn đã được gửi.";
                    $_SESSION['status'] = true;
                } else {
                    $_SESSION['msg'] = "Bạn phải đăng nhập để bình luận";
                    $_SESSION['status'] = false;
                }          
            }
            header("Location: " . BASE_URL.'?action=detail&id='.$course_id);
            exit;
        }
    }
    //đăng ký khóa học
    function takecourse(){
        $data = $this->courses->getAll();
        if(!empty($_SESSION['user'])){
            if(isset($_GET['id'])){
                // debug($_SESSION['user']);
                $_SESSION['id_course']=$_GET['id'];
                $row=$this->courses_registration->add($_SESSION['id_user'],$_SESSION['id_course']);
                // thêm khóa học vào hồ sơ và trả về số dòng thay đổi rowcount
                $course = $this->courses->get($_SESSION['id_course']);
                //
                if($row == 0){
                    $_SESSION['msg']="Bạn đã đăng ký khóa học này rồi.";
                    //cái này là tiền đề  để chuyển hứng sang trang video
                    $_SESSION['status']=false;                    
                }else{
                    $_SESSION['msg']="Bạn đã đăng ký khóa học thành công:{$course['name']}";
                    $_SESSION['status']=true;                    
                }
            }else{
                $message = "<p style='color: red;'>Thiếu ID khóa học.</p>";
            }
        }else{
            $message = "<p style='color: red;'>Bạn hãy đăng nhập để đăng ký khóa học.</p>";
            $title='Đăng Nhập';
            $view="course/user/login";
            require_once PATH_VIEW_MAIN;
        }
        $title='Danh sách khóa học';
        $view="course/user/list";
        require_once PATH_VIEW_MAIN;             
    }
    //SHOW FORM ĐĂNNG KÝ
    public function register() 
    {
        $title='Đăng Ký';
        $view="course/user/register";
        require_once PATH_VIEW_MAIN;
    }
    //SHOW FORM ĐĂNG NHẬP
    public function login() 
    {
        $title='Đăng Nhập';
        $view="course/user/login";
        require_once PATH_VIEW_MAIN;
    }
    //Dăng ký 
    function add(){
        if($_SERVER['REQUEST_METHOD']=="POST"){

            $row=$this->users->add($_POST);
            if($row == 0){
                $_SESSION['msg']="tài khoản đã tồn tại";
                $_SESSION['status']=false;
                $view="course/user/register";
                require_once PATH_VIEW_MAIN;                
            }else{
                $_SESSION['id_user']= $row;
                $_SESSION['user']=$_POST['username'];
                $_SESSION['login']=true;

                header('location:'.BASE_URL); 
                exit;               
            }
        }
    }
    // Đăng nhập
    function check_user(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $data_in=$this->users->check($_POST['username'],$_POST['password']);
            //debug($data_in);
            $data = $this->courses->getAll();
            if(empty($data_in)){
                $message = "<p style='color: red;'>tên hoặc mật khẩu không đúng!</p>";
                $title='Đăng Nhập';
                $view="course/user/register";
                require_once PATH_VIEW_MAIN;
            }else{
                $message = "<p style='color: green;'>Bạn đã đăng nhập thành công!</p>";
                $_SESSION['login']=true;
                $_SESSION['user']=$data_in['username'];
                $_SESSION['id_user']=$data_in['id'];
                //cos thể thay thế session cho toàn bộ con người liên quan đến user kể từ khi đăng nhập
                //ngoại trừ comment vid nó dùng để tất cả mmoij người đều thấy chứ không chỉ có mỗi hết seseion thì không thấy nữa
                $title='Danh sách khóa học';
                $view="course/user/list";
                require_once PATH_VIEW_MAIN;    
            }
        }
    }
    //Tìm kiếm
    function search(){
        //tiếp theo là đến hàm search
        //lấy thông tin từ view form
        if(isset($_GET['search']) && $_GET['search']!=''){
            //gọi hàm trong model user để xem người dùng tìm cái gì
            $data=$this->courses->search($_GET['search']);
        }else{
            $data = $this->courses->getAll();
        }
        $title='Danh sách khóa học';
        $view="course/user/list";
        require_once PATH_VIEW_MAIN;
    }
    //danh mục
    function category(){
        $category = $this->courses->getAll_category();
        if(isset($_GET['category']) && $_GET['category']!=''){
            $data=$this->courses->category($_GET['category']);
        }else{
            $data = $this->courses->getAll();
            
        }
        if(!isset($_GET['category'])){
            $title='Danh sách khóa học';      
        }else {
            foreach($category as $cate){
                if($_GET['category'] == $cate['category_id']){
                    $title='Lộ trình khóa học '.$cate['categoryName']; 
                    break;
                }
            }
        }
        $view="course/user/list";
        require_once PATH_VIEW_MAIN;
    }
    //Hồ sơ
    function infor(){
        if(isset($_SESSION['user'])){
            $data=$this->users->get($_SESSION['id_user']);
            $_SESSION['id_usercourse']=$data['id'];
            $data_in=$this->courses_registration->getAll($_SESSION['id_usercourse']);

            // echo "<pre>";
            // print_r($data_in);
            // echo "duan";
            // print_r($data);

            $title='hồ sơ người dùng';
            $view="course/user/myinfor";
            require_once PATH_VIEW_MAIN;
        }
    }
    // xóa khóa học
    function delete(){
        if(isset($_GET['id'])){
            $this->courses_registration->delete($_GET['id']);            
        }
        header('location:'.BASE_URL.'?action=infor');
    }
    // SHOW trang liên hệ
    function contact(){
        $title='liên hệ đến chúng TÔI';
        $view="course/user/contact";
        require_once PATH_VIEW_MAIN;    
    }
    // đăng xuất
    function logout(){
        $_SESSION = [];
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }
    //hiển thị tất cả bài viết
    function show_article_list(){
        //lấy tất cả bài viết
        $data_all_article = $this->article->allArticle();
        // debug($data_all_article);
        $data = [];
        if(!empty($data_all_article)){
            foreach($data_all_article as $v){
                $data_user=$this->users->get($v['id_user']);
                $data[]=[
                    'id'=>$v['id'],
                    'id_user'=>$v['id_user'],
                    'title'=>$v['title'],
                    'content'=>$v['content'],
                    'images'=>$v['images'],
                    'create_at'=>$v['create_at'],
                    'username'=>$data_user['username'] ?? '',
                    'avatar_user'=>$data_user['avatar_url'] ?? '',
                ];
            }
        }else{
            $got_it = "Chưa có bài viết nào";
        }
        //lấy tất cả bài viết của một id người dùng
        // debug($data);
        $title='Tất cả bài viết';
        $view="course/article/epicenter_article";
        require_once PATH_VIEW_MAIN;    
    }
    //hiển thị chi tiết bài viết
    function detail_article(){
        if(isset($_GET['id'])){
            $data_article = $this->article->getArticle($_GET['id']);
            $data_user=$this->users->get($data_article['id_user']);
            $data_authors = [];
            $data = [];
            //lấy tât cả bài viết của tác giả *
            //lấy hết bài viết cùng tác giả
            $data_authur_article = $this->article->getArticle_by_user($data_article['id_user']);
            foreach ($data_authur_article as $v) {
                //lặp qua mảng và nếu article_id trùng với $_GET['id'] thì bỏ qua
                if ($v['id'] == $_GET['id']) {
                    continue; // Bỏ qua bài viết hiện tại
                }
                $data_user_authur=$this->users->get($v['id_user']);
                $data_authors[]=[
                    'id'=>$v['id'],
                    'id_user'=>$v['id_user'],
                    'title'=>$v['title'],
                    'content'=>$v['content'],
                    'images'=>$v['images'],
                    'create_at'=>$v['create_at'],
                    'username'=>$data_user_authur['username'] ?? '',
                    'avatar_user'=>$data_user_authur['avatar_url'] ?? '',
                ];
            }
            //lấy tất cả bài viết
            $data_all_article = $this->article->allArticle();
            foreach($data_all_article as $v){
                $data_user_all=$this->users->get($v['id_user']);
                $data[]=[
                    'id'=>$v['id'],
                    'id_user'=>$v['id_user'],
                    'title'=>$v['title'],
                    'content'=>$v['content'],
                    'images'=>$v['images'],
                    'create_at'=>$v['create_at'],
                    'username'=>$data_user_all['username'] ?? '',
                    'avatar_user'=>$data_user_all['avatar_url'] ?? '',
                ];
            }


            // debug($data_article);
            $title='Chi tiết bài viết';
            $view="course/article/detail_article";
            require_once PATH_VIEW_MAIN;    
        }
    }
    //hiển thị bài viết của tôi
    function my_article(){
        $getArticle_by_user = $this->article->getArticle_by_user($_SESSION['id_user']);
        $user = $this->users->get($_SESSION['id_user']);
        $data=[];
        foreach($getArticle_by_user as $v){
            $data[]=[
                'username'=> $user['username'],
                'avatar_url'=> $user['avatar_url'],
                'id_user'=> $v['id_user'],  
                'title'=> $v['title'],
                'content'=> $v['content'],
                'images'=> $v['images'],
                'create_at'=> $v['create_at'],
                'id'=>$v['id']
            ];
        }
        // debug($data);
        $title='Bài viết của tôi';
        $view="course/article/my_article";
        require_once PATH_VIEW_MAIN;    
    }
    //hiển thị form tạo bài viết
    function show_create_article(){
        $title='Tạo bài viết mới';
        $view="course/article/create_article";
        require_once PATH_VIEW_MAIN;    
    }
    //xử lý tạo bài viết
    function create_article(){
        //thêm phần tử id_user vào cuối mảng
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST + $_FILES;
            $data['id_user'] = $_SESSION['id_user'] ?? 0;
            if($data['images']['size']>0 ){
                $data['images'] = upload_file('article',$data['images']);
            }else{
                $data['images'] = '';
            }
            // debug($data);
            $this->article->insert($data);
        }
        header('LOCATION:'.BASE_URL.'?action=my_article');
        exit;
    }
    //xử lý xóa bài viết
    function delete_article(){
        if(isset($_GET['id'])){
            $row = $this->article->delete($_GET['id']);
            if($row ===1){
                $_SESSION['msg']="đã xóa thành công!";
                $_SESSION['status'] = true;
            }
            header('LOCATION:'.BASE_URL.'?action=my_article');
            exit;
        }  
    }
    //xử lý sửa bài viết
    function show_form_update(){
        if(isset($_GET['id'])){
            $data = $this->article->getArticle($_GET['id']);
            // debug($data);
            $title='Sửa bài viết';
            $view="course/article/update_article";
            require_once PATH_VIEW_MAIN;   
        }
    }
    function update_article(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST + $_FILES;
            $article=$this->article->getArticle($_POST['id']);
            // debug($data, $article);
            //
            if($data['images']['size']>0){
                $data['images']=upload_file('user',$data['images']);
            }else{
                $data['images']=$article['images'];
            }
            $row=$this->article->update($data); 
            if($row > 0 && file_exists($article['images'])){
                unlink($article['images']);
            }        
            header('location:'.BASE_URL.'?action=my_article');
            exit;   
        }
    }
    //xử lý thêm bình luận bài viết

    //show unit
    function show_unit(){
        $title='teen bai';
        $view="course/learn";
        require_once PATH_VIEW_MAIN;   
    }
}
?>