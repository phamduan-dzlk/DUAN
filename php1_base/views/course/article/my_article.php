<div class="container my-4">
    <a href="<?=BASE_URL.'?action=show_article_list'?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <h3 class="content_right-title">
        <?=$title ?? ''?>
    </h3><br>
    <div class="article_user-my_article">
        <div class="article_user-grid">
            <?php foreach($data as $v){?>
            
            <div class="article_user-item card shadow-sm border-0 mb-4" style="width: 90%;">
                
                <div class="card-body">
                    <!-- Thông tin user -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="heading d-flex">
                            <div class="img" style="background-image: url('<?= BASE_ASSETS_UPLOADS . $v['avatar_url'] ?>'); width: 50px; height: 50px; border-radius: 50%; background-size: cover; background-position: center;"></div>
                            <div class="user-info">
                                <a href="" class="text-decoration-none text-dark">
                                    <h5 class="mb-0"><?=$v['username']?></h5>
                                </a>
                                <small class="text-muted"><?=$v['create_at']?></small>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn btn-sm btn-outline-secondary me-2 " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?= BASE_URL.'?action=show_form_update&id='. $v['id']?>" class="dropdown-item">Chỉnh sửa</a></li>
                            <li><a href="<?= BASE_URL.'?action=delete_article&id='. $v['id']?>" class="dropdown-item">Xóa</a></li>
                        </ul>
                            <button class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-bookmark"></i></button>
                        </div>
                    </div>

                    <!-- Nội dung bài viết -->
                    <a href="" class="text-decoration-none text-dark">  
                        <div class="row g-3">
                            <div class="col-md-8">
                                <h3 class="h5 fw-bold"><?=$v['title']?></h3>
                                <p class="mb-0 line-clamp-3">
                                    <?=$v['content']?>
                                </p>
                            </div>
                            <div class="col-md-4 thumbnail_style">
                                <img src="<?=BASE_ASSETS_UPLOADS . $v['images']?>" alt="" class="img-fluid rounded">
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <?php }?>
        </div>
        <!-- ==/| HIỂN THỊ |\== -->
        <!-- ảnh đại diện ngày gửi -->
        <!-- Thao tác lên bài viết -->
        <!-- bài viết [caption, ảnh]-->
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
</div>
chưa làm