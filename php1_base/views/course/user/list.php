<div class="content " >
    <!-- menu con -->
    <div class="content_left " style="position: sticky; position:-webkit-sticky; top: 65px; height: 100vh; align-self: flex-start; ">
        <ul class="navbar-nav" >
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-road "></i>  Lộ trình
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=BASE_URL.'?action=category'?>">Ưu đãi</a></li>

                    <?php foreach($category as $v){?>
                        <li><a class="dropdown-item" href="<?=BASE_URL.'?action=category&category='.$v['category_id']?>"><?=$v['categoryName']?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="<?=BASE_URL.'?action=show_article_list'?>" >
                    <i class="fa-solid fa-newspaper"></i>  Bài viết
                </a>
            </li>
        </ul>
    </div>
    <div class="content_right" style="background-color:#f5f5f5;">
        <form class="d-flex my-3" action="" method="get" >
            <!-- đây gửi đi điều muốn tìm kiếm kèm theo một post ẩn mang giá trị là action để chuyển hướng -->
            <input type="hidden" name="action" value="search" id="">
            <input class="form-control me-2" type="text" name="search" id="" placeholder="nhập để tìm kiếm...">
            <button class="btn btn-outline-primary" type="submit">🔍</button>
            <!-- chuyển đến controller -->
        </form>
        <!-- nội dung bên trong -->
        <h3 class="content_right-title"><?=$title ?? ''?></h3>
        <div class="row">
            <?php foreach($dataAll ?? $data as $v){?>
                <div class="col-6 col-md-3 mb-5 p-3" style="flex-wrap: wrap;">
                    <div class="card">
                        <a class="items-link" href="<?=BASE_URL.'?action=detail&id='.$v['id']?>">
                            <div class="img" >
                                <img src="<?=BASE_ASSETS_UPLOADS .$v['thumbnail']?>" class="card-img-bottom text-center" alt="Hình sản phẩm">
                            </div>
                            <div class=" text-left">
                                <h5 class="card-title"><?=$v['name']?></h5>
                                <p class="card-text">giảng viên: <?=$v['instructorName']?></p>
                                <p class="card-text text-danger fw-bold"><?=number_format($v['price'])?>₫</p>
                            </div>
                        </a>
                        <div class=" text-left">
                            <div class="home_product-item_action">
                                <span class="home_product-item_like">
                                    <i class="home_product-item_like-empty fa-regular fa-heart" ></i>
                                    <i class="home_product-item_like-fill fa-solid fa-heart" ></i>
                                </span>
                                <span class="home_product-item_rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        </div>
                            
                    </div>
                </div>
            <?php }?>
        </div>    
    </div>    
</div>

<style>
.items-link{
    color:#333;
    text-decoration: none;
}
.card{
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}
.card:hover{
    transform: translateY(-2px);
    transition: transform ease-in 0.1s;
    box-shadow: 0 1px 20px rgba(0, 0, 0, 0.1);

}
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
.card-title {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--text-color);
    line-height: 1.6rem;
    height: 3.2rem;
    margin: 10px 10px 4px;
    overflow: hidden;
    display: block;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}
.card-text{
    margin: 10px 10px 4px;
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
.home_product-item_action {
    display: flex;
    justify-content: space-between;
    margin: 5px 10px;
}
/* hỗ trợ back end like */
i.home_product-item_like-empty {
    cursor: pointer;
}
i.home_product-item_like-fill {
    cursor: pointer;
    color: #f53333;
    display: none;
}

.home_product-item_liked .home_product-item_like-fill {
    display: inline-block;
}

.home_product-item_liked .home_product-item_like-empty {
    display: none;
}

.home_product-item_rating {
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    color: #d5d5d5;
}
.home_product-item_rating i {
    margin-right: 2px;
    cursor: pointer;
}
.home_product-item_rating-gold {
    color: #ffcd3c;
}
</style>
<script>
document.querySelectorAll('.home_product-item_like').forEach(function(likeBox){
    const empty = likeBox.querySelector('.home_product-item_like-empty');
    const fill = likeBox.querySelector('.home_product-item_like-fill');

    empty.addEventListener('click', function(){
        likeBox.classList.add('home_product-item_liked');
    });

    fill.addEventListener('click', function(){
        likeBox.classList.remove('home_product-item_liked');
    });
});


</script>
