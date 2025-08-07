<div class="content">
    <div class="content_left">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-road"><br></i>  lộ trình
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=BASE_URL.'?action=category'?>">Ưu đãi</a></li>
                    <li><a class="dropdown-item" href="<?=BASE_URL.'?action=category&category=2'?>">Backend</a></li>
                    <li><a class="dropdown-item" href="<?=BASE_URL.'?action=category&category=1'?>">Frontend</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="content_right">
        <form class="d-flex my-3" action="" method="get" >
            <!-- đây gửi đi điều muốn tìm kiếm kèm theo một pót ẩn mang giá trị là action để chuyển hướng -->
            <input type="hidden" name="action" value="search" id="">
            <input class="form-control me-2" type="text" name="search" id="" placeholder="nhập để tìm kiếm...">
            <button class="btn btn-outline-primary" type="submit">tim kiem</button>
            <!-- chuyển đến controller -->
        </form>
        <!--  -->
            <div class="row">
            <?php foreach($dataAll ?? $data as $v){?>
                <div class="col-md-4 mb-4" style="flex-wrap: wrap;">
                    <div class="card ">
                        <div class="img" >
                            <a href="<?=BASE_URL.'?action=detail&id='.$v['id']?>">
                                <img src="<?=BASE_ASSETS_UPLOADS .$v['thumbnail']?>" class="card-img-bottom text-center" alt="Hình sản phẩm">
                            </a>                    
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?=$v['name']?></h5>
                            <p class="card-text">giảng viên: <?=$v['instructorName']?></p>
                            <p class="card-text text-danger fw-bold"><?=number_format($v['price'])?>₫</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?=BASE_URL.'?action=takecourse&id='.$v['id']?>"><button class="btn btn-primary">đăng ký khóa học</button></a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>    
    </div>    
</div>


<style>
.img {
    width: 100%;
    height: 200px;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

.content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; /* Tự động xuống hàng nếu nhỏ */
}

.content_left {
    width: 19%;
    border-right:1px solid #d2d2d2;
}
.content_left ul{
    padding:0;
}
.content_right {
    width: 80%;
}

/* Responsive */
@media (max-width: 768px) {
    .content {
        flex-direction: column;
    }
    .content_left,
    .content_right {
        width: 100%;
    }
    .img {
        height: 200px;
    }
}   
li{
    list-style: none;
}

</style>
<!-- tôi muốn cố định khung sản phẩm và ảnh full hình khi mình hover thì cả phần text lẫ nút hiện lên và có nền màu đen và có bóng mờ màu đen -->