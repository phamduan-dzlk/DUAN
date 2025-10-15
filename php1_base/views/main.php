<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Base MVC PHP 1' ?></title>


  <!-- Bootstrap -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- NAVBAR -->
<header class="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4" style="position:fixed; top:0;left:0;right:0; z-index:1;">
    <div class="container px-4 ">
      <a class="navbar-brand fw-bold text-uppercase" href="<?= BASE_URL ?>">phaun</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-between" id="mainNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Trang chủ</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?= BASE_URL . '?action=contact'?>"><b>LIÊN HỆ</b></a>
          </li>
            <?php if(isset($_GET['mode']) && $_GET['mode'] == 'admin'){?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?= BASE_URL.'?mode=admin&action=register' ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">QUẢN LÝ TRANG WEB</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="<?=BASE_URL.'?mode=admin&action=user'?>">Quản lý người dùng</a></li><hr>
                      <li><a class="dropdown-item" href="<?=BASE_URL.'?mode=admin&action=create'?>">Thêm khóa học</a></li><hr>
                        <li><a class="dropdown-item" href="<?=BASE_URL.'?mode=admin&action=show_category'?>">Chỉnh sủa lộ trình</a></li>
                    </ul>            
              </li>      
            <?php }else{?>      
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL.'?mode=admin&action=register' ?>">QUẢN LÝ TRANG WEB</a>
              </li>
            <?php }?>
        </ul>

        <div class="d-flex align-items-center">
          <Span style="margin: 10px;">
            <?php if (isset($message)) echo $message; ?>
            <?php if (isset($_SESSION['msg'])): ?>
              <p class="mb-0 me-3 text-<?= $_SESSION['status'] ? 'success' : 'danger' ?>">
                <?= $_SESSION['msg']; unset($_SESSION['msg'], $_SESSION['status']); ?>
              </p>
            <?php endif; ?>        
          </Span>

          <!-- thông báo -->
            <div class="text-white header-user_infor-noti me-3">
              <span><i class=" fa-solid fa-bell me-2"></i></span>
              <span><i class=" fa-solid fa-calendar me-2"></i></span>
            </div>
          <?php if (empty($_SESSION['user'])): ?>
            <a href="<?= BASE_URL . '?action=login' ?>" class="btn btn-outline-light me-2">Đăng nhập</a>
            <a href="<?= BASE_URL . '?action=register' ?>" class="btn btn-primary">Đăng ký</a>
          <?php else: ?>
            <div class="header-user_infor has-user">
              <span class="text-white me-3 has-user">Chào, <strong><?= $_SESSION['user'] ?>_san</strong>!</span>
              <ul class="header-user_infor-list">
                <li class="header-user_infor-items">
                  <a href="<?= BASE_URL . '?action=infor' ?>" >Hồ sơ</a>
                </li>    
                <li class="header-user_infor-items">
                  <a href="<?= BASE_URL . '?action=my_article' ?>" >Bài viết của tôi</a>
                </li>
                <li class="header-user_infor-items">
                  <a href="<?= BASE_URL . '?action=show_create_article' ?>" >Tạo bài viết</a>
                </li>
                <li class="header-user_infor-items">
                  <a class="logout" href="<?= BASE_URL . '?action=logout' ?>" >Đăng xuất</a>
                </li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- NỘI DUNG CHÍNH -->
<div class="container mt-4">
  <div class="row">
    <?php
    if (isset($view)) {
      require_once PATH_VIEW . $view . '.php';
    }
    ?>
  </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-5" style=" bottom:0;width:100%;">
  Follow us
</footer>

</body>
</html>
<style>
 *{
    padding:0;
    margin: 0;
    box-sizing: border-box;
  }
  .header{
    height: 100px;
    background-color: #212529;
  }
  nav{
    position: sticky;position:-webkit-sticky;
    
  }
  /* .header-user_infor{
    display: flex;
    align-items: center;
  } */
  .header-user_infor{
    position: relative;
  }
  .header-user_infor-list {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #212529;
    padding: 0;
    border: 1px solid #ccc;
    z-index: 1;
    border-radius: 5px;
    width: 150px;
    display: none;
  }
  .header-user_infor-items {
    list-style: none;
    width: 150px;
  }
  .header-user_infor-items a {
    text-decoration: none;
    color: #c4c4c4ff;
    display: block;
    padding: 8px 20px;
  }
  .header-user_infor-items a:hover{
    background-color: #555;
    color:white;
  }
  a.logout{
    color: orange;
    border-top: 1px solid #ccc;
    margin-top: 8px;
  }
  a.logout:hover{
    color:red;
  }
  .has-user:hover  .header-user_infor-list{
    display: block;
  }
</style>