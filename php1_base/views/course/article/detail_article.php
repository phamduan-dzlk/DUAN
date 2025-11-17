  <!-- Nội dung chính -->
  <main class="container">
    <a href="<?=BASE_URL.'?action=show_article_list'?>" class="btn btn-secondary mb-3">← Trở lại</a>
        <h3 class="content_right-title">
        <?=$title ?? ''?>
    </h3><br>
    <div class="row">
      <!--Chi tiết Bài viết -->
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="heading d-flex">
            <a href="<?=BASE_URL . '?action=their_article&id=' . $data_user['id']?>">
                <div class="img" style="background-image: url('<?= BASE_ASSETS_UPLOADS . $data_user['avatar_url']?>'); width: 50px; height: 50px; border-radius: 50%; background-size: cover; background-position: center;"></div>
            </a>
            <div class="user-info">
                <a href="<?=BASE_URL . '?action=user_profile&id=' . $data_user['id']?>" class="text-decoration-none text-dark">
                    <h5 class="mb-0"><?=$data_user['username']?></h5>
                </a>
                <small class="text-muted"><?=$data_article['create_at']?></small>
            </div>
        </div>
        <div class="actions">
            <button class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="dropdown"><i
                    class="fa-solid fa-ellipsis"></i>
              <ul class="dropdown-menu">
                  <li><a href="" class="dropdown-item">tố cáo vi phạm</a></li>
                  <li><a href="" class="dropdown-item">theo dõi</a></li>
              </ul>      
            </button>
            <button class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-bookmark"></i></button>
        </div>
      </div>
      <div class="row g-3 detail_article">
        <div class="col-md-8 ">
            <h3 class="h5 fw-bold"><?=$data_article['title']?></h3>
            <p class="mb-0 line-clamp-3">
                <?=$data_article['content']?>
            </p>
        </div>
        <div class="col-md-4 thumbnail_style">
            <img src="<?=BASE_ASSETS_UPLOADS . $data_article['images'] ?>" alt="" class="img-fluid rounded">
        </div>
      </div>
      <!-- Sidebar -->
      <h2>Bài viết cùng tác giả</h2>
      <div class="article_user-grid">
        <?php foreach($data_authors as $v){?>
          <div class="article_user-item card shadow-sm border-0 mb-4" style="width: 90%;">
              <div class="card-body">
                  <!-- Thông tin user -->
                  <div class="d-flex align-items-center justify-content-between mb-3">
                      <div class="heading d-flex">
                          <a href="<?=BASE_URL . '?action=user_profile&id=' . $v['id_user']?>">
                            <div class="img" style="background-image: url('<?= BASE_ASSETS_UPLOADS . $data_user['avatar_url']?>'); width: 50px; height: 50px; border-radius: 50%; background-size: cover; background-position: center;"></div>
                          </a>
                          <div class="user-info">
                              <a href="" class="text-decoration-none text-dark">
                                  <h5 class="mb-0"><?= $v['username']?></h5>
                              </a>
                              <small class="text-muted"><?=$v['create_at']?></small>
                          </div>
                      </div>
                      <div class="actions">
                          <button class="btn btn-sm btn-outline-secondary me-2"><i
                                  class="fa-solid fa-ellipsis"></i>
                          </button>
                          <ul class="dropdown-menu">
                              <li><a href="" class="dropdown-item">tố cáo vi phạm</a></li>
                              <li><a href="" class="dropdown-item">theo dõi</a></li>
                          </ul>
                          <button class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-bookmark"></i></button>
                      </div>
                  </div>

                  <!-- Nội dung bài viết -->
                  <a href="<?=BASE_URL . '?action=detail_article&id=1'?>" class="text-decoration-none text-dark">
                      <div class="row g-3">
                          <div class="col-md-8">
                              <h3 class="h5 fw-bold"><?=$v['title']?></h3>
                              <p class="mb-0 line-clamp-3">
                                  <?=$v['content']?>
                              </p>
                          </div>
                          <div class="col-md-4 thumbnail_style">
                              <img src="<?=BASE_ASSETS_UPLOADS . $v['images'] ?>" alt="" class="img-fluid rounded">
                          </div>
                      </div>
                  </a>
                </div>
          </div>
        <?php }?>
      </div>

    </div>
    <style>
      .detail_article{
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
      }
      .thumbnail_style{
        display: flex;
        gap: 5px;
      }
      .sub-img{
        display: flex;
        gap: 5px;
        flex-direction: column;
      }
      .dropdown-item:hover{
        color:orange;
      }
    </style>
  </main>