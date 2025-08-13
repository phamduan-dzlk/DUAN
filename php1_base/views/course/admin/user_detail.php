<a href="<?=BASE_URL.'?mode=admin&action=user'?>"class="btn btn-secondary mb-3">← Trở lại</a>
<div class="content_header">
  <?php if (isset($message)) echo $message; ?>

    <table class="table">
        <tr>
            <th>định danh</th>
            <th>tên học sinh</th>
            <th>Emails</th>
            <th>ảnh đại diện</th>
            <th>hành động</th>
        </tr>
            <tr>
                <td><?=$data['id']?></td>
                <td><?=$data['username']?></td>
                <td><?=$data['email']?></td>
                <td><img src="<?= BASE_ASSETS_UPLOADS.$data['avatar_url']?>" alt="" width="100px"></td>

                <tr>
                    <th style="color:green;">những khóa học đăng ký</th> 
                </tr>
                <!-- truy vấn người dùng theo id khóa học -->
                <tr>
                    <th>định danh</th>
                    <th>tên khóa học</th>
                    <th>ảnh</th>
                    <th>tên giảng viên</th>
                    <th>thông tin</th>
                    <th>thành phố</th>
                    <th>giá</th>
                </tr>
                <tr>
                    <?php foreach($data_in as $v){?>
                    <tr>
                        <td><?=$v['coursesId']?></td>
                        <td><?=$v['coursesName']?></td>
                        <td><img src="<?=BASE_ASSETS_UPLOADS.$v['coursesImg']?>" alt="" width="100"></td>
                        <td><?=$v['instructorName']?></td>
                        <td><?=$v['coursesDes']?></td>
                        <td><?=$v['courses_categoryName']?></td>
                        <td><?=$v['price']?></td>                    
                    </tr>
                    <?php }?>
                </tr>
            </tr>
    </table>
</div>
