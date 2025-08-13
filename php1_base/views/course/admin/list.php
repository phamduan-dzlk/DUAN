<div class="content_header">
  <?php if (isset($message)) echo $message; ?>
</div><hr> 
<div class="container_content">
    <div class="left_menu"style="position: sticky; position:-webkit-sticky; top: 65px; height: 100vh; align-self: flex-start;">
        <ul class="navbar-nav" >
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-road"><br></i>  lộ trình
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=BASE_URL.'?mode=adminaction=category'?>">Ưu đãi</a></li>
                    <?php foreach($category as $v){?>
                        <li><a class="dropdown-item" href="<?=BASE_URL.'?action=category&category='.$V['category_id']?>"><?=$v['categoryName']?></a></li>
                    <?php }?>                    
                </ul>
            </li>
        </ul>
    </div>
    <div class="right_content">
                <form action="" class="d-flex my-3" method="get" >
            <input type="hidden" name="mode" value="admin" id="">
            <input type="hidden"  name="action" value="search_courses" id="">
            <input type="text" class="form-control me-2" name="search" id="" placeholder="nhập để tìm kiếm...">
            <button type="submit" class="btn btn-outline-primary">🔍</button>
        </form>
        <table class="table table-hover align-middle shadow-sm rounded">
            <tr>
                <th>định danh</th>
                <th>tên khóa học</th>
                <th>hình ảnh</th>
                <th>tên giảng viên</th>
                <th>thông tin</th>
                <th>giá</th>
                <th>lộ trình</th>
                <th>thời hạn/tháng</th>
                <th>thời gian hình thành</th>
                <th>hành động</th>
            </tr>
            <?php foreach($data as $v){?>
                <tr class="table-row-hover">
                    <td><?=$v['id']?></td>
                    <td><?=$v['name']?></td>
                    <td><img src="<?=BASE_ASSETS_UPLOADS.$v['thumbnail']?>" alt="" width="100"></td>
                    <td><?=$v['instructorName']?></td>
                    <td><?=$v['description']?></td>
                    <td><?=$v['price']?></td>
                    <td><?=$v['categoryName']?></td>
                    <td><?=$v['duration']?></td>
                    <td><?=$v['create_at']?></td>
                    <td>
                        <a href="<?=BASE_URL.'?mode=admin&action=detail&id='.$v['id']?>"><button class="btn btn-primary">xem chi tiết</button></a>
                        <a href="<?=BASE_URL.'?mode=admin&action=edit&id='.$v['id']?>"><button class="btn btn-primary">Sửa </button></a>
                        <a href="<?=BASE_URL.'?mode=admin&action=delete&id='.$v['id']?>"><button class="btn btn-primary" onclick=" return(confirm('bạn có muốn xóa không?'))">xóa </button></a>
                    </td>
                </tr>
            <?php }?>
        </table>
    </div>
</div>
<a href="<?=BASE_URL?>">cập nhật </a>
<style>
    .container_content{
        display: flex;
    }
    .left_menu{
        padding: 10px;
        border-right: 1px solid #d2d2d2;
        margin: 10px;
        width:auto;
    }
    .right_content{
        width: 80%;
    }
</style>