<?php if (isset($message)) echo $message; ?>
<a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>

<table class="table">
    <tr>
        <th>menu</th>
        <th>định danh</th>
        <th>tên hoc sinh</th>
        <th>email</th>
        <th>ảnh đại diện</th>
    </tr>
    <tr>
        <th>thông tin cá nhân</th>
        <td><?=$data['id']?></td>
        <td><?=$data['username']?></td>
        <td><?=$data['email']?></td>
        <td><img src="<?= BASE_ASSETS_UPLOADS.$data['avatar_url']?>" alt="" width='100px'></td>
    </tr>            
    <td><a href="<?=BASE_URL.'?action=edit_user&id='.$data['id']?>"><button class="btn btn-primary">them thông tin của mình</button></a></td>
</table>
<table class="table">
    <tr>
        <th>môn học</th>     
    </tr>
    <tr>
        <th>định danh</th>
        <th>tên khóa học</th>
        <th>hình ảnh</th>
        <th>tên giảng viên</th>
        <th>thông tin</th>
        <th>lộ trình</th>
        <th>thời lượng</th>
        <th>giá</th>
        <th>hành động</th>
    </tr>
        <?php foreach($data_in as $v){?>
        <tr>
            <td><?=$v['coursesId']?></td>
            <td><?=$v['coursesName']?></td>
            <td><img src="<?=BASE_ASSETS_UPLOADS.$v['coursesImg']?>" alt="" width="100"></td>
            <td><?=$v['instructorName']?></td>
            <td><?=$v['coursesDes']?></td>
            <td><?=$v['courses_categoryName']?></td>
            <td><?=$v['coursesDura']?></td>
            <td><?=$v['price']?></td>
            <td>
                <a href="<?=BASE_URL.'?action=delete&id='.$v['coursesId']?>" class="btn btn-primary" onclick=" return(confirm('bạn có muốn xóa không?'))" >xóa</a>
            </td>
        </tr>
        <?php }?>
</table>
<a href="" class="btn btn-primary">thanh toán</a>
