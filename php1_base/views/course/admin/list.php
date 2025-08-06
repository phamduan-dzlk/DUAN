<div class="content_header">
  <?php if (isset($message)) echo $message; ?>
    <!-- <div class="btn_into">
        <a href="<?=BASE_URL.'?mode=admin&action=create'?>"><button class="btn btn-primary">thêm khóa học</button></a><br><br>
        <a href="<?=BASE_URL.'?mode=admin&action=user'?>"><button class="btn btn-primary">quản lý người dùng</button></a><br><br>
    </div>-->
</div><hr> 
<form action="" class="d-flex my-3" method="get" >
    <input type="hidden" name="mode" value="admin" id="">
    <input type="hidden"  name="action" value="search_courses" id="">
    <input type="text" class="form-control me-2" name="search" id="" placeholder="nhập để tìm kiếm...">
    <button type="submit" class="btn btn-outline-primary">tim kiem</button>
</form>
<table class="table">
    <tr>
        <th>định danh</th>
        <th>tên khóa học</th>
        <th>hình ảnh</th>
        <th>tên giảng viên</th>
        <th>thông tin</th>
        <th>giá</th>
        <th>lộ trình</th>
        <th>thời hạn</th>
        <th>thời gian hình thành</th>
        <th>thời hạn</th>
        <th>hành động</th>
    </tr>
    <?php foreach($data as $v){?>
        <tr>
            <td><?=$v['id']?></td>
            <td><?=$v['name']?></td>
            <td><img src="<?=BASE_ASSETS_UPLOADS.$v['thumbnail']?>" alt="" width="100"></td>
            <td><?=$v['instructorName']?></td>
            <td><?=$v['description']?></td>
            <td><?=$v['price']?></td>
            <td><?=$v['categoryName']?></td>
            <td><?=$v['create_at']?></td>
            <td><?=$v['duration']?></td>
            <td>
                <a href="<?=BASE_URL.'?mode=admin&action=detail&id='.$v['id']?>"><button class="btn btn-primary">xem chi tiet</button></a>
                <a href="<?=BASE_URL.'?mode=admin&action=edit&id='.$v['id']?>"><button class="btn btn-primary">Sửa </button></a>
                <a href="<?=BASE_URL.'?mode=admin&action=delete&id='.$v['id']?>"><button class="btn btn-primary">xóa </button></a>
            </td>
        </tr>
    <?php }?>
</table>
<a href="<?=BASE_URL?>">cập nhật </a>