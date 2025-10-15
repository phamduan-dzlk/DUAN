<div class="container my-4">
    <a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <h3 class="content_right-title">
        <?=$title ?? ''?>
    </h3><br>
    <div class="article_user-my_article">
                <div class="article_user-grid">
            <div class="article_user-item card shadow-sm border-0 mb-4" style="width: 90%;">
                <div class="card-body">
                    <!-- Thông tin user -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="heading d-flex">
                            
                            <div class="img" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4EGg4awa6G3iKK0_mB1JsuaJPNdprP0CTeg&s'); width: 50px; height: 50px; border-radius: 50%; background-size: cover; background-position: center;"></div>
                            <div class="user-info">
                                <a href="" class="text-decoration-none text-dark">
                                    <h5 class="mb-0">Người bí ẩn</h5>
                                </a>
                                <small class="text-muted">10 phút trước</small>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn btn-sm btn-outline-secondary me-2"><i
                                    class="fa-solid fa-ellipsis"></i></button>
                            <button class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-bookmark"></i></button>
                        </div>
                    </div>

                    <!-- Nội dung bài viết -->
                    <a href="" class="text-decoration-none text-dark">  
                        <div class="row g-3">
                            <div class="col-md-8">
                                <h3 class="h5 fw-bold">Tình anh em bền lâu</h3>
                                <p class="mb-0 line-clamp-3">
                                    Tình anh em bền lâu gian khổ vẫn bên nhau, khi tương lai mai sau
                                    vẫn giữ lấy một lời thề. Dù cho mai già đi gian khổ vẫn vây quanh,
                                    khi anh em bên nhau ta vẫn sống trọn thề.
                                    Tình anh em bền lâu gian khổ vẫn bên nhau, khi tương lai mai sau
                                    vẫn giữ lấy một lời thề. Dù cho mai già đi gian khổ vẫn vây quanh,
                                    khi anh em bên nhau ta vẫn sống trọn thề.
                                </p>
                            </div>
                            <div class="col-md-4 thumbnail_style">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4EGg4awa6G3iKK0_mB1JsuaJPNdprP0CTeg&s" alt="" class="img-fluid rounded">
                                <div class="sub-img">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4EGg4awa6G3iKK0_mB1JsuaJPNdprP0CTeg&s" alt="" class="img-fluid rounded">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4EGg4awa6G3iKK0_mB1JsuaJPNdprP0CTeg&s" alt="" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
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
    </style>
</div>
chưa làm