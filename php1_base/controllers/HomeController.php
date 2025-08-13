<?php
class HomeController
{
    public $courses;
    public $instructor;
    public $users;
    public $admin;
    public $courses_registration;
    public $comment;
    function __construct(){
        $this->courses= new Courses();

        $this->instructor = new Instructor();

        $this->users = new Users();

        $this->admin = new Admin();

        $this->courses_registration= new Course_registration();

        $this->comment = new Comment();
    }
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
    public function detail() 
    {
        if(isset($_GET['id'])){
            $course_comment = $_GET['id'];
            $data = $this->courses->get($course_comment);
            // debug($data);
            $comment = $this->comment->get_comment($course_comment);
            //debug($comment);
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
                        $data_comment[]=
                        [
                            
                            'avatar_url'=> 'admin/1.jpg' ?? '',
                            'username'=>$data_admin['adminname'] ?? '',
                            'commenter_type'=> $v['commenter_type'] ?? '',
                            'content'=> $v['content'] ?? '',
                            'isMine' => false,
                        ];                        
                    }else{
                        $ismine=isset($_SESSION['id_user']) && $_SESSION['id_user'] == $data_user['id'];
                        $data_comment[]=
                        [
                            'avatar_url'=> $data_user['avatar_url'] ?? '',
                            'username'=>$data_user['username'] ?? '',
                            'commenter_type'=> $v['commenter_type'] ?? '',
                            'content'=> $v['content'] ?? '',
                            'isMine' => $ismine,
                        ];                     
                    }
                }
            }
            // echo "<pre>";
            // echo "data_comment";   
            // print_r($data_comment);   
            // echo "comment";    
            // print_r($comment);     
                    
            if(!isset($_SESSION['user'])){
                $message = "<p style='color: red;'>Bạn hãy đăng nhập để đăng ký khóa học.</p>";
            }
            $title='Chi tiết khóa học';
            $view="course/user/detail";
            require_once PATH_VIEW_MAIN;
        }
    }
    //comment
    function comment(){
        if(!isset($_SESSION['user'])){
            $_SESSION['msg'] = "bạn cần đăng nhập để bình luận";
            $_SESSION['status'] = false;
            header('location:'.BASE_URL);
            exit; 
        }else{
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy thông tin từ POST
                $course_id = $_POST['course_id'] ?? null;
                $commenter_type = $_POST['commenter_type'] ?? null;
                $content = $_POST['content'] ?? null;
                $commenter_id = $_SESSION['id_user'] ?? null; // lấy từ session an toàn hơn

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
                    $_SESSION['msg'] = "Thiếu thông tin bình luận.";
                    $_SESSION['status'] = false;
                }          
            }
            header("Location: " . BASE_URL.'?action=detail&id='.$course_id);
            exit;
        }
    }
    //tôi muốn tạo ra một hàm để in dữ liệu ra ngoài để cho mọi người nhận biết bao gồm
    //tên người dùng, ảnh đại diện bảng người dùng
    //nội dung comment in bảng comment, kiểm tra xem đâu là tin nhắn của mình
    //thêm vào bảng comment, nội dung loại người, 

    function takecourse(){
        $data = $this->courses->getAll();
        if(!empty($_SESSION['user'])){
            if(isset($_GET['id'])){
                // debug($_SESSION['user']);
                $_SESSION['id_course']=$_GET['id'];
                $row=$this->courses_registration->add($_SESSION['id_user'],$_SESSION['id_course']);
                //đánh dấu
                $course = $this->courses->get($_SESSION['id_course']);
                //debug($user);
                if($row == 0){
                    $_SESSION['msg']="Bạn đã đăng ký khóa học này rồi.";
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
        }
        $title='Danh sách khóa học';
        $view="course/user/list";
        require_once PATH_VIEW_MAIN;             
    }
    public function register() 
    {
        $title='Đăng Ký';
        $view="course/user/register";
        require_once PATH_VIEW_MAIN;
    }
    public function login() 
    {
        $title='Đăng Nhập';
        $view="course/user/login";
        require_once PATH_VIEW_MAIN;
    }
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
    function category(){
        $category = $this->courses->getAll_category();
        // echo "<pre>";
        // print_r($category);
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
    function update(){
        //them email, dia chi
    }
    function delete(){
        if(isset($_GET['id'])){
            $this->courses_registration->delete($_GET['id']);            
        }
        header('location:'.BASE_URL.'?action=infor');
    }
    function contact(){
        $title='liên hệ đến chúng TÔI';
        $view="course/user/contact";
        require_once PATH_VIEW_MAIN;
    }
    function logout(){
        $_SESSION = [];
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }
}