<?php
class AdminController {
    public $courses;
    public $admin;
    public $courses_registration;
    public $users;
    public $instructor;
    public $comment;
    public $category;
    function __construct(){
        $this->courses= new Courses();
        $this->admin= new Admin();
        $this->courses_registration= new Course_registration();
        $this->users= new Users();
        $this->instructor= new Instructor();
        $this->comment = new Comment();
        $this->category = new Category();
    }
    function register(){
        $title='đăng nhập với tư cách quản trị viên';
        $view="course/admin/register";
        require_once PATH_VIEW_MAIN;
    }
    function check_admin(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //nhận kết quả từ người dùng
            $data=$this->courses->getAll();
            //lưu một mảng đa chiều để nếu cần in ra dùng danh sách
            $data_admin=$this->admin->check($_POST['adminname'],$_POST['password']);
            
            //khi đăng nhập người dùng sẽ gửi đi 2 đối số mang là username và pass word mình sẻ gửi luôn vào model/user viết làm check
            //kiểm tra rỗng của hàm vừa in ra kiểm tra xem có tồn tại admin có tên như vậy không
            if(empty($data_admin)){
                //nếu sai thì 
                $message="<p style='color: red;'>Bạn đã đăng nhập thất bại</p>";
                
                $title='đăng nhập với tư cách quản trị viên';
                $view="course/admin/register";
                require_once PATH_VIEW_MAIN;
            }else{
                //nếu đúng thì
                // debug($data_admin); 
                $message="<p style='color: green;'>chào mừng đến với trang wep thưa chủ nhân</p>";
                $_SESSION['login'] = true;
                $_SESSION['admin'] = $data_admin['adminname'];
                $_SESSION['id_admin'] = $data_admin['id'];
                
                $title='Danh sách khóa học';
                $view="course/admin/list";
                require_once PATH_VIEW_MAIN;
            }
        }
    }
    function index(){
        $data=$this->courses->getAll();
        $title='THƯỢNG ĐẾ ƠI DANH SÁCH KHÓA HỌC Ở ĐÂY!!';
        $view="course/admin/list";
        require_once PATH_VIEW_MAIN;
    }
    function detail(){
        if(isset($_GET['id'])){
            $data=$this->courses->get($_GET['id']);
            $comment=$this->comment->get_comment($_GET['id']);
            if (!isset($data_comment)) {
                $data_comment = [];
            }            
                // debug($comment);
            if($comment){

                foreach($comment as $v){
                    $data_admin = $this->admin->get(1);                    

                    if($v['commenter_type']=='user'){
                        $data_comment[]=
                        [
                            'avatar_url'=> 'admin/1.jpg' ?? '',
                            'username'=>$data_admin['adminname'] ?? '',
                            'commenter_type'=> $v['commenter_type'] ?? '',
                            'date'=>$v['comment_date'],
                            'content'=> $v['content'] ?? '',
                            'isMine' => false,
                        ];                        
                    }else{
                        $data_comment[]=
                        [
                            'avatar_url'=>'1.jpg',
                            'username' => $data_admin['adminname'],
                            'commenter_type' => $v['commenter_type'],
                            'content'=> $v['content'],
                            'date'=>$v['comment_date'],
                            'isMine'=> true,
                        ];
                    }
                }       
            }
            // echo'<pre>';
            // echo"{$_SESSION['id_admin']}";
            // print_r($data_comment);
            $title='Danh sách khóa học';
            $view="course/admin/detail";
            require_once PATH_VIEW_MAIN;            
        }
        // hiển thị chi tiết sản phẩm và hiện thêm cả danh sách comment
    }
    public function comment(){
        if(isset($_SESSION['id_admin'])){
            $_SESSION['msg']="thiếu thông tin binh luận";
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'] ?? null;
            $content = $_POST['content']?? null;
            $commenter_type = $_POST['commenter_type']?? null;
            $commenter_id = $_SESSION['id_admin']?? null;
            if($course_id && $content && $commenter_id){
                $data = [
                    'course_id' => $course_id, 
                    'content' => $content, 
                    'commenter_type' => $commenter_type,
                    'commenter_id' => $commenter_id,
                ];        
                $this->comment->add($data);            
            }else{
                $_SESSION['msg']="thiếu thông tin binh luận";
            }
            header('location:'.BASE_URL_ADMIN.'&action=detail&id='.$course_id);
            exit;
        }
    }
    function delete(){
        try {
            if(!isset($_GET['id'])){
                throw new Exception("không có id");          
            }
            $course=$this->courses->get($_GET['id']);
            if(empty($course)){
                throw new Exception("không còn khóa học");
            }
            $row=$this->courses->delete($_GET['id']);
            if($row > 0){
                $_SESSION['status']=true;
                $_SESSION['msg']=("xóa không thành công");
            }else{
                throw new Exception("xóa không thành công");
            }
        } catch (\Throwable $th) {
                $_SESSION['status']=false;
                $_SESSION['msg']=$th->getMessage();            
        }
        header('location:'.BASE_URL_ADMIN);
        exit;
    }

    function create(){
        $data_cate = $this->category->getAll();   
        $data=$this->instructor->getAll();
        $title='hãy thêm khóa học đi, cố lên, cố lên!!!';
        $view="course/admin/create";
        require_once PATH_VIEW_MAIN;   
    }
    function add(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data=$_POST + $_FILES;
            // debug($data);
            if($data['thumbnail']['size']>0){
                $data['thumbnail']=upload_file('img',$data['thumbnail']);
            }else{
                $data['thumbnail']='img/1.jpg';
            }
            $this->courses->add($data);           
        }
        header('location:'.BASE_URL_ADMIN);
    }
    function edit(){
        if(isset($_GET['id'])){
            $data_in=$this->instructor->getAll();
            $data_cate = $this->category->getAll();
            $data=$this->courses->get($_GET['id']);
            $title='hãy chỉnh sửa khóa học đi, tất cả là vì con em chúng ta, cố lên, cố lên!!!';
            $view="course/admin/edit";
            require_once PATH_VIEW_MAIN;   
        }
    }
    function update(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data=$_POST + $_FILES;
            $course=$this->courses->get($_POST['id']);
            if($data['thumbnail']['size']>0){
                $data['thumbnail']=upload_file('img',$data['thumbnail']);
            }else{
                $data['thumbnail']=$course['thumbnail'];
            }
            $row=$this->courses->update($data); 
            if($row > 0 && file_exists($course['thumbnail'])){
                unlink($course['thumbnail']);
            }        
        }
        header('location:'.BASE_URL_ADMIN);
    }
    function user(){
        $data=$this->users->getAll();
        $title='THƯỢNG ĐẾ ƠI DANH SÁCH KHÓA HỌC Ở ĐÂY!!';
        $view="course/admin/user";
        require_once PATH_VIEW_MAIN;
    }
    function detail_user(){
        if(isset($_SESSION['user'])){
            if(isset($_GET['id'])){
                $data=$this->users->get($_GET['id']);
                $data_in=$this->courses_registration->getAll($data['id']);

                //echo "<pre>";
                // print_r($data_in);
                // echo "duan";
                // print_r($data);

                $title='hồ sơ người dùng';
                $view="course/admin/user_detail";
                require_once PATH_VIEW_MAIN;
            }
        }
    }
    function search_user(){
        if(isset($_GET['search']) && $_GET['search']!=''){
            $data=$this->users->search($_GET['search']);

        }else{
            $data = $this->users->getAll();
                
        }
        $title='Danh sách khóa học';
        $view="course/admin/user";
        require_once PATH_VIEW_MAIN;
    }
    function search_courses(){
        if(isset($_GET['search']) && $_GET['search']!=''){
            $data=$this->courses->search($_GET['search']);

        }else{
            $data = $this->courses->getAll();
        }
        $title='Danh sách khóa học';
        $view="course/admin/list";
        require_once PATH_VIEW_MAIN;
    }

    //tôi muốn tạo ra một hàm để in dữ liệu ra ngoài để cho mọi người nhận biết bao gồm
    //tên người dùng, ảnh đại diện bảng người dùng
    //nội dung comment in bảng comment, kiểm tra xem đâu là tin nhắn của mình
    //thêm vào bảng comment, nội dung loại người, 
}
?>