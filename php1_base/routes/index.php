<?php
$action = $_GET['action'] ?? '/';

if(isset($_GET['mode']) && $_GET['mode']=='admin'){
    match($action){
        '/'=>(new AdminController)->index(),
        'register'      =>(new AdminController)->register(),
        'check'     =>(new AdminController)->check_admin(),
        'delete'        =>(new AdminController)->delete(),
        'detail'        =>(new AdminController)->detail(),
        'create'        =>(new AdminController)->create(),
        'edit'      =>(new AdminController)->edit(),
        'add'       =>(new AdminController)->add(),
        'update'        =>(new AdminController)->update(),
        'comment'       =>(new AdminController)->comment(),
        'category'       =>(new AdminController)->index(),

        'user'      =>(new AdminController)->user(),
        'search_user'       =>(new AdminController)->search_user(),
        'search_courses'        =>(new AdminController)->search_courses(),
        'delete_user'       =>(new AdminController)->delete_user(),
        'detail_user'       =>(new AdminController)->detail_user(),
        'update_user'       =>(new AdminController)->update_user(),
        'show_category'       =>(new AdminController)->show_category(),


        'delete_category'       =>(new AdminController)->delete_category(),
        'create_category'       =>(new AdminController)->create_category(),
        'add_category'       =>(new AdminController)->add_category(),
        'edit_category'       =>(new AdminController)->edit_category(),
        'update_category'       =>(new AdminController)->update_category(),
         
    };
}else{
    match ($action) {
        '/'         => (new HomeController)->index(),
        'detail'         => (new HomeController)->detail(),
        'takecourse'         => (new HomeController)->takecourse(),
        'register'         => (new HomeController)->register(),
        'login'         => (new HomeController)->login(),
        'add'         => (new HomeController)->add(),
        'check'         => (new HomeController)->check_user(),
        'search'         => (new HomeController)->search(),
        'infor'         => (new HomeController)->infor(),
        'delete'         => (new HomeController)->delete(),
        'logout'         => (new HomeController)->logout(),
        'comment'         => (new HomeController)->comment(),
        'category'         => (new HomeController)->category(),
        'contact'         => (new HomeController)->contact(),
        //sửa thông tin người dùng
        'edit_user'         => (new AdminController)->edit_user(),

        //hiển thị tất cả bài viết 
        'show_article_list'=> (new HomeController)->show_article_list(),
        'detail_article'=> (new HomeController)->detail_article(),
        'my_article'=> (new HomeController)->my_article(),
        'show_create_article'=> (new HomeController)->show_create_article(),
        'create_article'=> (new HomeController)->create_article(),
        'delete_article'=> (new HomeController)->delete_article(),
        'show_form_update'=> (new HomeController)->show_form_update(),
        'update_article'=> (new HomeController)->update_article(),
        
        
        'show_unit'=> (new HomeController)->show_unit(),
    };    
}
