<div class="container my-4">
    <div class="content">

        <div class="content_left " style="position: sticky; position:-webkit-sticky; top: 65px; height: 100vh; align-self: flex-start; ">
            <ul class="navbar-nav" >
                <li class="nav-item dropdown">
                    <a class="nav-link " href="<?= BASE_URL ?>"  >
                        <i class="fa-solid fa-house"></i> Trang chủ
                    </a>

                </li>
                <li>
                    <a class="nav-link" href="<?=BASE_URL.'?action=show_article_list'?>" >
                        <i class="fa-solid fa-newspaper"></i>  Bài viết
                    </a>
                </li>
            </ul>
        </div>
        <div class="content_right">
            <h3 class="content_right-title">
                <?=$title ?? ''?>
            </h3>           
            <div class="article_list" >
                <div class="article_user-grid">
                <?php if(!empty($got_it)) echo $got_it; ?>
                <?php foreach($data as $v){?>
                <div class="article_user-item card shadow-sm border-0 mb-4" style="width: 90%;">
                    <div class="card-body">
                        <!-- Thông tin user -->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="heading d-flex">
                                <a href="<?=BASE_URL . '?action=their_article&id='.$v['id_user']?>">
                                    <div class="img" style="background-image: url('<?=BASE_ASSETS_UPLOADS . $v['avatar_user']?>'); width: 50px; height: 50px; border-radius: 50%; background-size: cover; background-position: center;"></div>
                                </a>
                                <div class="user-info">
                                    <a href="" class="text-decoration-none text-dark">
                                        <h5 class="mb-0"><?=$v['username']?></h5>
                                    </a>
                                    <small class="text-muted"><?=$v['create_at']?></small>
                                </div>
                            </div>
                            <div class="actions">
                                <button class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="dropdown"><i
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
                        <a href="<?=BASE_URL . '?action=detail_article&id='.$v['id']?>" class="text-decoration-none text-dark">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <h3 class="h5 fw-bold"><?=$v['title']?></h3>
                                    <p class="mb-0 line-clamp-3">
                                        <?=$v['content']?>
                                    </p>
                                </div>
                                <div class="col-md-4 thumbnail_style">
                                    <img src="<?=BASE_ASSETS_UPLOADS .$v['images']?>" alt="" class="img-fluid rounded">
                                    <!-- <div class="sub-img">
                                        <img src="<?//BASE_ASSETS_UPLOADS . $v['images']?>" alt="" class="img-fluid rounded">
                                        <img src="<?//BASE_ASSETS_UPLOADS . $v['images']?>" alt="" class="img-fluid rounded">
                                    </div> -->
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <?php }?>
            </div>
        </div>        
    </div>    
</div>
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;   /* số dòng tối đa */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .thumbnail_style{
            display: flex;
            gap: 5px;
        }
        .sub-img{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .dropdown-item:hover{
        color:orange;
        }
        .content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; /* Tự động xuống hàng nếu nhỏ */
        }
        .content_left {    
            width: 16.6667%;
            background-color: #fff;
            border-radius: 3px;
            padding: 12px 6px 12px 4px;
        }
        .content_left ul{
            padding:0;
        }
        .nav-link{
            padding:10px
        }
        .nav-link:hover{
            color:orange;
            padding-left: 15px;
            transition: all ease-in 0.2s;
        }
        .dropdown-item:hover{
            color:orange;
            padding-left: 20px;
            transition: all ease-in 0.2s;
        }
        .content_right {
            flex: 1;
            width: 83.3333%;
            background-color: #f5f5f5;
            border-radius: 3px;
            padding: 12px 4px 12px 6px;
        }

    </style>
</div>