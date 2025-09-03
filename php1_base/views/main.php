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

          <!--  -->
          <?php if (empty($_SESSION['user'])): ?>
            <a href="<?= BASE_URL . '?action=login' ?>" class="btn btn-outline-light me-2">Đăng nhập</a>
            <a href="<?= BASE_URL . '?action=register' ?>" class="btn btn-primary">Đăng ký</a>
          <?php else: ?>
            <span class="text-success me-3">Chào, <strong><?= $_SESSION['user'] ?>_san</strong>!</span>
            <div class="header-user_infor">
              <a href="<?= BASE_URL . '?action=infor' ?>" class="btn btn-outline-info me-2">Hồ sơ</a>
              <a href="<?= BASE_URL . '?action=logout' ?>" class="btn btn-outline-danger">Đăng xuất</a>
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
</style>