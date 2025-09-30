<?php if (isset($message)) echo $message; ?>
.<div class="container my-4">

    <a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
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
        <td><a href="<?=BASE_URL.'?action=edit_user&id='.$data['id']?>"><button class="btn btn-primary">Thêm thông tin của mình</button></a><span class="space" > </span><a href="<?=BASE_URL.'?action=my_article&id='.$data['id']?>"><button class="btn btn-primary">Bài viết của tôi</button></a></td>
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
                <td><a href="<?=BASE_URL."?action=detail&id=".$v['coursesId']?>"><img src="<?=BASE_ASSETS_UPLOADS.$v['coursesImg']?>" alt="" width="100"></a></td>
                <td><?=$v['instructorName']?></td>
                <td><?=$v['coursesDes']?></td>
                <td><?=$v['courses_categoryName']?></td>
                <td><?=$v['coursesDura']?></td>
                <td><?=number_format($v['price'])?></td>
                <td>
                    <a href="<?=BASE_URL.'?action=delete&id='.$v['coursesId']?>" class="btn btn-primary" onclick=" return(confirm('bạn có muốn xóa không?'))" >xóa</a>
                </td>
            </tr>
            <?php
                $array_price[]=$v['price'];
            ?>
            <?php }?>
        </table>
        <div class="help_user">
            <div class="help_user-delete_all">
                <span>Xóa tất cả <i class="fa-solid fa-trash-can"></i></span>
            </div>
            <div class="help_user-tutol_courses">
                <span>Tổng tiền:</span>
                <div class="help_user-tutol_courses--input"><?=isset($array_price) ? number_format(array_sum($array_price)) : 0?></div>
                <span style="color:red">VND</span>
            </div>
            <a href="" class="btn btn-primary">Thanh toán</a>
        </div>
    </div>
    <style>
        .help_user{
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            border:1px solid #c8c7c7ff;
            border-radius: 2px;
            background-color: aliceblue;
            box-shadow: 0 2px 5px #999;
            padding: 8px 30px;
        }
        .help_user-delete_all {
            color: orangered;
            cursor: pointer;
        }
        .help_user-tutol_courses {
            display: flex;
            width: 200px;
            justify-content: space-between;
            align-items: center;
        }
        .help_user-tutol_courses--input {
            border: 1px solid #c8c7c7ff;
            width: 80px;
            padding: 5px 10px;
            background-color: white;
            border-radius: 2px;
        }
    </style>
    
