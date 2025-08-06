<?php
$action = $_GET['action'] ?? '/';

if(isset($_GET['mode']) && $_GET['mode']=='admin'){
    match($action){
        '/'=>(new AdminController)->index(),
        'register'      =>(new AdminController)->register(),
        'check'     =>(new AdminController)->check_admin(),
        'delete'        =>(new AdminController)->delete(),
        'create'        =>(new AdminController)->create(),
        'edit'      =>(new AdminController)->edit(),
        'add'       =>(new AdminController)->add(),
        'update'        =>(new AdminController)->update(),
        'user'      =>(new AdminController)->user(),
        'detail'        =>(new AdminController)->detail(),
        'detail_user'       =>(new AdminController)->detail_user(),
        'search_user'       =>(new AdminController)->search_user(),
        'search_courses'        =>(new AdminController)->search_courses(),
        'comment'       =>(new AdminController)->comment(),
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
        'update'         => (new HomeController)->update(),
        'delete'         => (new HomeController)->delete(),
        'logout'         => (new HomeController)->logout(),
        'comment'         => (new HomeController)->comment(),
    };    
}
